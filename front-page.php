<?php
/**
 * @package realtor
 * created by akweb
 **/

get_header();
?>

<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/page/home' );
	}

} else {
	get_template_part( 'template-parts/post/content', 'none' );
}
?>


<?php get_footer();