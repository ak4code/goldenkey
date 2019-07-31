<?php
/**
 * @package realtor
 * created by akweb
 */

$terms = get_terms( 'realty_type', [
	'hide_empty' => false,
	'fields'     => 'all',
	'meta_query' => array(
		array(
			'key'     => 'show_home',
			'compare' => '=',
			'value'   => '1'
		)
	)
] );
?>

<div class="uk-container">
	<?php if ( $terms ): ?>
        <div class="uk-flex uk-flex-wrap uk-child-width-1-4@m uk-child-width-1-5@l uk-child-width-1-2@s uk-child-width-1-1 uk-margin-top">
			<?php foreach ( $terms as $term ): ?>
                <div>
					<?php
					set_query_var( 'objectType', $term );
					get_template_part( 'template-parts/category/type', 'tile' );
					?>
                </div>
			<?php endforeach; ?>
        </div>
	<?php endif; ?>
    <div class="uk-card uk-card-body uk-box-shadow-small uk-border-rounded uk-card-default uk-margin-top">
        <h1 class="gk-title uk-text-center"><?php the_title(); ?></h1>
        <div>
			<?php the_content(); ?>
        </div>
    </div>

</div>

