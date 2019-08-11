<template>
    <div class="gk-search-realty">
        <form class="gk-form uk-dark" action="/" method="get">
            <div class="uk-margin">
                <label for="code-object">Код объекта</label>
                <input class="uk-input" id="code-object" name="code_object" type="text" placeholder="0000">
            </div>
            <div class="uk-margin">
                <label for="price-from">Цена</label>
                <input class="uk-input" id="price-from" name="price[]" type="number" min="0" placeholder="Цена от">
                <input class="uk-input" id="price-to" name="price[]" type="number" min="1" placeholder="Цена до">
            </div>
            <div class="uk-margin">
                <label for="square-from">Площадь</label>
                <input class="uk-input" id="square-from" name="square[]" type="number" min="1" placeholder="Площадь от">
                <input class="uk-input" id="square-to" name="square[]" type="number" min="2" placeholder="Площадь до">
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
    export default {
        name: 'search-realty',
        props: ['category'],
        computed: {
            home_url () {
                return window.location.host
            }
        }
    }
</script>

<style scoped>

</style>
