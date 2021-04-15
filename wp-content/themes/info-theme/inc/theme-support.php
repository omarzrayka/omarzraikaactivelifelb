<?php 

/*

@package infotheme  

  ========================
   THEME SUPPORT OPTIONS
  ========================
  
*/
$options = get_option('post_formats') ;
$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
	$output = array();
	foreach($formats as $format){
		
		$output[] = ( @$options[$format] == 1 ? $format : '');
	}
if( !empty($options) ){
	
	  add_theme_support('post-formats', $output );
}

add_theme_support('post-thunbnails');

/* blog loop custom option */
function info_post_meta(){
	return 'category name and publshing time';
	
}
function info_posted_footer(){
return "tags and comments link";
}

/* Active Nav Menu Option*/
function info_register_nav_menu(){
	register_nav_menu('primary','Header Navigation Menu');	
}
add_action('after_setup_theme','info_register_nav_menu');

add_action( 'after_setup_theme', 'woocommerce_support' );

function woocommerce_support() {
   add_theme_support( 'woocommerce' );
}  

add_image_size('post_image',600,500, true);


