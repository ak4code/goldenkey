<template>
    <div class="gk-search-realty">
        <form class="gk-form uk-dark" action="/" method="get">
            <div class="uk-margin">
                <label for="code-object">Код объекта</label>
                <input class="uk-input" id="code-object" :value="codeObject" name="code_object" type="text"
                       placeholder="0000">
            </div>
            <div class="uk-margin">
                <label for="realty-type">Категория</label>
                <select name="realty_type" id="realty-type" class="uk-select" v-model="currentCategory">
                    <option v-for="cat in categories" :key="cat.id" :value="cat.id">{{cat.name}}</option>
                </select>
            </div>
            <div class="uk-margin">
                <label for="address">Адрес</label>
                <input class="uk-input" id="address" :value="address" name="address" type="text" placeholder="Улица">
            </div>
            <div class="uk-margin">
                <label for="price-from">Цена</label>
                <input class="uk-input" id="price-from" name="price[]" type="number" min="0" placeholder="Цена от" :value="params['price[]'] ? params['price[]'][0] : ''">
                <input class="uk-input" id="price-to" name="price[]" type="number" min="1" placeholder="Цена до" :value="params['price[]'] ? params['price[]'][1] : ''">
            </div>
            <div class="uk-margin">
                <label for="square-from">Площадь</label>
                <input class="uk-input" id="square-from" name="square[]" type="number" min="1" placeholder="Площадь от" :value="params['square[]'] ? params['square[]'][0] : ''">
                <input class="uk-input" id="square-to" name="square[]" type="number" min="2" placeholder="Площадь до" :value="params['square[]'] ? params['square[]'][1] : ''">
            </div>
            <div class="uk-margin">
                <button type="submit" class="uk-button uk-button-primary uk-width-1-1">Найти</button>
            </div>
            <input class="uk-input" id="s" name="s" value="" type="hidden">
            <input class="uk-input" id="page" name="page" value="1" type="hidden">
            <input class="uk-input" id="post_type" name="post_type" value="realty" type="hidden">
        </form>
    </div>
</template>

<script>
    import qs from 'query-string'
    export default {
        name: 'search-realty',
        props: ['category', 'codeObject', 'address'],
        data: () => ({
            categories: [],
            currentCategory: null,
            cities: [],
            params: null
        }),
        created () {
            this.getCategories()
            this.currentCategory = this.category
            this.getRealty()
            let url = window.location.href
            this.params = qs.parse(url)
            console.log(this.params)
        },
        computed: {
            home_url () {
                return window.location.host
            }
        },
        methods: {
            async getCategories () {
                await this.$axios.get(`wp/v2/realty_type`)
                    .then(response => {
                        this.categories = response.data
                    })
                    .catch(error => console.log(error))
            },
            async getRealty () {
                await this.$axios.get(`wp/v2/realty`)
                    .then(response => {
                        let realties = response.data.map(function (realty) {
                            return realty.city
                        })
                        this.cities = realties.filter(function (item, index) {
                            return realties.indexOf(item) === index
                        })
                    })
                    .catch(error => console.log(error))
            }
        }
    }
</script>

<style scoped>

</style>
