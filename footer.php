<footer class="gk-footer uk-margin-top uk-padding uk-padding-remove-horizontal uk-dark">
    <div class="uk-container">
        <div class="uk-flex uk-grid-small uk-flex-wrap uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-1">
			<?php if ( is_active_sidebar( 'footer' ) ) {
				dynamic_sidebar( 'footer' );
			}
			?>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>