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
                <div class="gk-property-image uk-border-rounded"
                     style="background-image: url(<?php echo $image_url; ?>)">
                </div>
            </div>
            <div class="uk-width-2-3@m">
                <h3 class="gk-thin-title uk-margin-remove"><?php echo $post->post_title; ?></h3>
                <div>
                    <small>Код объекта: <?php echo $property->display( 'code_object' ); ?></small>
                </div>
                <div>
                    <small><?php echo "{$property->display('city')}, {$property->display('address')}"; ?></small>
                </div>
                <div class="uk-margin-small">
                    <span class="gk-property-price"><?php echo "{$property->display('price')} руб."; ?></span>
                </div>
                <div class="gk-property-description">
                    <div class="uk-flex uk-flex-wrap uk-grid uk-child-width-1-2@m">
                        <div>
                            <dl class="uk-flex uk-flex-wrap uk-grid-small uk-child-width-1-2">
                                <dt>Площадь:</dt>
                                <dd><?php echo $property->display( 'square' ); ?> м<sup>2</sup></dd>
                                <dt>Всего комнат:</dt>
                                <dd><?php echo $property->display( 'rooms' ); ?></dd>
                                <dt>Этаж:</dt>
                                <dd><?php echo $property->display( 'floor' ); ?></dd>
                                <dt>Этажей:</dt>
                                <dd><?php echo $property->display( 'floors' ); ?></dd>
                            </dl>
                        </div>
                        <div>
                            <dl class="uk-flex uk-flex-wrap uk-grid-small uk-child-width-1-2">
                                <dt>Площадь жилая:</dt>
                                <dd><?php echo $property->display( 'square_live' ); ?> м<sup>2</sup></dd>
                                <dt>Площадь кухни:</dt>
                                <dd><?php echo $property->display( 'square_kitchen' ); ?> м<sup>2</sup></dd>
                                <dt>Площадь участка:</dt>
                                <dd><?php echo $property->display( 'square_plot' ); ?> сот.</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="<?php echo get_permalink( $post->ID ); ?>" class="uk-position-bottom-right gk-property-more">Подробнее
            <span class="gk-primary-color"> > </span></a>
    </div>
</div>
