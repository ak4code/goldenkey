<?php
/**
 * @package realtor
 * created by akweb
 */

$image = wp_get_attachment_image_src( get_post_thumbnail_id( $realty->field( 'id' ) ), 'large' );
?>

<div class="uk-width-1-4@m uk-width-1-4@l uk-width-1-2@s uk-width-1-1">
    <a href="<?php echo get_post_permalink( $realty->field( 'id' ) ); ?>" class="gk-property-item">
        <div class="uk-cover-container uk-border-rounded">
            <canvas width="" height="250"></canvas>
            <img src="<?php echo $image[0]; ?>" uk-cover>
			<?php if ( $realty->field( 'sale' ) ): ?>
            <div class="sale">
                ПРОДАНО
            </div>
			<?php endif; ?>
            <div class="gk-property-price">
				<?php echo $realty->display( 'price' ); ?> руб.
            </div>
            <div class="gk-property-info">
                <h3 class="uk-margin-remove"><?php echo $realty->display( 'post_title' ); ?></h3>
                <small><?php echo $realty->display( 'city' ) . ', ' . $realty->display( 'address' ); ?></small>
            </div>
        </div>
    </a>
</div>
