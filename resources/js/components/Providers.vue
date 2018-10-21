<template>
  <div class="clicks-list">
        <template v-if="loading > 0">
            Loading
        </template>
        <template v-else>
            <providers-chart :providers="providers"></providers-chart>
        </template>
    </div>
</template>

<script>
import gql from 'graphql-tag';
import ProvidersChart from './ProvidersChart.vue'

const providersQuery = gql`
    query {
        providers {
            id
            name
            display_name
            hex_color
            clicks {
                id
                total_clicks
                date
            }
        }
    }
`;

export default {
    components: {
        ProvidersChart
    },

    data: () => ({
        providers: [],
        loading: 0,
    }),

    apollo: {
        providers: {
            query: providersQuery,
            loadingKey: 'loading',
        }
    }
};
</script>
