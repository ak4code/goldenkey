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

$special_objects = pods( 'realty', array(
	'limit' => 4,
	'where' => 'special.meta_value = 1',
	'orderby' => 't.post_date DESC',
) );

$new_objects = pods( 'realty', array(
	'limit'   => 12,
	'orderby' => 't.post_date DESC',
) );

?>

<div class="uk-container gk-page">
	<?php if ( $terms ): ?>
        <div class="uk-flex uk-flex-wrap uk-grid-small uk-margin-top" uk-grid>
			<?php foreach ( $terms as $term ): ?>
                <div class="uk-width-1-4@m uk-width-1-4@l uk-width-1-2@s uk-width-1-1">
					<?php
					set_query_var( 'realty_type', $term );
					get_template_part( 'template-parts/category/type', 'tile' );
					?>
                </div>
			<?php endforeach; ?>
        </div>
	<?php endif; ?>
	<?php if ( 0 < $special_objects->total() ): ?>
        <div class="gk-special-object uk-margin-top">
            <h3 class="gk-title gk-heading-border uk-text-uppercase">Спецпредложения</h3>
            <div class="uk-flex uk-flex-wrap uk-grid-small" uk-grid>
				<?php while ( $special_objects->fetch() ) {
					set_query_var( 'realty', $special_objects );
					get_template_part( '/template-parts/realty/item', 'list' );
				} ?>
            </div>
        </div>
	<?php endif; ?>
	<?php if ( 0 < $new_objects->total() ): ?>
        <div class="gk-new-object uk-margin-top">
            <h3 class="gk-title gk-heading-border uk-text-uppercase">Новые объекты</h3>
            <div class="uk-flex uk-flex-wrap uk-grid-small" uk-grid>
				<?php while ( $new_objects->fetch() ) {
					set_query_var( 'realty', $new_objects );
					get_template_part( '/template-parts/realty/item', 'list' );
				} ?>
            </div>
            <div class="uk-flex uk-flex-center">
                <div>
                    <a href="/realty" class="uk-button uk-button-primary uk-margin-top">Посмотреть все объекты</a>
                </div>
            </div>
        </div>
	<?php endif; ?>
    <div class="uk-card uk-card-body uk-box-shadow-small uk-border-rounded uk-card-default uk-margin-top">
        <h1 class="gk-title uk-text-center"><?php the_title(); ?></h1>
        <div>
			<?php the_content(); ?>
        </div>
    </div>

</div>

