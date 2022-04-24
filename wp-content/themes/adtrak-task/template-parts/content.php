<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package NWD_THEME
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
	<div class="post-thumbnail">
	    
		<?php the_post_thumbnail(); ?>
		
	</div>

	<div class="entry-content">
		<?php
		
        if ( is_single() ) :

			the_content();

        else :

            echo '<a href='.get_permalink( $id ).'><p class="post-loop-title">'.get_the_title().'</p></a>';

            $get_post_text = get_the_excerpt($id);
			$trim_content_post = wp_trim_words( $get_post_text, $num_words = 45, $more = null );
			
            echo '<p class="post-loop-desc">'.$trim_content_post.'</p>';

        endif;

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nwd-theme' ),
				'after'  => '</div>',
			) );
		?>

		
		
		
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	    
		<?php nwd_theme_entry_footer(); ?>
		
	</footer><!-- .entry-footer -->
	
</article>
