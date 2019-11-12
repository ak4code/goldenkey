<?php
/**
 * @package realtor
 * created by akweb
 */

header( 'Content-Type: ' . feed_content_type( 'rss-http' ) . '; charset=' . get_option( 'blog_charset' ), true );
echo '<?xml version="1.0" encoding="' . get_option( 'blog_charset' ) . '"?>';

$property = pods( 'realty', array(
	'orderby' => 't.post_date DESC',
	'limit'   => - 1  // Return all rows
) );


?>

<feed>
    <feed_version>2</feed_version>
	<?php if ( 0 < $property->total() ):
		while ( $property->fetch() ):
			$photos = get_post_meta( $property->field( 'id' ), 'photos' );
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $property->field( 'id' ) ), 'full' );
			if ( $property->field( 'cian_category' ) == 'flatSale' ):
				?>
                <object>
                    <Category><?php echo $property->field( 'cian_category' ); ?></Category>
                    <ExternalId><?php echo $property->field( 'id' ); ?></ExternalId>
                    <Description><?php echo html_entity_decode( $property->field( 'post_content' ) ); ?></Description>
                    <Address><?php echo $property->field( 'city' ) . ', ' . $property->field( 'address' ); ?></Address>
                    <FlatRoomsCount>
						<?php if ( $property->field( 'rooms' ) == 'Студия' ) {
							echo 9;
						} else {
							echo $property->field( 'rooms' );
						} ?>
                    </FlatRoomsCount>
                    <TotalArea><?php echo $property->field( 'square' ); ?></TotalArea>
                    <FloorNumber><?php echo $property->field( 'floor' ); ?></FloorNumber>
                    <LivingArea><?php echo $property->display( 'square_live' ); ?></LivingArea>
                    <KitchenArea><?php echo $property->display( 'square_kitchen' ); ?></KitchenArea>
                    <Phones>
                        <PhoneSchema>
                            <CountryCode>+7</CountryCode>
                            <Number>9886687797</Number>
                        </PhoneSchema>
                    </Phones>
					<?php if ( ! empty( $photos ) ): ?>
                        <Photos>
                            <PhotoSchema>
                                <FullUrl><?php echo $image[0]; ?></FullUrl>
                                <IsDefault>true</IsDefault>
                            </PhotoSchema>
							<?php foreach ( $photos as $photo ): ?>
                                <PhotoSchema>
                                    <FullUrl><?php echo pods_image_url( $photo, 'original' ); ?></FullUrl>
                                    <IsDefault>false</IsDefault>
                                </PhotoSchema>
							<?php endforeach; ?>
                        </Photos>
					<?php endif; ?>
                    <Building>
                        <FloorsCount><?php echo $property->field( 'floors' ); ?></FloorsCount>
                    </Building>
                    <BargainTerms>
                        <Price><?php echo $property->field( 'price' ); ?></Price>
                        <SaleType>alternative</SaleType>
                    </BargainTerms>
                </object>
			<?php
            elseif ( $property->field( 'cian_category' ) == 'houseSale' ):
				?>
                <object>
                    <Category><?php echo $property->field( 'cian_category' ); ?></Category>
                    <ExternalId><?php echo $property->field( 'id' ); ?></ExternalId>
                    <Description><?php echo html_entity_decode( $property->field( 'post_content' ) ); ?></Description>
                    <Address><?php echo $property->field( 'city' ) . ', ' . $property->field( 'address' ); ?></Address>
                    <TotalArea><?php echo $property->field( 'square' ); ?></TotalArea>
                    <Phones>
                        <PhoneSchema>
                            <CountryCode>+7</CountryCode>
                            <Number>9886687797</Number>
                        </PhoneSchema>
                    </Phones>
					<?php if ( ! empty( $photos ) ): ?>
                        <Photos>
                            <PhotoSchema>
                                <FullUrl><?php echo $image[0]; ?></FullUrl>
                                <IsDefault>true</IsDefault>
                            </PhotoSchema>
							<?php foreach ( $photos as $photo ): ?>
                                <PhotoSchema>
                                    <FullUrl><?php echo pods_image_url( $photo, 'original' ); ?></FullUrl>
                                    <IsDefault>false</IsDefault>
                                </PhotoSchema>
							<?php endforeach; ?>
                        </Photos>
					<?php endif; ?>
                    <Building>
                        <FloorsCount><?php echo $property->field( 'floors' ); ?></FloorsCount>
                    </Building>
                    <Land>
                        <Area><?php echo $property->field( 'square_plot' ); ?></Area>
                        <AreaUnitType>sotka</AreaUnitType>
                    </Land>
                    <BargainTerms>
                        <Price><?php echo $property->field( 'price' ); ?></Price>
                    </BargainTerms>
                </object>
			<?php
            elseif ( $property->field( 'cian_category' ) == 'cottageSale' ):
				?>
                <object>
                    <Category><?php echo $property->field( 'cian_category' ); ?></Category>
                    <ExternalId><?php echo $property->field( 'id' ); ?></ExternalId>
                    <Description><?php echo html_entity_decode( $property->field( 'post_content' ) ); ?></Description>
                    <Address><?php echo $property->field( 'city' ) . ', ' . $property->field( 'address' ); ?></Address>
                    <TotalArea><?php echo $property->field( 'square' ); ?></TotalArea>
                    <Phones>
                        <PhoneSchema>
                            <CountryCode>+7</CountryCode>
                            <Number>9886687797</Number>
                        </PhoneSchema>
                    </Phones>
					<?php if ( ! empty( $photos ) ): ?>
                        <Photos>
                            <PhotoSchema>
                                <FullUrl><?php echo $image[0]; ?></FullUrl>
                                <IsDefault>true</IsDefault>
                            </PhotoSchema>
							<?php foreach ( $photos as $photo ): ?>
                                <PhotoSchema>
                                    <FullUrl><?php echo pods_image_url( $photo, 'original' ); ?></FullUrl>
                                    <IsDefault>false</IsDefault>
                                </PhotoSchema>
							<?php endforeach; ?>
                        </Photos>
					<?php endif; ?>
                    <Building>
                        <FloorsCount><?php echo $property->field( 'floors' ); ?></FloorsCount>
                    </Building>
                    <Land>
                        <Area><?php echo $property->field( 'square_plot' ); ?></Area>
                        <AreaUnitType>sotka</AreaUnitType>
                    </Land>
                    <BargainTerms>
                        <Price><?php echo $property->field( 'price' ); ?></Price>
                    </BargainTerms>
                </object>
            <?php
            elseif ( $property->field( 'cian_category' ) == 'townhouseSale' ):
				?>
                <object>
                    <Category><?php echo $property->field( 'cian_category' ); ?></Category>
                    <ExternalId><?php echo $property->field( 'id' ); ?></ExternalId>
                    <Description><?php echo html_entity_decode( $property->field( 'post_content' ) ); ?></Description>
                    <Address><?php echo $property->field( 'city' ) . ', ' . $property->field( 'address' ); ?></Address>
                    <TotalArea><?php echo $property->field( 'square' ); ?></TotalArea>
                    <Phones>
                        <PhoneSchema>
                            <CountryCode>+7</CountryCode>
                            <Number>9886687797</Number>
                        </PhoneSchema>
                    </Phones>
		            <?php if ( ! empty( $photos ) ): ?>
                        <Photos>
                            <PhotoSchema>
                                <FullUrl><?php echo $image[0]; ?></FullUrl>
                                <IsDefault>true</IsDefault>
                            </PhotoSchema>
				            <?php foreach ( $photos as $photo ): ?>
                                <PhotoSchema>
                                    <FullUrl><?php echo pods_image_url( $photo, 'original' ); ?></FullUrl>
                                    <IsDefault>false</IsDefault>
                                </PhotoSchema>
				            <?php endforeach; ?>
                        </Photos>
		            <?php endif; ?>
                    <Building>
                        <FloorsCount><?php echo $property->field( 'floors' ); ?></FloorsCount>
                    </Building>
                    <Land>
                        <Area><?php echo $property->field( 'square_plot' ); ?></Area>
                        <AreaUnitType>sotka</AreaUnitType>
                    </Land>
                    <BargainTerms>
                        <Price><?php echo $property->field( 'price' ); ?></Price>
                    </BargainTerms>
                </object>
            <?php
            elseif ( $property->field( 'cian_category' ) == 'landSale' ):
				?>
                <object>
                    <Category><?php echo $property->field( 'cian_category' ); ?></Category>
                    <ExternalId><?php echo $property->field( 'id' ); ?></ExternalId>
                    <Description><?php echo html_entity_decode( $property->field( 'post_content' ) ); ?></Description>
                    <Address><?php echo $property->field( 'city' ) . ', ' . $property->field( 'address' ); ?></Address>
                    <Phones>
                        <PhoneSchema>
                            <CountryCode>+7</CountryCode>
                            <Number>9886687797</Number>
                        </PhoneSchema>
                    </Phones>
		            <?php if ( ! empty( $photos ) ): ?>
                        <Photos>
                            <PhotoSchema>
                                <FullUrl><?php echo $image[0]; ?></FullUrl>
                                <IsDefault>true</IsDefault>
                            </PhotoSchema>
				            <?php foreach ( $photos as $photo ): ?>
                                <PhotoSchema>
                                    <FullUrl><?php echo pods_image_url( $photo, 'original' ); ?></FullUrl>
                                    <IsDefault>false</IsDefault>
                                </PhotoSchema>
				            <?php endforeach; ?>
                        </Photos>
		            <?php endif; ?>
                    <Land>
                        <Area><?php echo $property->field( 'square_plot' ); ?></Area>
                        <AreaUnitType>sotka</AreaUnitType>
                    </Land>
                    <BargainTerms>
                        <Price><?php echo $property->field( 'price' ); ?></Price>
                    </BargainTerms>
                </object>
            <?php
            elseif ( $property->field( 'cian_category' ) == 'businessSale' ):
				?>
                <object>
                    <Category><?php echo $property->field( 'cian_category' ); ?></Category>
                    <ExternalId><?php echo $property->field( 'id' ); ?></ExternalId>
                    <Description><?php echo html_entity_decode( $property->field( 'post_content' ) ); ?></Description>
                    <Address><?php echo $property->field( 'city' ) . ', ' . $property->field( 'address' ); ?></Address>
                    <TotalArea><?php echo $property->field( 'square' ); ?></TotalArea>
                    <FloorNumber><?php echo $property->field( 'floor' ); ?></FloorNumber>
                    <Phones>
                        <PhoneSchema>
                            <CountryCode>+7</CountryCode>
                            <Number>9886687797</Number>
                        </PhoneSchema>
                    </Phones>
		            <?php if ( ! empty( $photos ) ): ?>
                        <Photos>
                            <PhotoSchema>
                                <FullUrl><?php echo $image[0]; ?></FullUrl>
                                <IsDefault>true</IsDefault>
                            </PhotoSchema>
				            <?php foreach ( $photos as $photo ): ?>
                                <PhotoSchema>
                                    <FullUrl><?php echo pods_image_url( $photo, 'original' ); ?></FullUrl>
                                    <IsDefault>false</IsDefault>
                                </PhotoSchema>
				            <?php endforeach; ?>
                        </Photos>
		            <?php endif; ?>
                    <Building>
                        <FloorsCount><?php echo $property->field( 'floors' ); ?></FloorsCount>
                    </Building>
                    <BargainTerms>
                        <Price><?php echo $property->field( 'price' ); ?></Price>
                    </BargainTerms>
                </object>
            <?php
            elseif ( $property->field( 'cian_category' ) == 'freeAppointmentObjectSale' ):
				?>
                <object>
                    <Category><?php echo $property->field( 'cian_category' ); ?></Category>
                    <ExternalId><?php echo $property->field( 'id' ); ?></ExternalId>
                    <Description><?php echo html_entity_decode( $property->field( 'post_content' ) ); ?></Description>
                    <Address><?php echo $property->field( 'city' ) . ', ' . $property->field( 'address' ); ?></Address>
                    <TotalArea><?php echo $property->field( 'square' ); ?></TotalArea>
                    <FloorNumber><?php echo $property->field( 'floor' ); ?></FloorNumber>
                    <Phones>
                        <PhoneSchema>
                            <CountryCode>+7</CountryCode>
                            <Number>9886687797</Number>
                        </PhoneSchema>
                    </Phones>
		            <?php if ( ! empty( $photos ) ): ?>
                        <Photos>
                            <PhotoSchema>
                                <FullUrl><?php echo $image[0]; ?></FullUrl>
                                <IsDefault>true</IsDefault>
                            </PhotoSchema>
				            <?php foreach ( $photos as $photo ): ?>
                                <PhotoSchema>
                                    <FullUrl><?php echo pods_image_url( $photo, 'original' ); ?></FullUrl>
                                    <IsDefault>false</IsDefault>
                                </PhotoSchema>
				            <?php endforeach; ?>
                        </Photos>
		            <?php endif; ?>
                    <Building>
                        <FloorsCount><?php echo $property->field( 'floors' ); ?></FloorsCount>
                    </Building>
                    <BargainTerms>
                        <Price><?php echo $property->field( 'price' ); ?></Price>
                    </BargainTerms>
                </object>
			<?php
			endif;
		endwhile;
	endif; ?>
</feed>
