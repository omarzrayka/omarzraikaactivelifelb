<?php 

/*

@package infotheme  
 ========================
   REMOVE GENERATOR VERSION NUMBER
 ========================
  
*/
/* remove version string from css and js*/
function info_wp_remove_version_strings( $scr){
	global $wp_version;
	parse_str(parse_url($scr,PHP_URL_QUERY));
	if(!empty('ver') && $query['ver']=== $wp_version){
		$scr = remove_query_arg('ver', $scr);
	}
	return $scr;
}
add_filter('script_loader_scr','info_wp_remove_version_strings');
add_filter('style_loader_scr','info_wp_remove_version_strings');

/* remove meta version string from header*/
function info_remove_meta_version(){
	return '';
}
add_filter('the_generator', 'info_remove_meta_version');