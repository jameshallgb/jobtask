<?php

/**
 * NWD Theme functions and definitions
 */


add_action('acf/input/admin_head', 'my_acf_modify_wysiwyg_height');

function my_acf_modify_wysiwyg_height() {
    
    ?>
    <style type="text/css">
        .wysiwyg-field-title iframe{
            height: 145px !important;
            min-height: 145px !important;
        }
    </style>
    <?php    
    
}












if ( ! function_exists( 'nwd_theme_setup' ) ) :
    
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
     
    function nwd_theme_setup() {
        
    	// Enables theme translation - Translations can be filed in the /languages/ directory.
    	load_theme_textdomain( 'nwd-theme', get_template_directory() . '/languages' );
    
        // Add default posts and comments RSS feed links to head.
    	add_theme_support( 'automatic-feed-links' );
    
    	// Let WordPress manage the document title.
    	add_theme_support( 'title-tag' );
    
    	// Enable support for Post Thumbnails on posts and pages.
    	add_theme_support( 'post-thumbnails' );
    
    	// Register navigation menus.
    	register_nav_menus( array(
    		'primary' => esc_html__( 'Primary', 'nwd-theme' ),
    		'top_bar' => esc_html__( 'Top Bar', 'nwd-theme' ),
    	) );
    
    	// Switch default core markup for search form, comment form, and comments, to output valid HTML5.
    	add_theme_support( 'html5', array(
    		'comment-form',
    		'comment-list',
    		'caption',
    	) );
    
    	// Set up the WordPress core custom background feature.
    	add_theme_support( 'custom-background', apply_filters( 'nwd_theme_custom_background_args', array(
    		'default-color' => 'ffffff',
    		'default-image' => '',
    	) ) );
    
    	// Add theme support for selective refresh for widgets.
    	add_theme_support( 'customize-selective-refresh-widgets' );
    
        function nwd_theme_add_editor_styles() {
            add_editor_style( 'custom-editor-style.css' );
        }
        add_action( 'admin_init', 'nwd_theme_add_editor_styles' );
    
    }
    
endif;

