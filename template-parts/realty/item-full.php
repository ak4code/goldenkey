<?php
/**
 * @package realtor
 * created by akweb
 */
$post_id  = get_the_ID();
$property = pods( 'realty', $post_id );

?>

<div class="uk-flex uk-flex-wrap uk-grid-small uk-margin-top" uk-grid>
    <div class="uk-width-3-4@m gk-property-full">
        <div class="uk-card uk-card-body uk-card-small uk-border-rounded uk-card-default uk-box-shadow-medium">
            <div class="uk-flex uk-flex-wrap uk-flex-middle">
                <div class="uk-width-2-3@m">
                    <h1 class="gk-property-title uk-margin-remove"><?php echo the_title(); ?></h1>
                    <div class="uk-text-small">Код объекта: <?php echo $property->display( 'code_object' ); ?></div>
                    <div class="uk-text-small uk-margin-bottom"><?php echo $property->display( 'city' ) . ', ' . $property->display( 'address' ); ?></div>
                </div>
                <div class="uk-width-1-3@m uk-text-center">
                    <span class="gk-property-price"><?php echo $property->display( 'price' ); ?> руб.</span>
                </div>
            </div>
            <div class="uk-position-relative uk-margin-top uk-dark" uk-slideshow="animation: fade">

                <div class="uk-position-relative">
                    <ul class="uk-slideshow-items uk-position-relative" uk-lightbox="animation: slide">
						<?php
						$image       = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
						$image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'thumbnail' );
						$photos      = get_post_meta( $post_id, 'photos' );
						?>
                        <li>
                            <a href="<?php echo $image[0]; ?>">
                                <img src="<?php echo $image[0]; ?>" class="uk-align-center" style="height: 100%;">
                            </a>
                        </li>
						<?php foreach ( $photos as $photo ): ?>
                            <li>
                                <a href="<?php echo pods_image_url( $photo, 'original' ); ?>">
                                    <img src="<?php echo pods_image_url( $photo, 'original' ); ?>" alt=""
                                         class="uk-align-center" style="height: 100%;">
                                </a>
                            </li>
						<?php endforeach; ?>
                    </ul>
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous
                       uk-slideshow-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
                       uk-slideshow-item="next"></a>
                </div>

                <div class="gk-thumbnav uk-visible@s uk-margin-top uk-light">
                    <div class="uk-flex uk-flex-center uk-flex-wrap uk-grid-small" uk-grid>
                        <div>
                            <div uk-slideshow-item="0" class="uk-cover-container" style="cursor: pointer">
                                <canvas width="50" height="50"></canvas>
                                <img src="<?php echo $image_thumb[0]; ?>" uk-cover>
                            </div>
                        </div>
						<?php foreach ( $photos as $key => $photo ): ?>
                            <div>
                                <div uk-slideshow-item="<?php echo ++ $key; ?>" class="uk-cover-container"
                                     style="cursor: pointer">
                                    <canvas width="50" height="50"></canvas>
                                    <img src="<?php echo pods_image_url( $photo, 'thumbnail' ); ?>" uk-cover>
                                </div>
                            </div>
						<?php endforeach; ?>
                    </div>
                </div>

            </div>

            <div class="gk-property-description uk-margin-top">
                <h3 class="gk-title gk-heading-border">Описание</h3>
				<?php echo the_content(); ?>
            </div>
            <div class="gk-property-info uk-margin">
                <h3 class="gk-title gk-heading-border">Характеристики объекта</h3>
                <div class="uk-flex uk-flex-wrap uk-child-width-1-2@m uk-grid-small">
                    <div>
                        <dl class="uk-flex uk-flex-wrap uk-grid-small uk-child-width-1-2" uk-grid>
							<?php if ( $property->display( 'code_object' ) ): ?>
                                <dt>Код объекта:</dt>
                                <dd><?php echo $property->display( 'code_object' ); ?></dd>
							<?php endif; ?>
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
							<?php if ( $property->display( 'rooms' ) ): ?>
                                <dt>Всего комнат:</dt>
                                <dd><?php echo $property->display( 'rooms' ); ?></dd>
							<?php endif; ?>
							<?php if ( $property->display( 'state' ) ): ?>
                                <dt>Состояние:</dt>
                                <dd><?php echo $property->display( 'state' ); ?></dd>
							<?php endif; ?>
							<?php if ( $property->display( 'house_type' ) ): ?>
                                <dt>Тип дома:</dt>
                                <dd><?php echo $property->display( 'house_type' ); ?></dd>
							<?php endif; ?>
							<?php if ( $property->display( 'year_build' ) ): ?>
                                <dt>Год постройки:</dt>
                                <dd><?php echo $property->display( 'year_build' ); ?></dd>
							<?php endif; ?>
                        </dl>
                    </div>
                    <div>
                        <dl class="uk-flex uk-flex-wrap uk-grid-small uk-child-width-1-2" uk-grid>
							<?php if ( $property->display( 'floor' ) ): ?>
                                <dt>Этаж:</dt>
                                <dd><?php echo $property->display( 'floor' ); ?></dd>
							<?php endif; ?>
							<?php if ( $property->display( 'floors' ) ): ?>
                                <dt>Этажей:</dt>
                                <dd><?php echo $property->display( 'floors' ); ?></dd>
							<?php endif; ?>
							<?php if ( $property->display( 'facade_plot' ) ): ?>
                                <dt>Фасад участка:</dt>
                                <dd><?php echo $property->display( 'facade_plot' ); ?> м.</dd>
							<?php endif; ?>
							<?php if ( $property->display( 'rent_date_year' ) ): ?>
                                <dt>Срок сдачи:</dt>
                                <dd><?php echo $property->display( 'rent_date_year' ) . ' ' . $property->display( 'rent_date_kvartal' ); ?></dd>
							<?php endif; ?>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="gk-property-map uk-margin">
                <h3 class="gk-title gk-heading-border">Объект на карте</h3>
                <div id="property-map" style="width: 100%; min-height: 350px;"
                     data-lat="<?php echo $property->display( 'lat' ); ?>"
                     data-lng="<?php echo $property->display( 'lng' ); ?>"></div>
            </div>
        </div>
    </div>
    <div class="uk-width-1-4@m">
        <div class="uk-card uk-card-body uk-card-small uk-border-rounded uk-card-secondary uk-box-shadow-medium">
            <h4 class="gk-widget-h4">Поиск недвижимости</h4>
            <search-realty></search-realty>
        </div>
		<?php if ( is_active_sidebar( 'sidebar_realty' ) ) {
			dynamic_sidebar( 'sidebar_realty' );
		}
		?>
    </div>
</div>
