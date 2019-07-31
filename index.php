<?php
/**
 * @package realtor
 * created by akweb
 */

get_header();


if ( have_posts() ) {

	// Load posts loop.
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/post/content', 'preview' );
	}

} else {

	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/post/content', 'none' );

}

?>

<?php get_footer();