add_action( 'after_setup_theme', 'nwd_theme_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */

function nwd_theme_content_width() {
    
	$GLOBALS['content_width'] = apply_filters( 'nwd_theme_content_width', 1170 );
}

add_action( 'after_setup_theme', 'nwd_theme_content_width', 0 );



/**
 * Register widget area.
 */

function nwd_theme_widgets_init() {
    
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'nwd' ),
        'id'            => 'main-sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'nwd' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'nwd' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'nwd' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'nwd' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'nwd' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'nwd' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'nwd' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}

add_action( 'widgets_init', 'nwd_theme_widgets_init' );



/**
 * Enqueue scripts and styles.
 */

function nwd_theme_scripts() {
    
	// load bootstrap css
    if ( get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
        wp_enqueue_style( 'nwd-theme-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css' );
        wp_enqueue_style( 'nwd-theme-fontawesome-cdn', 'https://use.fontawesome.com/releases/v5.10.2/css/all.css' );
    } else {
        wp_enqueue_style( 'nwd-theme-bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css' );
        wp_enqueue_style( 'nwd-theme-fontawesome-cdn', get_template_directory_uri() . '/inc/assets/css/fontawesome.min.css' );
    }
    
	// Load theme scripts. styles and fonts
	wp_enqueue_style( 'nwd-theme-style', get_stylesheet_uri() );
	
    if ( get_theme_mod( 'theme_option_setting' ) && get_theme_mod( 'theme_option_setting' ) !== 'default') {
        wp_enqueue_style( 'nwd-theme-'.get_theme_mod( 'theme_option_setting' ), get_template_directory_uri() . '/inc/assets/css/presets/theme-option/'.get_theme_mod( 'theme_option_setting' ).'.css', false, '' );
    }
    
    if ( get_theme_mod( 'preset_style_setting' ) === 'poppins-lora') {
        wp_enqueue_style( 'nwd-theme-poppins-lora-font', 'https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i|Poppins:300,400,500,600,700' );
    }
    
    if ( get_theme_mod( 'preset_style_setting' ) === 'montserrat-merriweather') {
        wp_enqueue_style( 'nwd-theme-montserrat-merriweather-font', 'https://fonts.googleapis.com/css?family=Merriweather:300,400,400i,700,900|Montserrat:300,400,400i,500,700,800' );
    }
    
    if ( get_theme_mod( 'preset_style_setting' ) === 'poppins-poppins') {
        wp_enqueue_style( 'nwd-theme-poppins-font', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' );
    }
    
    if ( get_theme_mod( 'preset_style_setting' ) === 'roboto-roboto') {
        wp_enqueue_style( 'nwd-theme-roboto-font', 'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i' );
    }
    
    if ( get_theme_mod( 'preset_style_setting' ) === 'arbutusslab-opensans') {
        wp_enqueue_style( 'nwd-theme-arbutusslab-opensans-font', 'https://fonts.googleapis.com/css?family=Arbutus+Slab|Open+Sans:300,300i,400,400i,600,600i,700,800' );
    }
    
    if ( get_theme_mod( 'preset_style_setting' ) === 'oswald-muli') {
        wp_enqueue_style( 'nwd-theme-oswald-muli-font', 'https://fonts.googleapis.com/css?family=Muli:300,400,600,700,800|Oswald:300,400,500,600,700' );
    }
    
    if ( get_theme_mod( 'preset_style_setting' ) === 'montserrat-opensans') {
        wp_enqueue_style( 'nwd-theme-montserrat-opensans-font', 'https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:300,300i,400,400i,600,600i,700,800' );
    }
    
    if ( get_theme_mod( 'preset_style_setting' ) === 'robotoslab-roboto') {
        wp_enqueue_style( 'nwd-theme-robotoslab-roboto', 'https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700|Roboto:300,300i,400,400i,500,700,700i' );
    }
    
    if ( get_theme_mod( 'preset_style_setting' ) === 'rubik') {
        wp_enqueue_style( 'nwd-theme-rubik', 'https://fonts.googleapis.com/css?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900' );
    }
    
    
    
    
    if ( get_theme_mod( 'preset_style_setting' ) && get_theme_mod( 'preset_style_setting' ) !== 'default') {
        wp_enqueue_style( 'nwd-theme-'.get_theme_mod( 'preset_style_setting' ), get_template_directory_uri() . '/inc/assets/css/presets/typography/'.get_theme_mod( 'preset_style_setting' ).'.css', false, '' );
    }

	wp_enqueue_script('jquery');

    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/inc/assets/js/html5.js', array(), '3.7.0', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

	// load bootstrap js
    if ( get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
        wp_enqueue_script('nwd-theme-popper-defer', 'https://cdn.jsdelivr.net/npm/popper.js@1/dist/umd/popper.min.js', array(), '', true );
    	wp_enqueue_script('nwd-theme-bootstrapjs-defer', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js', array(), '', true );
    } else {
        wp_enqueue_script('nwd-theme-popper-defer', get_template_directory_uri() . '/inc/assets/js/popper.min.js', array(), '', true );
        wp_enqueue_script('nwd-theme-bootstrapjs-defer', get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js', array(), '', true );
    }
    wp_enqueue_script('nwd-theme-themejs-defer', get_template_directory_uri() . '/inc/assets/js/theme-script.min.js', array(), '', true );
	wp_enqueue_script( 'nwd-theme-skip-link-focus-fix-defer', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'nwd_theme_scripts' );



/**
 * Add Preload for CDN scripts and stylesheet
 */

function nwd_theme_preload( $hints, $relation_type ){
    
    if ( 'preconnect' === $relation_type && get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
        $hints[] = [
            'href'        => 'https://cdn.jsdelivr.net/',
            'crossorigin' => 'anonymous',
        ];
        $hints[] = [
            'href'        => 'https://use.fontawesome.com/',
            'crossorigin' => 'anonymous',
        ];
    }
    return $hints;
} 

add_filter( 'wp_resource_hints', 'nwd_theme_preload', 10, 2 );



/**
 * Password form for protected posts
 */

function nwd_theme_password_form() {
    
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <div class="d-block mb-3">' . __( "To view this protected post, enter the password below:", "nwd-theme" ) . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __( "Password:", "nwd-theme" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__( "Submit", "nwd-theme" ) . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
}

add_filter( 'the_password_form', 'nwd_theme_password_form' );



// Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';

// Add custom meta to pages.
require get_template_directory() . '/inc/custom-meta.php';

// Generate critical CSS.
require get_template_directory() . '/inc/critical-css.php';

// Get theme elements.
require get_template_directory() . '/inc/theme-elements.php';

// Implement the Custom Admin feature.
require get_template_directory() . '/inc/admin-functions.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Load plugin compatibility file.
require get_template_directory() . '/inc/plugin-compatibility/plugin-compatibility.php';

//Load custom WordPress nav walker.
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
}






