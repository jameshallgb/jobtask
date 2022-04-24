<?php
/**
 * WP Bootstrap Starter Theme Customizer
 *
 * @package NWD_THEME
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function themeslug_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/****** SET CUSTOM OPTIONS NWD (START) ******/

function nwd_theme_customize_register( $wp_customize ) {

    /****** STYLE - TEXT (START) ******/
    $wp_customize->add_section(
        'typography',
        array(
            'title' => __( 'Typography', 'nwd-theme' ),
            //'description' => __( 'This is a section for the typography', 'nwd-theme' ),
            'priority' => 20,
        )
    );

    $wp_customize->add_setting( 'preset_style_setting', array(
        'default'   => 'default',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'preset_style_setting', array(
        'label' => __( 'Typography', 'nwd-theme' ),
        'section'    => 'typography',
        'settings'   => 'preset_style_setting',
        'type'    => 'select',
        'choices' => array(
            'default' => 'Default',
            'arbutusslab-opensans' => 'Arbutus Slab / Opensans',
            'montserrat-merriweather' => 'Montserrat / Merriweather',
            'montserrat-opensans' => 'Montserrat / Opensans',
            'oswald-muli' => 'Oswald / Muli',
            'poppins-lora' => 'Poppins / Lora',
            'poppins-poppins' => 'Poppins / Poppins',
            'roboto-roboto' => 'Roboto / Roboto',
            'robotoslab-roboto' => 'Roboto Slab / Roboto',
            'rubik' => 'Rubik'
        )
    ) ) );
    
    /****** STYLE - TEXT (START) ******/



    /****** GLOBAL OPTIONS (START) ******/

    // ADD GLOBAL Section
        $wp_customize->add_section('custom_global', array('title' => 'Global', 'description' => '', 'priority' => 5, ));

        // Side Bar Width - Setting
            $wp_customize->add_setting('page_container_padding');
        // Side Bar Width - Control
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'page_container_padding',
                array(
                    'label' => 'Container Padding Remove',
                    'section' => 'custom_global',
                    'type'       => 'checkbox',
                    'settings' => 'page_container_padding',
                )));

    /****** GLOBAL OPTIONS (END) ******/



    /****** SUBHEADER (START) ******/

    // ADD SUBHEADER Section
        $wp_customize->add_section('sidebar', array('title' => 'Sidebar', 'description' => '', 'priority' => 7, ));


        // WOOCOMMERCE SIDEBAR - SETTING
            $wp_customize->add_setting('product_sidebar');
        // WOOCOMMERCE SIDEBAR - CONTROL
            $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'product_sidebar', 
            array(
                'settings' => 'product_sidebar',
                'label'    => __('Add Product Sidebar', 'nwd'),
                'section'    => 'sidebar',
                'type'     => 'checkbox',
            )));

        // Side Bar Colour - Setting
            $wp_customize->add_setting('sidebar_colour');
        // Side Bar Colour - Control
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_colour',
            array(
                'label' => 'Sidebar Colour',
                'section' => 'sidebar',
                'settings' => 'sidebar_colour',
            ) ) );
    
        // Side Bar Text Colour - Setting
            $wp_customize->add_setting('sidebar_text_colour');
        // Side Bar Text Colour - Control
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_text_colour',
                array(
                    'label' => 'Sidebar Text Colour',
                    'section' => 'sidebar',
                    'settings' => 'sidebar_text_colour',
                ) ) );
    
        // Side Bar Width - Setting
            $wp_customize->add_setting('sidebar_width');
        // Side Bar Width - Control
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_width',
                array(
                    'label' => 'Sidebar Width',
                    'section' => 'sidebar',
                    'type'       => 'checkbox',
                    'settings' => 'sidebar_width',
                ) ) );

    /****** SUBHEADER (END) ******/



    /****** HEADER OPTIONS (START) ******/

    // ADD HEADER Panel
        $wp_customize->add_panel( 'header_main', array( 'title' => 'Header', 'description' => '', 'priority' => 6, ));


        // ADD COLOURS Section
            $wp_customize->add_section( 'header_colours', array('priority' => 10, 'theme_supports' => '', 'title' => __('Colours', 'nwd'), 'description' =>  __('Colours', 'nwd'), 'panel' => 'header_main', ));
    
            // HEADER COLOUR - SETTING
                $wp_customize->add_setting('header_colour');
            // HEADER COLOUR - CONTROL
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_colour',
                    array(
                        'label' => 'Header Colour',
                        'section' => 'header_colours',
                        'settings' => 'header_colour',
                    )));

            // HEADER TRANSPARENT - SETTING
                $wp_customize->add_setting('header_transparent');
            // HEADER TRANSPARENT - CONTROL
            $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_transparent', 
                array(
                    'settings' => 'header_transparent',
                    'label'    => __('Transparent Header', 'nwd'),
                    'section'    => 'header_colours',
                    'type'     => 'checkbox',
                )));


        // ADD MENU Section
            $wp_customize->add_section( 'header_menu', array('priority' => 10, 'theme_supports' => '', 'title' => __('Menu', 'nwd'), 'description' =>  __('Menu', 'nwd'), 'panel' => 'header_main', ));
    
            // MENU TEXT SIZE - SETTING
                $wp_customize->add_setting('menu_text_size');
            // MENU TEXT SIZE - CONTROL
                $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'menu_text_size',
                    array(
                        'label' => 'Menu Text Size',
                        'section' => 'header_menu',
                        'settings' => 'menu_text_size',
                        'type' => 'number',
                        'priority' => 10,
                        'input_attrs' => array(
                            'min'   => 1,
                            'max'   => 20,)
                    )));
                
            // MENU COLOUR - SETTING
                $wp_customize->add_setting('menu_colour');
            // MENU COLOUR - CONTROL
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_colour',
                    array(
                        'label' => 'Menu Colour',
                        'section' => 'header_menu',
                        'settings' => 'menu_colour',
                    )));
                
            // MENU LINE HEIGHT - SETTING
                $wp_customize->add_setting('menu_line_height');
            // MENU LINE HEIGHT - CONTROL
                $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'menu_line_height',
                    array(
                        'label' => 'Menu Line Height',
                        'section' => 'header_menu',
                        'settings' => 'menu_line_height',
                        'type' => 'number',
                        'priority' => 10,
                        'input_attrs' => array(
                            'min'   => 1,
                            'max'   => 20,)
                    )));
                
            // MENU ACTIVE COLOUR - SETTING
                $wp_customize->add_setting('menu_active_colour');
            // MENU ACTIVE COLOUR - CONTROL
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_active_colour',
                    array(
                        'label' => 'Menu Active Colour',
                        'section' => 'header_menu',
                        'settings' => 'menu_active_colour',
                    )));
                
            // MENU HOVER COLOUR - SETTING
                $wp_customize->add_setting('menu_hover_colour');
            // MENU HOVER COLOUR - CONTROL
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_hover_colour',
                    array(
                        'label' => 'Menu Hover Colour',
                        'section' => 'header_menu',
                        'settings' => 'menu_hover_colour',
                    )));
    
            // SUBMENU BG COLOUR - SETTING
                $wp_customize->add_setting('submenu_bg_colour');
            // SUBMENU BG COLOUR - CONTROL
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_bg_colour',
                    array(
                        'label' => 'Submenu Background Colour',
                        'section' => 'header_menu',
                        'settings' => 'submenu_bg_colour',
                    )));
    
    
        // ADD MENU Section
            $wp_customize->add_section( 'header_banner', array('priority' => 10, 'theme_supports' => '', 'title' => __('Banner', 'nwd'), 'description' =>  __('Banner', 'nwd'), 'panel' => 'header_main', ));
    
            // BANNER BUTTON TEXT - SETTINGS
                $wp_customize->add_setting('banner_button_text');
            // BANNER BUTTON TEXT - CONTROL
                $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner_button_text',
                    array(
                        'label' => 'Banner Button Text',
                        'section' => 'header_banner',
                        'settings' => 'banner_button_text',
                        'type' => 'text',
                        'priority' => 10,
                    )));
    
            // BANNER BUTTON LINK - SETTINGS
                $wp_customize->add_setting('banner_button_link');
            // BANNER BUTTON LINK - CONTROL
                $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner_button_link',
                    array(
                        'label' => 'Banner Button Link',
                        'section' => 'header_banner',
                        'settings' => 'banner_button_link',
                        'type' => 'text',
                        'priority' => 10,
                    )));
    
    
    
            // BANNER PHONE TEXT - SETTINGS
                $wp_customize->add_setting('banner_phone_text');
            // BANNER PHONE TEXT - CONTROL
                $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner_phone_text',
                    array(
                        'label' => 'Text above Phone Number',
                        'section' => 'header_banner',
                        'settings' => 'banner_phone_text',
                        'type' => 'text',
                        'priority' => 10,
                    )));
    
            // BANNER PHONE NUMBER - SETTINGS
                $wp_customize->add_setting('banner_phone_number');
            // BANNER PHONE NUMBER - CONTROL
                $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner_phone_number',
                    array(
                        'label' => 'Phone Number',
                        'section' => 'header_banner',
                        'settings' => 'banner_phone_number',
                        'type' => 'text',
                        'priority' => 10,
                    )));
    
    
    
    
    
    
    
        // ADD TOP BAR Section
            $wp_customize->add_section( 'top_bar', array('priority' => 10, 'theme_supports' => '', 'title' => __('Top Bar', 'nwd'), 'description' =>  __('Top Bar', 'nwd'), 'panel' => 'header_main', ));
    
            // SHOW TOP BAR - SETTING
                $wp_customize->add_setting('show_top_bar');
            // SHOW TOP BAR - CONTROL
                $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'show_top_bar', 
                    array(
                        'settings' => 'show_top_bar',
                        'label'    => __('Show Top Bar', 'nwd'),
                        'section'    => 'top_bar',
                        'type'     => 'checkbox',
                    )));
    
    
            // TOP BAR BG COLOUR - SETTING
                $wp_customize->add_setting('top_bar_bg_colour');
            // TOP BAR BG COLOUR - CONTROL
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_bg_colour',
                    array(
                        'label' => 'Top Bar Background Colour',
                        'section' => 'top_bar',
                        'settings' => 'top_bar_bg_colour',
                    )));
    
    
            // TOP BAR AREA 1 - SETTINGS
                $wp_customize->add_setting('top_bar_first_col');
            // TOP BAR AREA 1 - CONTROL
                $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_bar_first_col',
                    array(
                        'label' => 'First Area - Text',
                        'section' => 'top_bar',
                        'settings' => 'top_bar_first_col',
                        'type' => 'text',
                        'priority' => 10,
                    )));
                    
            // TOP BAR AREA 2 - SETTINGS
                $wp_customize->add_setting('top_bar_second_col');
            // TOP BAR AREA 2 - CONTROL
                $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_bar_second_col',
                    array(
                        'label' => 'Second Area - Phone Number',
                        'section' => 'top_bar',
                        'settings' => 'top_bar_second_col',
                        'type' => 'text',
                        'priority' => 10,
                    )));
                    
            // TOP BAR AREA 3 - SETTINGS
                $wp_customize->add_setting('top_bar_third_col');
            // TOP BAR AREA 3 - CONTROL
                $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_bar_third_col',
                    array(
                        'label' => 'Third Area - Email Address',
                        'section' => 'top_bar',
                        'settings' => 'top_bar_third_col',
                        'type' => 'text',
                        'priority' => 10,
                    )));


        // ADD BACKGROUND Section
            $wp_customize->add_section( 'header_image', array('title' => __( 'Background', 'nwd' ),'priority' => 30,'panel'  => 'header_main',));
    
    /****** HEADER OPTIONS (END) ******/



    /****** SUBHEADER OPTIONS (START) ******/


    // ADD SUBHEADER Section
        $wp_customize->add_section('subheader', array('title' => 'Subheader', 'description' => '', 'priority' => 7, ));

        // SUBHEADER HEIGHT - SETTING
            $wp_customize->add_setting('subheader_height');
        // SUBHEADER HEIGHT - CONTROL
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'subheader_height',
                array(
                    'label' => 'Subheader Height',
                    'section' => 'subheader',
                    'settings' => 'subheader_height',
                    'type' => 'number',
                )));

        // SUBHEADER Visibility - SETTING
            $wp_customize->add_setting( 'subheader_visibility', array( 'capability' => 'edit_theme_options', 'sanitize_callback' => 'themeslug_sanitize_checkbox',));
        // SUBHEADER Visibility - CONTROL
            $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'subheader_visibility', 
                array(
                    'settings' => 'subheader_visibility',
                    'label'    => __('Hide Subheader', 'nwd-theme'),
                    'section'    => 'subheader',
                    'type'     => 'checkbox',
                )));

        // SUBHEADER COLOUR - SETTING
            $wp_customize->add_setting( 'header_bg_color_setting', array( 'default' => '#fff', 'sanitize_callback' => 'sanitize_hex_color', ));
        // SUBHEADER COLOUR - CONTROL
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg_color', 
                array(
                    'label'      => __( 'Subheader Background Color', 'nwd-theme' ),
                    'section'    => 'subheader',
                    'settings'   => 'header_bg_color_setting',
                )));

    
        // Title Custom Text Colour - SETTING
            $wp_customize->add_setting('subheader_text_colour');
        // Title Custom Text Colour - CONTROL
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'subheader_text_colour',
                array(
                    'label' => 'Title Text Colour',
                    'section' => 'subheader',
                    'settings' => 'subheader_text_colour',
                )));

        // Title Transparent - SETTING
            $wp_customize->add_setting( 'title_transparent', array( 'capability' => 'edit_theme_options', 'sanitize_callback' => 'themeslug_sanitize_checkbox',));
        // Title Transparent - CONTROL
            $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'title_transparent', 
                array(
                    'settings' => 'title_transparent',
                    'label'    => __('Title Transparent', 'nwd-theme'),
                    'section'    => 'subheader',
                    'type'     => 'checkbox',
                )));

    /****** SUBHEADER OPTIONS (END) ******/



    /****** OVERLAY OPTIONS (START) ******/


    // ADD OVERLAY Section
        $wp_customize->add_section('custom_overlay', array('title' => 'Overlay', 'description' => '', 'priority' => 8, ));

        // OVERLAY COLOUR - SETTINGS
            $wp_customize->add_setting( 'custom_overlay_colour', array( 'sanitize_callback' => 'sanitize_hex_color', ));
        // OVERLAY COLOUR - CONTROL
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_overlay_color', 
                array(
                    'label'      => __( 'Overlay Color', 'nwd' ),
                    'section'    => 'custom_overlay',
                    'settings'   => 'custom_overlay_colour',
                )));

        // OVERLAY OPACITY - SETTINGS
            $wp_customize->add_setting('custom_overlay_opacity');
        // OVERLAY OPACITY - CONTROL
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_overlay_opacity',
                array(
                    'label' => 'Overlay Opacity',
                    'section' => 'custom_overlay',
                    'settings' => 'custom_overlay_opacity',
                    'type' => 'number',
                    'priority' => 10,
                    'input_attrs' => array(
                        'min'   => 1,
                        'max'   => 10,)
                )));

    /****** OVERLAY OPTIONS (END) ******/


    /****** SOCIAL MEDIA OPTIONS (START) ******/

    // ADD SOCIAL MEDIA Panel
        $wp_customize->add_section( 'nwd_social', array( 'title' => 'Social Media', 'description' => '', 'priority' => 10, ));

            // SOCIAL FACEBOOK - SETTINGS
                $wp_customize->add_setting('social_facebook');
            // SOCIAL FACEBOOK - CONTROL
                $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_facebook',
                    array(
                        'label' => 'Facebook URL',
                        'section' => 'nwd_social',
                        'settings' => 'social_facebook',
                        'type' => 'text_social',
                        'priority' => 1,
                    )));

            // SOCIAL INSTAGRAM - SETTINGS
                $wp_customize->add_setting('social_instagram');
            // SOCIAL INSTAGRAM - CONTROL
                $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_instagram',
                    array(
                        'label' => 'Instagram URL',
                        'section' => 'nwd_social',
                        'settings' => 'social_instagram',
                        'type' => 'text_social',
                        'priority' => 2,
                    )));
                    
            // SOCIAL TWITTER - SETTINGS
                $wp_customize->add_setting('social_twitter');
            // SOCIAL TWITTER - CONTROL
                $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_twitter',
                    array(
                        'label' => 'Twitter URL',
                        'section' => 'nwd_social',
                        'settings' => 'social_twitter',
                        'type' => 'text_social',
                        'priority' => 2,
                    )));
                    
            // SOCIAL YOUTUBE - SETTINGS
                $wp_customize->add_setting('social_youtube');
            // SOCIAL YOUTUBE - CONTROL
                $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_youtube',
                    array(
                        'label' => 'Youtube URL',
                        'section' => 'nwd_social',
                        'settings' => 'social_youtube',
                        'type' => 'text_social',
                        'priority' => 2,
                    )));
                    
    /****** SOCIAL MEDIA OPTIONS (END) ******/



    /****** FOOTER OPTIONS (START) ******/

    // ADD FOOTER Panel
        $wp_customize->add_panel( 'footer_main_custom', array('title' => 'Footer', 'description' => '', 'priority' => 11, ) );


        // ADD FOOTER GENERAL Section
            $wp_customize->add_section( 'footer_general', array('priority' => 10, 'theme_supports' => '', 'title' => __('Footer General', 'mytheme'), 'description' =>  __('Footer elements configuration', 'mytheme'), 'panel'  => 'footer_main_custom',));

            // Footer Padding - Setting
                $wp_customize->add_setting('footer_padding');
            // Footer Padding Colour - Control
                $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_padding',
                    array(
                        'label' => 'Footer Padding',
                        'section' => 'footer_general',
                        'settings' => 'footer_padding',
                        'type' => 'number',
                        'priority' => 10,
                        'input_attrs' => array(
                            'min'   => 1,
                            'max'   => 60,)
                    )));

        // ADD FOOTER COLOURS Section
            $wp_customize->add_section( 'footer_colours', array('priority' => 10, 'theme_supports' => '', 'title' => __('Colours', 'mytheme'), 'description' =>  __('Colours', 'mytheme'), 'panel'  => 'footer_main_custom',));

            // Footer (Copyright) Custom Colour - Setting
                $wp_customize->add_setting('copyright_bg_colour');
            // Footer (Copyright) Custom Colour - Control
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_bg_colour',
                    array(
                        'label' => 'Footer (Copyright) Colour',
                        'section' => 'footer_colours',
                        'settings' => 'copyright_bg_colour',
                    )));

            // Footer (Copyright) Text Custom Colour - Setting
                $wp_customize->add_setting('copyright_text_colour');
            // Footer (Copyright) Text Custom Colour - Control
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_text_colour',
                    array(
                        'label' => 'Footer (Copyright) Text Colour',
                        'section' => 'footer_colours',
                        'settings' => 'copyright_text_colour',
                    )));

            // Footer Custom Colour - Setting
                $wp_customize->add_setting('footer_bg_colour');
            // Footer Custom Colour - Control
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_colour',
                    array(
                        'label' => 'Footer Colour',
                        'section' => 'footer_colours',
                        'settings' => 'footer_bg_colour',
                    )));
    
            // Footer Custom Text Colour - Setting
                $wp_customize->add_setting('footer_text_colour');
            // Footer Custom Text Colour - Control
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text_colour',
                    array(
                        'label' => 'Footer Text Colour',
                        'section' => 'footer_colours',
                        'settings' => 'footer_text_colour',
                    )));

    /****** FOOTER OPTIONS (END) ******/



    /****** BASE OPTIONS (NWD THEME) ******/
    
        // BOOTSTRAP AND FONTAWESOME
        $wp_customize->add_setting( 'cdn_assets_setting', array( 'default' => __( 'no','nwd' ), 'sanitize_callback' => 'wp_filter_nohtml_kses', ) );
        $wp_customize->add_control( 'cdn_assets', array(
            'label' => __( 'Use CDN for Assets', 'nwd' ),
            'description' => __( 'All Bootstrap Assets and FontAwesome will be loaded in CDN.', 'nwd' ),
            'section' => 'custom_global',
            'settings' => 'cdn_assets_setting',
	        'type'    => 'select',
	        'choices' => array(
	            'yes' => __( 'Yes', 'nwd' ),
	            'no' => __( 'No', 'nwd' ),
        ) ) );

        $wp_customize->get_control( 'background_image'  )->section = 'custom_global';
        $wp_customize->get_control( 'background_color'  )->section = 'custom_global';
        $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
        $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
        $wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';
    
        // LOGO UPLOAD (CONTROL)
        $wp_customize->add_setting( 'nwd_theme_logo', array( 'default' => __( '', 'nwd' ), 'sanitize_callback' => 'esc_url', ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'nwd_theme_logo', array(
            'label'    => __( 'Upload Logo (replaces text)', 'nwd' ),
            'section'  => 'title_tagline',
            'settings' => 'nwd_theme_logo',
        ) ) );
        
    /****** BASE OPTIONS (NWD THEME) ******/

}
add_action( 'customize_register', 'nwd_theme_customize_register' );
/****** SET CUSTOM OPTIONS NWD (END) ******/

function numag_remove_sections( $wp_customize ) {
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('background_image');
}
add_action( 'customize_register', 'numag_remove_sections');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function nwd_theme_customize_preview_js() {
    wp_enqueue_script( 'nwd_theme_customizer', get_template_directory_uri() . '/inc/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'nwd_theme_customize_preview_js' );
