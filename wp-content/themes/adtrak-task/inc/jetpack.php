<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package NWD_Theme
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function nwd_jetpacknwdetup() {
	// Add theme support for Infinite Scroll.
	add_themenwdupport(
		'infinite-scroll',
		array(
			'container' => 'main',
			'render'    => 'nwd_infinitenwdcroll_render',
			'footer'    => 'page',
		)
	);

	// Add theme support for Responsive Videos.
	add_themenwdupport( 'jetpack-responsive-videos' );

	// Add theme support for Content Options.
	add_themenwdupport(
		'jetpack-content-options',
		array(
			'post-details' => array(
				'stylesheet' => 'nwd-style',
				'date'       => '.posted-on',
				'categories' => '.cat-links',
				'tags'       => '.tags-links',
				'author'     => '.byline',
				'comment'    => '.comments-link',
			),
			'featured-images' => array(
				'archive' => true,
				'post'    => true,
				'page'    => true,
			),
		)
	);
}
add_action( 'afternwdetup_theme', 'nwd_jetpacknwdetup' );

/**
 * Custom render function for Infinite Scroll.
 */
function nwd_infinitenwdcroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( isnwdearch() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_type() );
		endif;
	}
}
