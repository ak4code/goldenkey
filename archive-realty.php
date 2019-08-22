<?php
/**
 * The template for displaying archive pages
 *
 * @package goldenkey
 */

get_header();
?>
    <div class="uk-container gk-page">
        <header class="page-header uk-margin-top">
			<?php
			the_archive_title( '<h1 class="uk-h2 gk-title gk-heading-border">', '</h1>' );
			?>
        </header><!-- .page-header -->
        <div class="uk-flex uk-grid-small uk-flex-wrap" uk-grid>
            <div class="uk-width-3-4@m">
				<?php if ( have_posts() ) : ?>
                    <div class="uk-flex uk-child-width-1-1 uk-grid-small" uk-grid>
						<?php
						// Start the Loop.
						while ( have_posts() ) :
							the_post();
							if ( is_post_type_archive() ) {
								get_template_part( 'template-parts/realty/property-list-item' );
							} else {
								get_template_part( 'template-parts/post/content', 'preview' );
							}
						endwhile; // End the loop.?>
                    </div>
                    <div>
						<?php //Pagination
						gk_the_posts_navigation();
						?>
                    </div>

				<?php // If no content, include the "No posts found" template.
				else :
					get_template_part( 'template-parts/post/content', 'none' );
				endif; ?>
            </div>
            <div class="uk-width-1-4@m">
                <div class="uk-card uk-card-body uk-card-small uk-border-rounded uk-card-secondary uk-box-shadow-medium">
                    <h4 class="gk-widget-h4">Поиск недвижимости</h4>
                    <search-realty></search-realty>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();