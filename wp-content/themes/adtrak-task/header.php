<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package NWD_THEME
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    
    <?php if ( is_page( ) ) {
    
        $seo_description = get_post_meta( $post->ID, 'seo_description', true ); 
        $seo_keywords = get_post_meta( $post->ID, 'seo_keywords', true );

            if (!empty($seo_description)){ 
                echo '<meta name="description" content="'.$seo_description.'">'; }
            if (!empty($seo_keywords)){ 
                echo '<meta name="keywords" content="'.$seo_keywords.'">'; } 
        }
    ?>
    
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    
<div id="page" class="site"><!-- Start Page -->
    
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'nwd-theme' ); ?></a>
	
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): 

    /**
     * Get Top Bar
     * 
     */
 
        if( get_theme_mod('show_top_bar') ){
        
            $first_col = get_theme_mod( 'top_bar_first_col' );
            $second_col = get_theme_mod( 'top_bar_second_col' );
            $third_col = get_theme_mod( 'top_bar_third_col' ); ?>

                <div class="top-bar">

                    <div class="container">
                        
                        <div class="d-flex justify-content-end" style="padding-right: 30px; padding-left: 30px;">
    
                            <?php if (!empty ($first_col)){ echo '<div class="column">'.$first_col.'</div>'; } ?>
                            
                            <?php if (!empty ($second_col)){ echo '<div class="column"><a href="tel:'.$second_col.'">'.$second_col.'</a></div>'; } ?>
                            
                            <?php if (!empty ($third_col)){ echo '<div class="column"><a href="mailto:'.$third_col.'">'.$third_col.'</a></div>'; } ?>
                            
                            <nav class="navbar navbar-expand-xl p-0">
                            
                                <?php
                                wp_nav_menu(array(
                                    'theme_location'    => 'top_bar',
                                    'container'       => 'div',
                                    'container_id'    => 'top-nav',
                                    'container_class' => 'justify-content-end',
                                    'menu_id'         => false,
                                    'menu_class'      => 'navbar-nav flex-row',
                                    'depth'           => 3,
                                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                    'walker'          => new wp_bootstrap_navwalker()
                                ));
                                ?>  
                            
                            </nav>
                            
                            
                            <?php echo nwd_social_media(); ?>
                        
                        </div>
                    
                    </div>

                </div>

        <?php } 


    /**
     * Get Header
     * 
     */     ?>
     
        <header id="masthead" class="site-header navbar-static-top <?php echo nwd_theme_bg_class(); ?>">

            <div class="container">
            
                <nav class="navbar navbar-expand-xl p-0">
                    
                    <div class="flex-logo">
                    
                        <?php if ( get_theme_mod( 'nwd_theme_logo' ) ): ?>
                        
                            <a href="<?php echo esc_url( home_url( '/' )); ?>">
                                
                                <img src="<?php echo esc_url(get_theme_mod( 'nwd_theme_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                
                            </a>
                            
                        <?php else : ?>
                        
                            <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                            
                        <?php endif; ?>

                    </div>
                
                    <?php
                    wp_nav_menu(array(
                        'theme_location'    => 'primary',
                        'container'       => 'div',
                        'container_id'    => 'main-nav',
                        'container_class' => 'collapse navbar-collapse justify-content-end',
                        'menu_id'         => false,
                        'menu_class'      => 'navbar-nav',
                        'depth'           => 3,
                        'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                        'walker'          => new wp_bootstrap_navwalker()
                    ));
                    ?>

                    <div class="flex-banner d-flex ml-3">
                    
                        <?php 
                        
                            $banner_phone_text = get_theme_mod( 'banner_phone_text' ); 
                            $banner_phone_number = get_theme_mod( 'banner_phone_number' ); 
    
                            if (!empty($banner_phone_text)){ ?>
    
                                <p class="text-right mb-0 mr-4" style="color: grey; font-size: 0.8em;"><?php echo $banner_phone_text; ?><br>
                                <i class="fas fa-phone-alt mr-1"></i> <a class="colorDark font-weight-bold" style="font-size: 1.2rem;" href="tel:<?php echo $banner_phone_number; ?>"><?php echo $banner_phone_number; ?></a></p>
                
                        <?php } ?>
                        
                        
                        <?php 
    
                            $banner_button_text = get_theme_mod( 'banner_button_text' ); 
                            $banner_button_link = get_theme_mod( 'banner_button_link' ); 
    
                            if (!empty($banner_button_text)){ ?>
                    
                                <a class="button" href="<?php echo $banner_button_link; ?>"><?php echo $banner_button_text; ?></a>
                
                        <?php } ?>
                    
                    </div>
 
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-expanded="false" aria-label="Toggle navigation">
                        
                        <i class="fas fa-bars"></i>
                        
                    </button>

                </nav>

            </div>
        
	   </header>


    <?php
 
        /**
         * Get Subheader
         * 
         */
     
        if(!get_theme_mod( 'subheader_visibility' )): 

            get_template_part( 'template-parts/content', 'subheader' );

        endif; ?>





    <?php

    /**
     * Start main Page content
     * 
     */
     
    if ( is_page( ) ) {

        $under_header = get_post_meta( $post->ID, 'under_header_slider', true );
    
        if (!empty($under_header)){   ?>
    
            <div class="slider-container">
                
		        <?php   echo do_shortcode( ''. $under_header .'' ); ?>
		        
		  </div>
    
        <?php }
                
    }

?>
    
	<main id="content" class="site-content" role="main"><!-- Start Content -->
		
		    <div class="row"><!-- Start Row -->
			    
                <?php endif; ?>
                
                