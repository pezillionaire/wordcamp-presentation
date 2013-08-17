<?php


add_theme_support('automatic-feed-links');
add_filter('show_admin_bar', '__return_false');
add_theme_support('post-thumbnails'); 



function disable_self_ping( &$links ) {
	foreach ( $links as $l => $link )
		if ( 0 === strpos( $link, home_url() ) )
		unset($links[$l]);
} add_action( 'pre_ping', 'disable_self_ping' );



function add_page_excerpts() { add_post_type_support('page', 'excerpt'); }
add_action('init', 'add_page_excerpts');



function textbutton( $atts, $content = null ) {
	return '<div class="buttonwrap">'.$content.'</div>';
} add_shortcode("button", "textbutton");


function textbuttonalt( $atts, $content = null ) {
	return '<div class="wrapalt">'.$content.'</div>';
} add_shortcode("buttonalt", "textbuttonalt");


add_action( 'wp_enqueue_scripts', 'register_jquery' );

function register_jquery() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', ( 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js' ), false, null, true );
	wp_enqueue_script( 'jquery' );
}

function theme_styles() { 
  wp_register_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic|Open+Sans:400,600', array(), '20130416', 'all' );
  wp_register_style( 'main-style', get_template_directory_uri() . '/style.css', array(), '20130416', 'all' );

  wp_enqueue_style( 'google-fonts' );
  wp_enqueue_style( 'main-style' );    
}

add_action('wp_enqueue_scripts', 'theme_styles');

function highlight_results($text){
	if(is_search()){
	$sr = get_query_var('s');
	$keys = explode(" ",$sr);
	$text = preg_replace('/('.implode('|', $keys) .')/iu', '<span class="searchterm">'.$sr.'</span>', $text);
	}
	return $text;
}
add_filter('the_excerpt', 'highlight_results');
add_filter('the_title', 'highlight_results');


function the_category_filter($thelist,$separator=' ') {
	if(!defined('WP_ADMIN')) {
		//Category IDs to exclude
		$exclude = array( get_theme_mod( 'popular_setting' ) );
		
		$exclude2 = array();
		foreach($exclude as $c) {
			$exclude2[] = get_cat_name($c);
		}
		
		$cats = explode($separator,$thelist);
		$newlist = array();
		foreach($cats as $cat) {
			$catname = trim(strip_tags($cat));
			if(!in_array($catname,$exclude2))
				$newlist[] = $cat;
		}
		return implode($separator,$newlist);
	} else {
		return $thelist;
	}
}
add_filter('the_category','the_category_filter', 10, 2);

?>