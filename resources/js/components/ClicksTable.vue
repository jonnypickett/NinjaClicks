<template>
    <v-card>
        <v-card-title>
            Clicks
            <v-spacer></v-spacer>
            <v-text-field
                v-model="search"
                append-icon="search"
                label="Search"
                single-line
                hide-details
            ></v-text-field>
        </v-card-title>
        <v-data-table
            :headers="headers"
            :items="rows"
            :search="search"
        >
            <template slot="items" slot-scope="props">
                <td>{{ props.item.provider }}</td>
                <td class="text-xs">{{ props.item.date }}</td>
                <td class="text-xs">{{ props.item.clicks }}</td>
            </template>
            <v-alert slot="no-results" :value="true" color="error" icon="warning">
                Your search for "{{ search }}" found no results.
            </v-alert>
        </v-data-table>
    </v-card>
</template>

<script>
    export default {
        data: () => ({
            search: '',
            headers: [
                { text: 'Provider', value: 'provider' },
                { text: 'Date', value: 'date' },
                { text: 'Clicks', value: 'clicks' }
            ],
            rows: []
        }),
        props: {
            clicks: {
                type: Array,
                required: true
            }
        },
        mounted () {
            this.populateRows()
        },
        methods: {
            populateRows () {
                this.clicks.forEach((c) => {
                    this.rows.push({
                        value: false,
                        provider: c.provider.display_name,
                        date: this.formattedDate(c.date),
                        clicks: c.total_clicks
                    })
                })
            },
            formattedDate (date) {
                return this.$moment.utc(date).format("MMMM Do, YYYY")
            }
        }
    };
</script>