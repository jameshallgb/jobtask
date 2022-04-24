
<?php

    /**
     * Get Subheader
     * 
     */
 
    if(!get_theme_mod( 'subheader_visibility' )): 

        if ( has_post_thumbnail() ) {
                
		    $thumb_id = get_post_thumbnail_id();
			$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
			$headerimg = $thumb_url_array[0];
			    
	    } else {    
		    
		    if ( has_header_image()) {  
					       
			    $headerimg =  get_theme_mod( 'header_image' );
			    
		    } else {	}
	    }
    
        if (  is_page() || is_single() || is_home() ) {
            
            $remove_subheader = get_post_meta( $post->ID, 'remove_subheader', true );

            if( !$remove_subheader==1 ) { ?>
 
            <section class="subheader" style="<?php if (!empty($headerimg)){ echo 'background-image: url('.$headerimg.');'; } ?>">

                <?php $overlay_colour = get_theme_mod( 'custom_overlay_colour' );

                if ( !empty($overlay_colour) && !empty($headerimg) ) { ?>

                    <div class="main-overlay"></div>
                    
                <?php } ?>


                <div class="container subheader-content">

		            <?php
		        
		                if ( !empty($cat) ) {
		
		                    single_cat_title( '<h2 class="entry-title">', '</h2>' );
                        
                        } elseif ( is_single() ) {
                                        
                            the_title( '<h2 class="entry-title">', '</h2>' );
                                        
                        } elseif ( is_home() ) {
                                        
                            echo '<h2 class="entry-title">Blog</h2>';
                                        
                        } else {
                                        
                            the_title( '<h2 class="entry-title">', '</h2>' );
                                        
                        } ?>

                    <?php
		        
		            if ( is_single() ) { ?>
		        	
		                <div class="entry-meta">
		                
			                <?php nwd_theme_posted_on(); ?>
			            
		                </div>
		            
		            <?php   }   ?> 

		        </div>

            </section>	       

        <?php }
            }
     
        endif; ?>