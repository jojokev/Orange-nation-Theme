
<div class="swiper-slide">
    <div class="item_tour">
        <div class="img_tour">
            <?php if (has_post_thumbnail()) {
                the_post_thumbnail('medium_large');
            } ?>
            <span class="duration-img-tour"><i class="bi bi-clock-history"></i>
                <?php $dias	= get_field('num_days'); ?>
                    <?php if ( $dias ) { ?>
                        <?php echo $dias ?>
                        <?php
                            $values = $dias;
                            if($values == 1) {
                                if(APP_LANG=='en'){
                                    echo 'day';
                                }else{
                                    echo 'dia';
                                }
                            } else {
                                $night = $values - 1; 
                                if(APP_LANG=='en'){
                                    echo 'days' , ' - ' , ''.$night.'',' nights';
                                }else{
                                    echo 'días' , ' - ' , ''.$night.'',' noches';
                                    }
                            }
                        ?>
                        <?php } else { ?>
                        <?php if(APP_LANG=='en'){
                                echo 'Half day';
                            }else{
                                echo 'Medio día';
                            } 
                        ?>
                <?php } ?>
            </span>
        </div>
        <div class="text_tour">
            <h3>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <div class="cols-text-tour">
                <div class="featured-text-tour">
                    <div class="item_featured_card">
                        <i class="bi bi-reception-4"></i>
                        <div class="text_item_featured_card">
                            <p><strong>Max. Altitude: </strong><?php echo get_field('max_altitude'); ?> m.a.s.l.</p>
                        </div>
                    </div>
                    <div class="item_featured_card">
                        <i class="bi bi-people"></i>
                        <div class="text_item_featured_card">
                            <p><strong>Group Size: </strong><?php echo get_field('group_size'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="price-text-tour">
                    <span>Price from</span>
                    <p><strong><i class="bi bi-currency-dollar"></i><?php echo the_field('from'); ?></strong> / por person</p>
                </div>
            </div>
            <a href="<?php the_permalink(); ?>" class="link-text-tour">View Itinerary <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</div>
        