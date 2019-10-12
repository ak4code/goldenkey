<template>
    <div>
        <a href="#comment-modal" uk-toggle class="uk-button uk-button-primary uk-button-small">Добавить отзыв</a>
        <div id="comment-modal" class="uk-flex-top" uk-modal>
            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

                <button class="uk-modal-close-default" type="button" uk-close></button>

                <form id="gk-feedback" class="uk-flex uk-flex-wrap" v-on:submit.prevent="onSubmit">
                    <div class="uk-width-1-2@m uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                        <input name="name" class="uk-input" v-model="author_name" type="text" placeholder="Ваше имя"
                               required>
                    </div>
                    <div class="uk-width-1-2@m uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: mail"></span>
                        <input name="email" class="uk-input" v-model="author_email" type="email" placeholder="Ваш email"
                               required>
                    </div>
                    <div class="uk-width-1-1 uk-margin-small-top">
                                <textarea name="text" class="uk-textarea" rows="3"
                                          placeholder="Ваш отзыв" v-model="content"></textarea>
                    </div>
                    <input type="hidden" :value="post">
                    <div class="uk-width-1-2@m"></div>
                    <div class="uk-width-1-2@m uk-text-right">
                        <div class="uk-padding-small uk-padding-remove-horizontal uk-padding-remove-bottom">
                            <button type="submit" class="uk-button uk-button-primary">Отправить</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'comment-modal',
        props: ['post'],
        data: () => ({
            author_name: '',
            author_email: '',
            content: '',
            error: ''
        }),
        methods: {
            async onSubmit (event) {
                await this.$axios.post(`wp/v2/comments`, {
                    author_name: this.author_name,
                    author_email: this.author_email,
                    content: this.content,
                    post: this.post
                })
                    .then(r => {
                        UIkit.modal('#comment-modal').hide()

                        UIkit.notification({
                            message: '<span uk-icon=\'icon: check\'></span> Ваш отзыв отправлен и будет опубликован после проверки!',
                            status: 'primary',
                            pos: 'top-right',
                            timeout: 5000
                        })
                    })
                    .catch(e => {
                        UIkit.modal('#comment-modal').hide()

                        UIkit.notification({
                            message: e.response.data.message,
                            status: 'danger',
                            pos: 'top-right',
                            timeout: 5000
                        })
                    })
            }
        }
    }
</script>

<style scoped>
    input {
        border: 1px solid goldenrod;
    }

    textarea {
        border: 1px solid goldenrod;
    }
</style>
