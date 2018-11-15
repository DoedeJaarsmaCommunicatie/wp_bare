<?php
/**
 * Badubed functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Badubed
 */

$djc_error = function ($message, $subtitle = '', $title = '') {
	$title = $title ?: __('DJC &rsaquo; Error', 'djc');
	$footer = '<a href="https://doedejaarsma.nl/contact/">doedejaarsma/contact</a>';
	$message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
	wp_die($message, $title);
};
add_filter( 'template_include', 'moustache_include_if_exists', 99 );

function moustache_include_if_exists( $template ) {
	
	var_dump($template);
	if ( is_page( 'portfolio' ) ) {
		$new_template = locate_template( array( 'portfolio-page-template.php' ) );
		if ( !empty( $new_template ) ) {
			return $new_template;
		}
	}
	
	return $template;
}

/**
 * Badubed required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($djc_error) {
	$file = "./app/{$file}.php";
	if (!locate_template($file, true, true)) {
		$djc_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'djc'), $file), 'File not found');
	}
}, [ 'helpers', 'setup', 'filters', 'admin', 'ajax', 'shortcodes', 'cron', 'customizer' ]);