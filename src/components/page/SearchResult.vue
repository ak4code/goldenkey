<template>
    <div id="gk-search-result">
        <div v-if="results.length && !loading">
            <div class="uk-flex uk-child-width-1-1 uk-grid-small" uk-grid v-for="property in results"
                 :key="property.id">
                <realty-object :property="property"></realty-object>
            </div>
            <div class="uk-flex uk-flex-center uk-margin">
                <button class="uk-button uk-button-primary" @click.prevent="loadMore" v-if="pagination.pages > this.pagination.page">Показать еще</button>
            </div>
        </div>
        <div v-if="!loading && !results.length">
            <h3 class="uk-text-center">Ничего не найдено.</h3>
        </div>
        <div v-if="loading">
            <div class="uk-text-center uk-padding-large uk-margin">
                <span uk-spinner="ratio: 4.5"></span>
                <h3>Загрузка...</h3>
            </div>
        </div>
    </div>
</template>

<script>
    import qs from 'query-string'
    import RealtyObject from '../content/RealtyObject'

    export default {
        name: 'search-result',
        props: ['codeObject', 'square', 'price', 'page'],
        data: () => ({
            results: [],
            loading: true,
            pagination: {
                total: 0,
                pages: 0,
                page: 1,
            }
        }),
        components: {
            RealtyObject
        },
        created () {
            this.pagination.page = this.page
        },
        mounted () {
            this.getSearchResult()
        },
        methods: {
            async getSearchResult () {
                this.loading = true
                await this.$axios.get(`wp/v2/realty-search?${this.queryBuild()}`)
                    .then(response => {
                        this.results = response.data
                        this.pagination.total = response.headers['x-wp-total']
                        this.pagination.pages = response.headers['x-wp-totalpages']
                        this.loading = !this.loading
                    })
                    .catch(error => console.log(error))
            },
            queryBuild () {
                let query = qs.stringify({ code_object: this.codeObject, page: this.pagination.page })
                query += '&' + qs.stringify({ price: this.price, square: this.square }, { arrayFormat: 'bracket' })
                return query
            },
            async loadMore () {
                this.loading = true
                if (this.pagination.pages > this.pagination.page) {
                    this.pagination.page++
                }
                await this.$axios.get(`wp/v2/realty-search?${this.queryBuild()}`)
                    .then(response => {
                        this.results.push(...response.data)
                        this.loading = !this.loading
                    })
                    .catch(error => console.log(error))
            }
        }
    }
</script>

<style scoped>

</style>
