<template>
    <div class="gk-realty-object">
        <div class="uk-card uk-card-small uk-position-relative uk-card-default uk-card-body uk-border-rounded">
            <div class="uk-flex uk-flex-wrap uk-grid-small" uk-grid>
                <div class="uk-width-1-3@m">
                    <a :href="property.url" :title="property.title">
                        <div class="gk-property-image uk-border-rounded"
                             :style="`background-image: url(${property.image})`">
                        </div>
                    </a>
                </div>
                <div class="uk-width-2-3@m">
                    <a :href="property.url" :title="property.title">
                        <h3 class="gk-thin-title uk-margin-remove">{{property.title}}</h3>
                    </a>
                    <div>
                        <small>Код объекта: {{property.code_object}}</small>
                    </div>
                    <div>
                        <small>{{property.city}}, {{property.address}}</small>
                    </div>
                    <div class="uk-margin-small">
                        <span class="gk-property-price" v-html="`${property.price} руб.`"></span>
                    </div>

                    <div class="gk-property-description">
                        <div class="uk-flex uk-flex-wrap uk-grid uk-child-width-1-2@m">
                            <div>
                                <dl class="uk-flex uk-flex-wrap uk-grid-small uk-child-width-1-2">
                                    <dt>Площадь:</dt>
                                    <dd>{{property.square}} м<sup>2</sup></dd>
                                    <dt v-if="property.square_live">Площадь жилая:</dt>
                                    <dd v-if="property.square_live">{{property.square_live}} м<sup>2</sup></dd>
                                    <dt v-if="property.square_kitchen">Площадь кухни:</dt>
                                    <dd v-if="property.square_kitchen">{{property.square_kitchen}} м<sup>2</sup></dd>
                                    <dt v-if="property.square_plot">Площадь участка:</dt>
                                    <dd v-if="property.square_plot">{{property.square_plot}} сот.</dd>
                                </dl>
                            </div>
                            <div>
                                <dl class="uk-flex uk-flex-wrap uk-grid-small uk-child-width-1-2">
                                    <dt>Всего комнат:</dt>
                                    <dd>{{property.rooms}}</dd>
                                    <dt v-if="property.floor > 0">Этаж:</dt>
                                    <dd v-if="property.floor > 0">{{property.floor}}</dd>
                                    <dt>Этажей:</dt>
                                    <dd>{{property.floors}}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a :href="property.url" class="uk-position-bottom-right gk-property-more">Подробнее <span
                    class="gk-primary-color"> > </span></a>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'realty-object',
        props: ['property']
    }
</script>

<style scoped>

</style>
