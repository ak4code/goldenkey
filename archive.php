<?php
/**
 * The template for displaying archive pages
 *
 * @package goldenkey
 */

get_header();
?>
    <div class="uk-container gk-page">
		<?php if ( have_posts() ) : ?>
        <header class="page-header uk-margin-top">
			<?php
			the_archive_title( '<h1 class="uk-h2 page-title gk-title gk-heading-border">', '</h1>' );
			?>
        </header><!-- .page-header -->
        <div class="uk-flex uk-grid-small uk-flex-wrap" uk-grid>
            <div class="uk-width-3-4@m">
                <div class="uk-flex uk-child-width-1-1 uk-grid-small" uk-grid>
					<?php
					// Start the Loop.
					while ( have_posts() ) :
						the_post();
						if ( is_tax( '', 'realty-type' ) ) {
							get_template_part( 'template-parts/realty/property-list-item' );
						} else {
							get_template_part( 'template-parts/post/content', 'preview' );
						}
					endwhile; // End the loop.
					// If no content, include the "No posts found" template.
					else :
						get_template_part( 'template-parts/post/content', 'none' );
					endif; ?>
                </div>
            </div>
            <div class="uk-width-1-4@m"></div>
        </div>
    </div>

<?php
get_footer();