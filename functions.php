<?php
// Add RSS links to <head> section
add_theme_support('automatic-feed-links');

// Include theme stylesheet
if (!is_admin()) {
	// Load CSS
	add_action('wp_enqueue_scripts', 'km_load_styles', 11);
	function km_load_styles() {
		// Theme Styles
		wp_register_style('theme-styles', get_stylesheet_uri(), array(), null, 'all');
		wp_enqueue_style('theme-styles');

		wp_register_style('wonder_styles', '/wp-content/themes/kurtmahler/assets/css/wonder.css', __FILE__, array(), null, 'all');
	    wp_enqueue_style('wonder_styles');
	}

	add_action('wp_enqueue_scripts', 'km_load_scripts', 12);
	function km_load_scripts() {
		// jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', '/wp-content/themes/kurtmahler/assets/js/jquery.min.js', array(), null, true);
		wp_enqueue_script('jquery');
		// jQuery Scrollex
		wp_deregister_script('jquery-scrollex');
		wp_register_script('jquery-scrollex', '/wp-content/themes/kurtmahler/assets/js/jquery.scrollex.min.js', array('jquery'), null, true);
		wp_enqueue_script('jquery-scrollex');
		// jQuery Scrolly
		wp_deregister_script('jquery-scrolly');
		wp_register_script('jquery-scrolly', '/wp-content/themes/kurtmahler/assets/js/jquery.scrolly.min.js', array('jquery'), null, true);
		wp_enqueue_script('jquery-scrolly');
		// Skel
		wp_deregister_script('skel');
		wp_register_script('skel', '/wp-content/themes/kurtmahler/assets/js/skel.min.js', array(), null, true);
		wp_enqueue_script('skel');
		// Util
		wp_deregister_script('util');
		wp_register_script('util', '/wp-content/themes/kurtmahler/assets/js/util.js', array('jquery'), null, true);
		wp_enqueue_script('util');

		wp_deregister_script('respond');
		wp_enqueue_script('respond', '/wp-content/themes/kurtmahler/assets/js/ie/respond.min.js');
		wp_script_add_data('respond', 'conditional', 'lt IE 9');
		// Main
		wp_deregister_script('main');
		wp_register_script('main', '/wp-content/themes/kurtmahler/assets/js/main.js', array('jquery'), null, true);
		wp_enqueue_script('main');
	}
}
// Clean up the <head>
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Sidebar Widgets',
		'id'   => 'sidebar-widgets',
		'description'   => 'These are widgets for the sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
}


//Custom site title
add_filter( 'wp_title', 'title_fix' );
function title_fix( $title ) {
	if( empty( $title ) && ( is_home() || is_front_page() ) ) {
		return get_bloginfo( 'name' ) . ' | ' . get_bloginfo( 'description' );
	}
	return $title;
}

register_nav_menus(array(
	'primary' => __('Main Menu')
));

//Add featured image support
add_theme_support( 'post-thumbnails' );


//Custom Main Menu Walker
class Mahler_Menu_Walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
		$output .= "<li class='" .  implode(" ", $item->classes) . "'>";
 
		if ($item->url && $item->url != '#') {
			$output .= '<span class="menu-item__dropdown"><a href="' . $item->url . '" class="menu-item__dropdown-parent">';
		} else {
			$output .= '<span>';
		}
 
		$output .= $item->title.'</a>';
 
		if ($item->url && $item->url !== '#') {
			if ($args->walker->has_children) {
				$output .= '<a href="#"><i class="caret fa fa-angle-down"></i></a>';
			}
			$output .= '</a>';
		}
		$output .= '</span>';
	}
}

?>