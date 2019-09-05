<footer class="gk-footer uk-margin-top uk-padding uk-padding-remove-horizontal uk-dark">
    <div class="uk-container">
        <div class="uk-flex uk-grid-small uk-flex-wrap uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-1">
			<?php if ( is_active_sidebar( 'footer' ) ) {
				dynamic_sidebar( 'footer' );
			}
			?>
        </div>
        <div class="uk-flex-center uk-flex">
            <div>
                <!-- Yandex.Metrika informer -->
                <a href="https://metrika.yandex.ru/stat/?id=54955096&amp;from=informer"
                   target="_blank" rel="nofollow"><img
                            src="https://informer.yandex.ru/informer/54955096/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
                            style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика"
                            title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)"
                            class="ym-advanced-informer" data-cid="54955096" data-lang="ru"/></a>
                <!-- /Yandex.Metrika informer -->
            </div>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>