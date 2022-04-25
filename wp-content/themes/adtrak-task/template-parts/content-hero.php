<?php

 /* Show main hero */


    $hero = get_field('hero_options');
    
    if( have_rows('hero_options') ): while ( have_rows('hero_options') ) : the_row();  ?>
    
       <section id="hero" class="d-flex overflow-hidden position-relative mb-n3"> 
       
            <div class="container">
                
                <div class="d-flex flex-column flex-md-row align-items-start h-md-100">
                    
                    <div class="p-2 mt-5 text-center position-absolute bgOrange" style="z-index: 1;">
                        
                        <span class="colorWhite" style="font-size: 3em; line-height: 1;">SALE<span class="d-block" style="font-size: 0.7em;">now on</span></span>
                        
                    </div>
                
                    <div class="hero_image col-12 col-md-7 h-md-100" style="min-height: 400px;">
                    
                    <?php
                    
                        $hero_image = $hero['hero_image'];
                        
                        if( !empty( $hero_image ) ): ?>
                        
                            <img class="position-absolute" style="right: -15px; top: 0; min-width: 65vw; max-width: 100vw; min-height: 100%;" src="<?php echo esc_url( $hero['hero_image']['url'] ); ?>" alt="<?php echo esc_attr( $hero['hero_image']['alt'] ); ?>" />
                            
                        <?php endif; ?>
    
                    </div>
    
                    <div class="hero_content col-12 col-md-5">
                        
                        <div class="hero_title mt-sm-5 col-10 col-md-12 pl-3 pt-3 pb-3 bgWhite ml-md-n6">
                        
                            <?php echo $hero["hero_title"]; ?>
                            
                        </div>
                        
                        <div class="hero_text pl-2 pb-6">
                        
                        <?php
                            
                        echo $hero["hero_content"];
                        
                        if( have_rows('hero_buttons') ): ?>
                            
                            <div class="hero_buttons pt-2">
    
                                <?php while( have_rows('hero_buttons') ) : the_row(); ?>
                                    
                                    <?php if( get_sub_field('button_text') ): ?>
                                    
                                        <a class="button mr-2" href="<?php the_sub_field('button_link'); ?>"><?php the_sub_field('button_text'); ?></a>
                                    
                                    <?php endif; ?>
                                    
                                <?php endwhile; ?>
                                
                            </div>
                        
                        <?php else : ?>
    
                        <?php endif; ?>

    		            </div>
    
                    </div>
    
    	        </div>
    
            </div>
    
        </section>	       
    
    <?php endwhile; endif; ?>
