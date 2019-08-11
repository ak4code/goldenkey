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
				the_archive_title( '<h1 class="uk-h2 gk-title gk-heading-border">', '</h1>' );
				?>
			</header><!-- .page-header -->
			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();
				var_dump( is_post_type_archive() );
				if ( is_post_type_archive() ) {
					get_template_part( 'template-parts/realty/item', 'list' );
				} else {
					get_template_part( 'template-parts/post/content', 'preview' );
				}
			endwhile; // End the loop.
		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif; ?>
	</div>

<?php
get_footer();