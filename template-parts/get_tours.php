<?php
$data=$args;
$array=[];
$num=explode(',',$data['key']);

foreach ($num as $key => $val)
   array_push($array,(int)$val);

$wp= new WP_Query (
    array(
        'type_post' => 'post',
        'posts_per_page'=>-1,
        'order' => 'ASC',
        'orderby' => 'ID', 
        'cat'=>$data['cat']?$data['cat']:null,
        'post__in'=>$data['key']?$array:null,
    ));
$cat_ID=null;
?>
<div class="swiper mySwiper swiperTour">
    <div class="swiper-wrapper">
        <?php if($wp->have_posts()): 
         while($wp->have_posts()): $wp->the_post();
        //  $cat_ID=get_the_ID();
        ?>
        <div class="swiper-slide">
            <div class="item_tour">
                <div class="img_tour">
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail('medium_large');
                    } ?>
                </div>
                <div class="text_tour">
                    <h3>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <div>
                        <?php echo get_field('description'); ?>
                    </div>
                    <div>
                        <div class="item_featured_card">
                            <i class="bi bi-reception-4"></i>
                            <div class="text_item_featured_card">
                                <p><strong>Max. Altitude:</strong></p>
                                <p><?php echo get_field('max_altitude'); ?></p>
                            </div>
                        </div>
                        <div class="item_featured_card">
                            <i class="bi bi-clock-history"></i>
                            <div class="text_item_featured_card">
                                <p><strong>Duration:</strong></p>
                                <p>
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
                                </p>
                            </div>
                        </div>
                        <div class="item_featured_card">
                            <i class="bi bi-people"></i>
                            <div class="text_item_featured_card">
                                <p><strong>Group Size:</strong></p>
                                <p><?php echo get_field('group_size'); ?></p>
                            </div>
                        </div>
                        <div class="item_featured_card">
                            <i class="bi bi-bus-front"></i>
                            <div class="text_item_featured_card">
                                <p><strong>Transportation:</strong></p>
                                <p><?php echo get_field('transportation'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <span>Price from<span>usd <span><?php echo the_field('from'); ?></span></span></span>
                        <a href="<?php the_permalink(); ?>">View Itinerary <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; endif; ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>