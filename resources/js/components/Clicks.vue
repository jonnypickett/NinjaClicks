<template>
    <div class="clicks-list">
        <template v-if="loading > 0">
            Loading
        </template>
        <template v-else>
            <clicks-table
                :clicks="allClicks"
            />
        </template>
    </div>
</template>

<script>
import gql from 'graphql-tag';
import ClicksTable from './ClicksTable.vue'

const clicksQuery = gql`
    query {
        allClicks {
            id
            total_clicks
            date
            provider {
                id
                display_name
            }
        }
    }
`;

export default {
    components: {
        ClicksTable
    },

    data: () => ({
        allClicks: [],
        loading: 0
    }),

    apollo: {
        allClicks: {
            query: clicksQuery,
            loadingKey: 'loading',
        },
    }
};
</script>
