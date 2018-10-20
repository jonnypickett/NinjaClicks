<template>
  <div class="clicks-list">
        <template v-if="loading > 0">
            Loading
        </template>
        <template v-else>
            <providers-chart :providers="allProviders"></providers-chart>
        </template>
    </div>
</template>

<script>
import gql from 'graphql-tag';
import ProvidersChart from './ProvidersChart.vue'

const providersQuery = gql`
    query {
        allProviders {
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
        allProviders: [],
        loading: 0,
    }),

    apollo: {
        allProviders: {
            query: providersQuery,
            loadingKey: 'loading',
        }
    }
};
</script>
