<?php
/**
 * @package realtor
 * created by akweb
 */

get_header(); ?>
    <div class="uk-container gk-page">
		<?php if ( get_query_var( 'post_type' ) === 'realty' ): ?>
            <h1 class="uk-h2 gk-title gk-heading-border uk-text-uppercase uk-margin-top">Поиск недвижимости</h1>
            <div class="uk-flex uk-grid-small uk-flex-wrap" uk-grid>
                <div class="uk-width-3-4@m">
                    <search-result
                            code-object="<?php echo $_GET['code_object']; ?>"
                            :square='<?php echo json_encode( $_GET['square'] ); ?>'
                            :price='<?php echo json_encode( $_GET['price'] ); ?>'
                            page="<?php echo $_GET['page']; ?>"
                    ></search-result>
                </div>
                <div class="uk-width-1-4@m"></div>
            </div>
		<?php else: ?>
            <h1 class="uk-h2 gk-title gk-heading-border uk-text-uppercase uk-margin-top">Поиск по сайту</h1>
			<?php if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/post/content', 'none' );


				endwhile;

			else:
				get_template_part( 'template-parts/post/content', 'none' );
			endif;
		endif; ?>
    </div>
<?php get_footer();