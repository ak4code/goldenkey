<template>
    <div class="uk-card uk-card-body uk-card-small uk-border-rounded uk-card-default uk-box-shadow-medium">
        <ul id="comment-list" class="uk-comment-list">
            <li v-for="comment in comments" v-bind:key="comment.id">
                <article class="uk-comment uk-comment-primary">
                    <header class="uk-comment-header uk-position-relative">
                        <div class="uk-grid-medium uk-flex-middle" uk-grid>
                            <div class="uk-width-expand">
                                <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">{{comment.author_name}}</a>
                                </h4>
                                <p class="uk-comment-meta uk-margin-remove-top"><a class="uk-link-reset" href="#">{{comment.date|date}}</a>
                                </p>
                            </div>
                        </div>
                    </header>
                    <div class="uk-comment-body" v-html="comment.content.rendered">
                    </div>
                </article>
                <hr class="uk-divider-icon">
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: 'comment-list',
        props: ['post'],
        data: () => ({
            comments: [],
        }),
        created () {
            this.getComments()
        },
        methods: {
            async getComments () {
                await this.$axios.get(`wp/v2/comments?post=${this.post}&status=approve`)
                    .then(r => {
                        this.comments = r.data
                    })
                    .catch(e => console.log(e))
            }
        },
        filters: {
            date: function (value) {
                if (!value) return ''
                return new Date(value).toLocaleString()
            }
        }
    }
</script>

<style scoped>

</style>
