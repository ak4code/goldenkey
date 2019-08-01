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

            <header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
            </header><!-- .page-header -->

			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content', 'preview' );

				// End the loop.
			endwhile;


		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/post/content', 'none' );

		endif;
		?>
    </div>
<?php
get_footer();