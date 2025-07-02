<?php
function my_custom_fields_metabox() {
  $current_screen = get_current_screen();
  if ($current_screen->post_type === 'tour') {
      add_meta_box('custom-fields-metabox', 'Campos personalizados', 'my_custom_fields', 'tour', 'normal', 'high');
  }
  if ($current_screen->post_type === 'page') {
      add_meta_box('custom-fields-metabox-page', 'Campos personalizados Pagina', 'my_custom_fields_page', 'page', 'normal', 'high');
  }
    
}
add_action( 'add_meta_boxes', 'my_custom_fields_metabox' );

function my_custom_fields_page($post) {
  $custom_field_lugares_visitar = get_post_meta($post->ID, 'custom_field_lugares_visitar', true);

  wp_nonce_field('custom_fields_metabox_page', 'custom_fields_metabox_nonce_page'); ?>
  <style>
    .content__cp
    {
      width: 100%;
      overflow:hidden
    }
    .cont_wp
    {
      border-top:1px solid #ddd;
      display:flex;
      align-items:center;
      padding: 15px 0;
    }
    .content__cp div select
    {
      border-color: #ddd;
      height: 40px;
      font-size: 13px;
      outline: none;
      width: 100%;
    }
    .content__cp strong
    {
      width:15%
    }
    .cont_wp input
    {
      border-color: #ddd;
      height: 40px;
      width: 81%
    }
    .cargar_imagen
    {
      color: #fff;
      border: #E91E3E;
      background-color: #E91E3E;
      margin-left: 15px;
      height: 40px;
      width: 150px;
      border-radius: 5px;
      outline: none;
      cursor: pointer;
    }
    .w-100{
      width: 100% !important
    }
    div#wp-custom_field_contenido_editor-wrap {
      width: 100%;
    }
  </style>
  <div class="content__cp">
      <div class="cont_wp" style="padding: 15px 0; border-bottom: 1px solid #ddd; margin-bottom: 15px;">
          <strong>Categoria</strong>
          <select name="custom_field_lugares_visitar" id="custom_field_lugares_visitar">
            <option value="">Seleccionar</option>
            <?php
              $categories = get_categories();
              foreach ($categories as $category) {
                $selected = ($custom_field_lugares_visitar == $category->term_id) ? 'selected' : '';
                echo '<option value="' . esc_attr($category->term_id) . '" ' . $selected . '>' . esc_html($category->name) . '</option>';
              }
            ?>
          </select>

      </div>
  </div>
<?php }

function my_custom_fields_save_data($post_id) {
  if ( ! isset( $_POST['custom_fields_metabox_nonce'] ) ) {
    return $post_id;
  }
  $nonce = $_POST['custom_fields_metabox_nonce'];
    if ( !wp_verify_nonce( $nonce, 'custom_fields_metabox' ) ) {
    return $post_id;
  }
  if ( defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
    return $post_id;
  }
  if ( $_POST['post_type'] == 'page' ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
      return $post_id;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
      return $post_id;
  }
   
  $old_custom_field_lugares__visitar = get_post_meta( $post_id, 'custom_field_lugares_visitar', true );

  $custom_field_lugares__visitar = sanitize_text_field( $_POST['custom_field_lugares_visitar'] );

  update_post_meta( $post_id, 'custom_field_lugares_visitar', $custom_field_lugares__visitar, $old_custom_field_lugares__visitar );
}
function my_custom_fields_save_data_page($post_id) {
  if (!isset($_POST['custom_fields_metabox_nonce_page']) || !wp_verify_nonce($_POST['custom_fields_metabox_nonce_page'], 'custom_fields_metabox_page')) {
      return $post_id;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return $post_id;
  }

  if ($_POST['post_type'] == 'page') {
      if (!current_user_can('edit_page', $post_id)) {
          return $post_id;
      }
  } else {
      if (!current_user_can('edit_post', $post_id)) {
          return $post_id;
      }
  }

  update_post_meta($post_id, 'custom_field_lugares_visitar', sanitize_text_field($_POST['custom_field_lugares_visitar']));

}


add_action('save_post', 'my_custom_fields_save_data_page');
?>