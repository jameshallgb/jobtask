<?php


/**
 * Function - Critical CSS in head
 */
    
function theme_base_styles()    {
    global $post;

    // Top bar
        $top_bar_bg_colour = get_theme_mod( 'top_bar_bg_colour' );
    // Header
        $header_colour = get_theme_mod( 'header_colour' );
        $header_transparent = get_theme_mod( 'header_transparent' );
    // Menu
        $menu_colour = get_theme_mod( 'menu_colour' );
        $menu_line_height = get_theme_mod( 'menu_line_height' );
        $menu_active_colour = get_theme_mod( 'menu_active_colour' );
        $menu_text_size = get_theme_mod( 'menu_text_size' );
        $menu_hover_colour = get_theme_mod( 'menu_hover_colour' );
        $submenu_bg_colour = get_theme_mod( 'submenu_bg_colour' ); 
    // Subheader
        $subheader_height = get_theme_mod( 'subheader_height' );
        $subheader_colour = get_theme_mod( 'header_bg_color_setting' );
        $subheader_text_colour = get_theme_mod( 'subheader_text_colour' );
    // Overlay
        $overlay_colour = get_theme_mod( 'custom_overlay_colour' );
        $overlay_opacity = get_theme_mod( 'custom_overlay_opacity' );
    // Sidebar
        $sidebar_colour = get_theme_mod( 'sidebar_colour' );
        $sidebar_text_colour = get_theme_mod( 'sidebar_text_colour' );
        $sidebar_fullwidth = get_theme_mod( 'sidebar_width' );
    // Footer
        $copyright_bg_colour = get_theme_mod( 'copyright_bg_colour' );
        $copyright_text_colour = get_theme_mod( 'copyright_text_colour' );
        $footer_bg_colour = get_theme_mod( 'footer_bg_colour' );
        $footer_text_colour = get_theme_mod( 'footer_text_colour' );   
        $footer_padding = get_theme_mod( 'footer_padding' );   

    echo '<style>';

        // Top bar
        if ( !empty( $top_bar_bg_colour ) ) {
            echo '.top-bar{ background-color:'.$top_bar_bg_colour.'}';}

        // Header
        if ( !empty( $header_colour ) ) {
            echo 'header#masthead{background-color:'.$header_colour.'}';}
        
        if ( is_page( ) ) {
            $header_transparent_page = get_post_meta( $post->ID, 'transparent_header_page', true ); } 
                else { $header_transparent_page = 0; }
        
        if ( ( $header_transparent==1 || $header_transparent_page==1 )){ 
            echo 'header#masthead {position: absolute;width: 100%;background: transparent;box-shadow:none;}header#masthead.header-mobile-nav-open {background-color: black;}';}
        
        // Menu
        if ( !empty( $menu_colour ) || !empty ( $menu_text_size )  ) { 
            echo 'body #masthead .navbar-nav > li > a {';

                if (!empty( $menu_colour ) ) {
                    echo ' color:'.$menu_colour.';';    }
            
                if (!empty( $menu_text_size ) ) {
                    echo ' font-size:'.$menu_text_size.'px;'; }
            
            echo '}';
        }

        // Menu Line Height
        if ( !empty ( $menu_line_height ) ) { 
            echo '@media screen and (min-width: 1200px) { body #masthead .navbar-nav > li > a {';
            
                if (!empty( $menu_line_height ) ) {
                    echo ' line-height:'.$menu_line_height.'px;';   }
            
            echo '} }';
        }



        if ( !empty( $menu_hover_colour )  ) { 
              echo 'body #masthead .navbar-nav > li:hover > a,  body #masthead .navbar-nav .dropdown-menu li:hover .dropdown-item{color:'.$menu_hover_colour.';}';   }

        if ( !empty( $menu_active_colour )  ) { 
              echo 'body #masthead .navbar-nav > li.current_page_item > a, body #masthead .navbar-nav .dropdown-menu li .dropdown-item{color:'.$menu_active_colour.'}'; }

        if ( !empty( $submenu_bg_colour )  ) { 
            echo '@media screen and (min-width: 1200px) {#masthead .navbar-nav ul.dropdown-menu{ background-color:'.$submenu_bg_colour.';}}';}

        // Subheader
        if ( !empty( $subheader_text_colour )  ) {
             echo '.subheader .entry-title {color:'.$subheader_text_colour.';}'; }

        if ( !empty( $subheader_height ) || !empty ( $subheader_colour ) ) { 
            echo '.subheader {';

                if ( !empty( $subheader_height )  ) { 
                    echo 'height:'.$subheader_height.'px;'; }
            
                if ( !empty( $subheader_colour )  ) { 
                    echo 'background-color:'.$subheader_colour.';'; }
        
            echo'}';
        }

        // Overlay
        
        if ( !empty( $overlay_colour ) || !empty ( $overlay_opacity ) ) { 
            echo '.main-overlay {';

                if ( !empty( $overlay_colour )  ) {
                    echo 'background-color:'. $overlay_colour.';';  }

                if ( !empty( $overlay_opacity )  ) { 
                    echo 'opacity:0.'. $overlay_opacity.';';    }

            echo '}';
        }

        // Sidebar
        
        if ( !empty( $sidebar_colour )  ) {
            echo'.widget-area {background-color:'.$sidebar_colour.';}'; }

        if ( !empty( $sidebar_fullwidth ) ) { 
            echo'aside#secondary:after {content: " ";background-color:inherit;}';    }

        if ( !empty( $sidebar_text_colour ) ) {
            echo '.widget-area h3, .widget-area a {color:'.$sidebar_text_colour.';}';    }

        // Footer
        
        if ( !empty( $copyright_bg_colour ) ) {
            echo 'body footer#colophon.site-footer{ background-color:'.$copyright_bg_colour.';}';   }

        if ( !empty( $copyright_text_colour ) ) {
            echo'body footer#colophon.site-footer { color:'.$copyright_text_colour.';}';  }

        if ( !empty( $footer_bg_colour ) || !empty( $footer_padding ) ) {
            echo 'body div#footer-widget{';

                if ( !empty( $footer_bg_colour ) ) {
                    echo 'background-color:'.$footer_bg_colour.';'; }

                if ( !empty( $footer_padding ) ) {
                    echo 'padding:'.$footer_padding.'px 0px;';  }

            echo '}';
        }

        if ( !empty( $footer_text_colour ) ) { 
            echo 'body div#footer-widget * {color:'.$footer_text_colour.';}';   }

            echo "</style>";
}

add_action('wp_head', 'theme_base_styles', 100);