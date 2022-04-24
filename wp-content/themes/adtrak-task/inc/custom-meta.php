<?php

/**
 * Add custom meta to pages
 */

add_action( 'load-post.php', 'header_meta_box_setup' );
add_action( 'load-post-new.php', 'header_meta_box_setup' );

function header_meta_box_setup() {
  add_action( 'add_meta_boxes', 'header_meta_box' );
  add_action( 'save_post', 'header_meta_box_save', 10, 2 );
}

function header_meta_box() {
  add_meta_box(
    'nwd-post-meta',
    esc_html__( 'Header Options', 'nwd' ),
    'header_meta_box_form',
    'page',
    'normal',
    'default'
  );
}

// Custom meta form
function header_meta_box_form( $post ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'display_home_class_nonce' ); 
        $post_id = get_the_ID();
        if (get_post_type($post_id) != 'page') {
            return; }  ?>

    <?php  $value = get_post_meta($post_id, 'under_header_slider', true);
    wp_nonce_field('under_header_slider_nonce_'.$post_id, 'under_header_slider_nonce_');  ?>
    <div class="misc-pub-section misc-pub-section-last">
        
        <label for="under_header_slider">Enter Shortcode </br><small>Add shortcode to display under header</small></label>
        <input style="display: block;width: 100%;" type="text" name="under_header_slider" value="<?php echo htmlspecialchars($value); ?>" />
        
    </div>
 
    <?php  $value = get_post_meta($post_id, 'remove_subheader', true);
    wp_nonce_field('remove_subheader_nonce_'.$post_id, 'remove_subheader_nonce_');  ?>
    <div class="misc-pub-section misc-pub-section-last">
        
        <label>Remove Subheader </br><small>Remove subheader on this page.</small>
        <input type="checkbox" value="1" <?php checked($value, true, true); ?> name="remove_subheader" /></label>
        
    </div>
 
    <?php   $value = get_post_meta($post_id, 'transparent_header_page', true);
    wp_nonce_field('transparent_header_page_nonce_'.$post_id, 'transparent_header_page_nonce_');  ?>
    <div class="misc-pub-section misc-pub-section-last">
        
        <label>Transparent Header </br><small>Make header transparent.</small>
        <input type="checkbox" value="1" <?php checked($value, true, true); ?> name="transparent_header_page" /></label>
        
    </div>
 
<?php }

// Custom meta save
function header_meta_box_save($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return; }
    
    // Under header
    if (  !isset($_POST['under_header_slider_nonce_']) ||  !wp_verify_nonce($_POST['under_header_slider_nonce_'], 'under_header_slider_nonce_'.$post_id)) {
        return;}
    if (!current_user_can('edit_post', $post_id)) {
        return;}
    if (isset($_POST['under_header_slider'])) {
        update_post_meta($post_id, 'under_header_slider', $_POST['under_header_slider']);
    } else {
        delete_post_meta($post_id, 'under_header_slider');}
    
    // Remove subheader
    if (  !isset($_POST['remove_subheader_nonce_']) ||  !wp_verify_nonce($_POST['remove_subheader_nonce_'], 'remove_subheader_nonce_'.$post_id)) {
        return;}
    if (!current_user_can('edit_post', $post_id)) {
        return;}
    if (isset($_POST['remove_subheader'])) {
        update_post_meta($post_id, 'remove_subheader', $_POST['remove_subheader']);
    } else {
        delete_post_meta($post_id, 'remove_subheader');}
        
    // Transparent header
    if (  !isset($_POST['transparent_header_page_nonce_']) ||  !wp_verify_nonce($_POST['transparent_header_page_nonce_'], 'transparent_header_page_nonce_'.$post_id)) {
        return;}
    if (!current_user_can('edit_post', $post_id)) {
        return;}
    if (isset($_POST['transparent_header_page'])) {
        update_post_meta($post_id, 'transparent_header_page', $_POST['transparent_header_page']);
    } else {
        delete_post_meta($post_id, 'transparent_header_page');}
}