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
<div style="margin-top: 50px;">
    <div class="get_page">
        <?php if($wp->have_posts()): 
         while($wp->have_posts()): $wp->the_post();
        ?>
        <div class="page_tour">
            <div class="page_tour_img">
                <?php the_post_thumbnail( 'full' ); ?>
            </div>
            <div class="page_tour_2_info">
                    <h3>
                        <a href="<?php the_permalink(); ?>"><?php the_title()?></a>
                    </h3>   
                    <?php the_excerpt();?>        
                    <a href="<?php the_permalink(); ?>" class="btn1">More information <i class="bi bi-arrow-right"></i>  </a>
            </div>
        </div>
        <?php endwhile; endif; ?>
    </div>
</div>