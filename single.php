<?php
/**
 * @package realtor
 * created by akweb
 */

get_header(); ?>
    <div class="uk-container gk-page">
		<?php while ( have_posts() ) {
			the_post();
			if ( get_post_type() === 'realty' ) {
				get_template_part( '/template-parts/realty/item', 'full' );
			}
		} ?>
    </div>

<?php get_footer();