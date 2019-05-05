<?php
/**
 * Launchpod Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package launchpod
 */

add_action( 'wp_enqueue_scripts', 'understrap_parent_theme_enqueue_styles' );

/**
 * Enqueue scripts and styles.
 */
function understrap_parent_theme_enqueue_styles() {
	wp_enqueue_style( 'understrap-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'launchpod-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'understrap-style' )
	);

}


add_filter( 'comment_form_defaults', 'understrap_bootstrap_comment_form' );

/**
 * Builds the form.
 *
 * @param string $args Arguments for form's fields.
 *
 * @return mixed
 */
function understrap_bootstrap_comment_form( $args ) {
	$args['comment_field'] = '<div class="form-group comment-form-comment">
	<label for="comment">' . _x( 'Comment ', 'noun', 'understrap' ) . ( '<span class="required">*</span>' ) . '</label>
	<textarea class="form-control" id="comment" name="comment" aria-required="true" cols="45" rows="8"></textarea>
	</div>';
	$args['class_submit']  = 'btn btn-secondary'; // since WP 4.1.
	return $args;
}
