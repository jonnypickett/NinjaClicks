<template>
    <div>
        <select @change="fillChart()" class="form-control" v-model="selectedYear">
            <option value="" selected>All</option>
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
        </select>
        <line-chart 
            :chart-data="chartData" 
            :options="chartOptions" 
            :width="400"
            :height="200"
        ></line-chart>
    </div>
</template>

<script>
    import LineChart from './LineChart.vue'

    export default {
        components: {
            LineChart
        },
        data () {
            return {
                yearOptions: {
                    2015: {},
                    2016: {},
                    2017: {}
                },
                selectedYear: "",
                chartData: null,
                chartOptions: {
                    scales: {
                        yAxes: [{
                            stacked: true
                        }]
                    }
                }
            }
        },
        props: {
            providers: {
                type: Array,
                required: true
            }
        },
        mounted () {
            this.initYearOptions()
            this.fillChart()
        },
        methods: {
            initYearOptions () {
                for (var year in this.yearOptions) {
                    if (this.yearOptions.hasOwnProperty(year)) {
                        for (var q = 1; q < 5; q++) {
                            if (q == 1) {
                                this.yearOptions[year] = {
                                    quarters: {}
                                }
                            }
                            if (year < 2017 || q < 3) {
                                this.yearOptions[year]['quarters'][q] = {
                                    label: year+' Q'+q,
                                    begin: this.$moment().utc().year(year).quarter(q).startOf('month').startOf('day').format(),
                                    end: this.$moment().utc().year(year).quarter(q+1).startOf('month').startOf('day').subtract(1, 'ms').endOf('day').format()
                                }
                            }
                        }
                    }
                }
            },
            fillChart () {
                this.chartData = {
                    labels: this.getLabels(this.selectedYear),
                    datasets: this.getDataSets(this.selectedYear)
                }
            },
            getLabels (year) {
                let labels = []
                if (year && this.yearOptions.hasOwnProperty(year)) {
                    labels = labels.concat(this.getLabelsForYear(year))
                } else {
                    for (var year in this.yearOptions) {
                        if (this.yearOptions.hasOwnProperty(year)) {
                            labels = labels.concat(this.getLabelsForYear(year))
                        }
                    }
                }
                return labels
            },
            getLabelsForYear (year) {
                let labels = []
                for (var quarter in this.yearOptions[year].quarters) {
                    labels.push(this.yearOptions[year].quarters[quarter].label)
                }
                return labels
            },
            getDataSets (year) {
                let dataSets = []
                this.providers.forEach((p) => {
                    if (p.clicks.length) {
                        dataSets.push({
                            label: p.display_name,
                            backgroundColor: '#'+p.hex_color,
                            data: this.getProviderClicksData(p, year)
                        })
                    }
                })
                return dataSets
            },
            getProviderClicksData (provider, year) {
                let clicks = []
                if (year && this.yearOptions.hasOwnProperty(year)) {
                    clicks = clicks.concat(this.getProviderClicksDataForYear(provider, year))
                } else {
                    for (var year in this.yearOptions) {
                        if (this.yearOptions.hasOwnProperty(year)) {
                            clicks = clicks.concat(this.getProviderClicksDataForYear(provider, year))
                        }
                    }
                }
                
                return clicks
            },
            getProviderClicksDataForYear (provider, year) {
                let clicks = []
                for (var quarter in this.yearOptions[year].quarters) {
                    let begin = this.$moment(this.yearOptions[year].quarters[quarter].begin)
                    let end = this.$moment(this.yearOptions[year].quarters[quarter].end)
                    let totalClicks = 0
                    provider.clicks.forEach((c) => {
                        let clicksDate = this.$moment(c.date)
                        if (clicksDate.isBetween(begin, end)) {
                            totalClicks += c.total_clicks
                        }
                    })
                    clicks.push(totalClicks)
                }
                return clicks
            },
            getRandomInt () {
                return Math.floor(Math.random() * (50 - 5 + 1)) + 5
            }
        }
    }
</script>
