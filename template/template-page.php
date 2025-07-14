<?php
/*Template Name: plantilla page*/
get_header();
$categoria = get_post_meta(get_the_ID(), 'custom_field_lugares_visitar', true);
$images = get_post_meta(get_the_ID(), 'vdw_gallery_id', true);
?>
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
    <div class="container-xl">

        <div class="text_h2">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="wp_page page_plantilla">
            <?php the_content(); ?>
        </div>
    </div>
    <div class="container-xl">
        <?php get_template_part('template-parts/reviews') ?>
        <?php get_template_part('template-parts/certificados') ?>
    </div>
<?php
get_footer();
?>