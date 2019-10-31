<?php
/**
 * @package realtor
 * created by akweb
 */
$image_url = get_the_post_thumbnail_url( $post->ID );
$property  = pods( 'realty', $post->ID );
?>

<div class="gk-realty-object">
    <div class="uk-card uk-card-small uk-position-relative uk-card-default uk-card-body uk-border-rounded">
        <div class="uk-flex uk-flex-wrap uk-grid-small" uk-grid>
            <div class="uk-width-1-3@m">
                <a href="<?php echo get_permalink( $post->ID ); ?>">
                    <div class="gk-property-image uk-border-rounded uk-position-relative"
                         style="background-image: url(<?php echo $image_url; ?>)">
	                    <?php if ( $property->field( 'sale' ) ): ?>
                            <div class="sale">
                                ПРОДАНО
                            </div>
	                    <?php endif; ?>
                    </div>
                </a>
            </div>
            <div class="uk-width-2-3@m">
                <a href="<?php echo get_permalink( $post->ID ); ?>">
                    <h3 class="gk-thin-title uk-margin-remove"><?php echo $post->post_title; ?></h3>
                </a>
                <div>
                    <small>Код объекта: <?php echo $property->display( 'code_object' ); ?></small>
                </div>
                <div>
                    <small><?php echo "{$property->display('city')}, {$property->display('address')}"; ?></small>
                </div>
                <div class="uk-margin-small">
                    <span class="gk-property-price"><?php echo "{$property->display('price')} руб."; ?></span>
                </div>
                <div class="gk-property-description uk-overflow-auto">
                    <div class="uk-flex uk-flex-wrap uk-grid uk-child-width-1-2@m">
                        <div>
                            <dl class="uk-flex uk-flex-wrap uk-grid-small uk-child-width-1-2">
								<?php if ( $property->display( 'square' ) ): ?>
                                    <dt>Площадь:</dt>
                                    <dd><?php echo $property->display( 'square' ); ?> м<sup>2</sup></dd>
								<?php endif; ?>
								<?php if ( $property->display( 'square_live' ) ): ?>
                                    <dt>Площадь жилая:</dt>
                                    <dd><?php echo $property->display( 'square_live' ); ?> м<sup>2</sup></dd>
								<?php endif; ?>
								<?php if ( $property->display( 'square_kitchen' ) ): ?>
                                    <dt>Площадь кухни:</dt>
                                    <dd><?php echo $property->display( 'square_kitchen' ); ?> м<sup>2</sup></dd>
								<?php endif; ?>
								<?php if ( $property->display( 'square_plot' ) ): ?>
                                    <dt>Площадь участка:</dt>
                                    <dd><?php echo $property->display( 'square_plot' ); ?> сот.</dd>
								<?php endif; ?>
                            </dl>
                        </div>
                        <div>
                            <dl class="uk-flex uk-flex-wrap uk-grid-small uk-child-width-1-2">
								<?php if ( $property->display( 'rooms' ) ): ?>
                                    <dt>Всего комнат:</dt>
                                    <dd><?php echo $property->display( 'rooms' ); ?></dd>
								<?php endif; ?>
								<?php if ( $property->display( 'floor' ) ): ?>
                                    <dt>Этаж:</dt>
                                    <dd><?php echo $property->display( 'floor' ); ?></dd>
								<?php endif; ?>
								<?php if ( $property->display( 'floors' ) ): ?>
                                    <dt>Этажей:</dt>
                                    <dd><?php echo $property->display( 'floors' ); ?></dd>
								<?php endif; ?>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="<?php echo get_permalink( $post->ID ); ?>" class="uk-position-bottom-right gk-property-more"><span class="text">Подробнее</span>
            <span class="gk-primary-color"> > </span></a>
    </div>
</div>
