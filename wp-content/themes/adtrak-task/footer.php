<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NWD_THEME
 */

?>
<?php if ( !is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			
			</div><!-- End Row -->
		
	</main><!-- End Content -->
	
    <?php get_template_part( 'footer-widget' ); ?>
    
    <footer id="colophon" class="site-footer <?php echo nwd_theme_bg_class(); ?>">

		<div class="container d-flex pt-3 pb-3">
    
            <div class="site-info">
                
                &copy; <?php echo date('Y'); ?> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>
                
            </div><!-- close .site-info -->
            
            <div class="copyright-content">
                
                <?php echo nwd_social_media(); ?>
                
            </div>
            
		</div>
		
	</footer><!-- #colophon -->
	
<?php endif; ?>

</div><!-- End Page -->

<?php wp_footer(); ?>

</body>

</html>