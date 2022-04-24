<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package NWD_THEME
 */

    
    the_content();

    if( have_rows('sections') ):
    
        while ( have_rows('sections') ) : the_row();
        
            if( get_row_index() === 1 ){
                
                $section_bg = 'bgLight';
                $title_indent = 'extend_left mt-md-n6 ';
                
            } else {
                
                $section_bg = 'bgWhite';
                
            } ?>

                <section class="pt-5 pb-5 <?php echo $section_bg; ?>">
            
                    <div class="container">
                        
                        <?php if( get_sub_field('section_title') ): ?>
                
                        <div class="d-flex justify-content-center justify-content-md-start width-md-fit-content position-relative pt-3 pr-md-3 pb-3 <?php echo $section_bg; ?> <?php echo $title_indent; ?>" >
                    
                            <?php the_sub_field('section_title'); ?>
                    
                        </div>
                        
                        <?php endif; ?>
                            
                        <?php if( have_rows('section_content') ): ?>
                        
                        <div class="section_inner row flex-lg-nowrap flex-column flex-md-row align-items-center">
                    
                            <?php // Loop through rows.
                            
                            while ( have_rows('section_content') ) : the_row(); ?>
 
                                <?php if( get_row_layout() == 'card' ): ?>
                                
                                    <div class="card col-auto col-md-4 mb-5">
                                        
                                    <?php
                                    
                                        $card_image = get_sub_field( "card_image" );
                                        
                                        $size = 'medium';
                                        $thumb = $card_image['sizes'][ $size ];
                                        
                                        ?>
                                    
                                        <a href="<?php the_sub_field('card_link'); ?>">

                                            <?php if( !empty( $card_image ) ): ?>
                                        
                                                <img class="img-fluid" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($card_image['alt']); ?>" />
                                            
                                            <?php endif; ?>
                                            
                                            <div class="position-absolute col-9 col-xl-6 p-2 <?php echo $section_bg; ?>" style="bottom: 0; left: 0;">
                                            
                                                <h3 style="margin: 0;"><?php the_sub_field('card_title', false, false); ?></h3> 
                                                
                                                <svg class="position-absolute" style="right: 2rem; top: 2rem;" width="23" height="13" viewBox="0 0 23 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.4801 13L22.8438 6.63636L16.4801 0.272727L15.642 1.09659L20.5852 6.03977H0.5V7.23295H20.5852L15.642 12.1619L16.4801 13Z" fill="#FB6C55"/>
                                                </svg>

                                                <p class="colorOrange m-0">KITCHENS</p>
                                                
                                            </div>
                                            
                                        </a>
                                    
                                    </div>
                                
                                <?php endif; ?>

                                <?php if( get_row_layout() == 'icon' ): ?>
                                
                                    <div class="icon col-auto col-md-4 flex-md-fill text-center text-md-left mb-5 mb-md-0">
                                
                                    <?php 
                                    
                                        $icon = get_sub_field( "icon" );
                                    
                                        if( !empty( $icon ) ): ?>
                                    
                                            <img class="mb-5" src="<?php echo esc_url($icon['url']); ?>" width="42px" alt="<?php echo esc_attr($icon['alt']); ?>" />
                                        
                                        <?php endif; ?>
                                        
                                        <?php the_sub_field('icon_text'); ?>
                                            
                                    </div>
                                
                               <?php endif; ?>

                                <?php if( get_row_layout() == 'banner' ): ?>
                                
                                    <div class="banner col-12 col-md-auto flex-md-grow-1 flex-md-fill mt-5 mt-lg-0">
                                        
                                        <div class="banner_inner d-flex flex-column flex-md-row bgDark p-2 text-center text-md-left">
                                        
                                            <div class="col-12 col-md-7">
                                                
                                                <?php the_sub_field('banner_text'); ?>
                                                
                                            </div>
                                                
                                            <div class="col-12 col-md-5 text-center border p-1">
                                                
                                                <?php the_sub_field('banner_contact'); ?>
                                                
                                                <?php if( get_sub_field('banner_button_text') ): ?>
                                                    
                                                    <a class="button" href="<?php the_sub_field('banner_button_link'); ?>"><?php the_sub_field('banner_button_text'); ?></a>
                                                
                                                <?php endif; ?>
                                                
                                            </div>
                                            
                                        </div>
                                                
                                    </div>
                                
                                <?php endif; ?>

                            <?php endwhile; ?>
                            
                        </div>
                            
                    <?php else : ?>
                            
                    <?php endif; ?>
                    
                </div>
    
            </section>
    
        <?php $section_bg = ''; ?>
        <?php $title_indent = ''; ?>
    
    
    
        <?php endwhile; ?>
        
    <?php else : ?>
            
    <?php endif; ?>

	<?php if ( get_edit_post_link() && !$enable_vc ) : ?>
	
		<footer class="entry-footer">
		    
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'nwd-theme' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
			
		</footer><!-- .entry-footer -->
		
	<?php endif; ?>
	
</article>
