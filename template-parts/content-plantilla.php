<?php  $images = get_post_meta(get_the_ID(), 'vdw_gallery_id', true); ?>
<section class="">
    <?php if ($images): ?>
        <div class="container-xl">
    <div class="title_single">
        <div>
            <h1><?php the_title(); ?></h1>
            <span><i class="bi bi-clock"></i>
            <?php $dias = get_field('num_days'); ?>
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
            </span>
        </div>
        <span>
            <b><?php echo get_field('from'); ?><sup>USD</sup></b>
            <span>Price per person</span>
        </span>
    </div>
</div>
        <div class="container-xl">
            <div class="single_galler">
                <div class="item_new_gallery">
                    <a href="<?php the_post_thumbnail_url(); ?>" data-fslightbox="gallery">
                        <?php echo the_post_thumbnail('full-size') ?>
                        <span><i class="bi bi-eye"></i> See Photos</span>
                    </a>
                </div>
                <?php
                    if (!empty($images) && is_array($images)) {
                        $limitedImages = array_slice($images, 0, 3);

                        foreach ($limitedImages as $index => $img) :
                    ?>
                            <div class="item_new_gallery">
                                <a href="<?php echo wp_get_attachment_url($img); ?>" data-fslightbox="gallery">
                                    <?php echo wp_get_attachment_image($img, 'full'); ?>
                                </a>
                            </div>
                    <?php
                        endforeach;

                        for ($i = 3; $i < count($images); $i++) :
                    ?>
                            <a href="<?php echo wp_get_attachment_url($images[$i]); ?>" data-fslightbox="gallery"></a>
                    <?php
                        endfor;
                    }
                ?>
            </div>
        </div>
    <?php else: ?>
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="banner_single">
                <?php the_post_thumbnail(); ?>
            </div>
        <?php endif; ?>
        
        <div class="text_h2">
            <h1><?php the_title(); ?></h1>
        </div>
    <?php endif; ?>
</section>

<div class="container-xl">
    <div class="page_plantilla">
        <?php the_content(); ?>
    </div>

    <?php get_template_part('template-parts/reviews') ?>
    <?php get_template_part('template-parts/certificados') ?>
</div>

</div>
