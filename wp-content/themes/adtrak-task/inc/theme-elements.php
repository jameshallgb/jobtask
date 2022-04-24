<?php


/**
 * Function - Social Media
 *
 * Call for Header and Footer
 *
 */
    function nwd_social_media()    {
        $facebook = get_theme_mod( 'social_facebook' );
        $instagram = get_theme_mod( 'social_instagram' );
        $twitter = get_theme_mod( 'social_twitter' );
        $youtube = get_theme_mod( 'social_youtube' );

            echo '<ul class="row list-unstyled social-media-list">';

            if ( !empty( $facebook )) { 
                echo '<li><a href="'.$facebook.'"><i class="fab fa-facebook-square"></i></a></li>'; }
    
            if ( !empty( $instagram )) { 
                echo '<li><a href="'.$instagram.'"><i class="fab fa-instagram"></i></a></li>'; }    
    
            if ( !empty( $twitter )) { 
                echo '<li><a href="'.$twitter.'"><i class="fab fa-twitter"></i></a></li>'; }    
    
            if ( !empty( $youtube )) { 
                echo '<li><a href="'.$youtube.'"><i class="fab fa-youtube"></i></a></li>'; }       
            
            echo '</ul>';
}


/**
 * Shortcode - Social Media
 *
 */
    function show_social_media() {

        ob_start();

        nwd_social_media();
    
        return ob_get_clean();
    }

add_shortcode( 'nwd_social_media', 'show_social_media' );
