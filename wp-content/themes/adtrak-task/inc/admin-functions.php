<?php



/*
 *  Admin menu - Order
 */

function nwd_custom_menu_order( $menu_ord ) {
    if ( !$menu_ord ) return true;
    return array(
        
        'index.php',

        'edit.php',
        'edit.php?post_type=page',
        'upload.php',
        
        'separator1',
        
        //'wpcf7',
        'users.php',
        //'theseoframework-settings',

        'separator2',
    
        'themes.php',
        'edit-comments.php',
        'plugins.php',

        'separator-last',
        
        'tools.php',
        'options-general.php',

    );
}
add_filter( 'custom_menu_order', 'nwd_custom_menu_order', 10, 1 );
add_filter( 'menu_order', 'nwd_custom_menu_order', 10, 1 );



/*
 *  Admin menu - Add to settings

 
function nwd_add_links_to_settings() {
    
    $gdpr_link = 'admin.php?page=moove-gdpr';
    $smtp_link = 'admin.php?page=postman';
    $website_speed = 'admin.php?page=WP-Optimize';
    
    add_options_page( 'GDPR Compliance', 'GDPR Compliance', 'manage_options', $gdpr_link );
    add_options_page( 'SMTP Settings', 'SMTP Settings', 'manage_options', $smtp_link );
    add_options_page( 'Optimise Settings', 'Optimise Settings', 'manage_options', $website_speed );
    
}
add_action( 'admin_menu', 'nwd_add_links_to_settings' );

*/


/*
 *  Admin menu - Remove unused
 */

function nwd_custom_remove_admin_menus() {
    
    global $submenu;
    
    foreach($submenu['themes.php'] as $menu_index => $theme_menu){
        if($theme_menu[0] == 'Header' || $theme_menu[0] == 'Background')
        unset($submenu['themes.php'][$menu_index]);
    }
    
   	//remove_menu_page( 'tools.php' );
   	//remove_menu_page( 'edit-comments.php' );
    //remove_menu_page( 'edit.php?post_type=fl-builder-template' ); 	
    //remove_menu_page( 'moove-gdpr' );
    //remove_menu_page( 'postman' );
    //remove_menu_page( 'WP-Optimize' ); 	
    
}

add_action( 'admin_menu', 'nwd_custom_remove_admin_menus', 999 );



/*
 *  Backend - Text translate
 */

add_filter(  'gettext',  'nwd_backend_text'  );
add_filter(  'ngettext',  'nwd_backend_text'  );

function nwd_backend_text( $translated ) {
    
     $words = array(
        'Beaver Builder' => 'Page Builder',
     );
     
    $translated = str_ireplace(  array_keys($words),  $words,  $translated );
    
    return $translated;
}



/*
 *  Login - Logo
 */

function nwd_login_logo() { 
    
    $custom_logo_id = get_theme_mod( 'nwd_theme_logo' );
    $logo_image = $image[0];
    
    ?>
    
    <style type="text/css">
     
        #login h1 {
            padding: 1em;
            display: flex;
            margin-bottom: 2rem;
        }

        #login h1 a, .login h1 a {
            background-image: url("<?php echo $custom_logo_id; ?>");
            width:300px;
            background-size: contain;
            background-repeat: no-repeat;
            margin: 0;
        }
        
    </style>
    
<?php 
    
}
add_action( 'login_enqueue_scripts', 'nwd_login_logo' );

function nwd_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'nwd_login_logo_url' );
 
function nwd_login_logo_title() {
    $site_title = get_bloginfo( 'name' );
    return $site_title;
}
add_filter( 'login_headertitle', 'nwd_login_logo_title' );

