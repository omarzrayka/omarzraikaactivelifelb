<?php 

/*

@package infotheme  

  ===================================
        ADMIN ENQUEUE fUNCTIONS
  ===================================
  
*/

function info_load_admin_scripts( $hook){
	if('toplevel_page_omarz_info' != $hook){return;}
    wp_register_style('info_admin', get_template_directory_uri().'//css/info.admin.css', array(),'1.0.0','all');
    wp_enqueue_style('info_admin');
	
	wp_enqueue_media();
	
	wp_register_script('info-admin-script', get_template_directory_uri().'//js/info.admin.js', array('jquey'),'1.0.0',true);
    wp_enqueue_script('info-admin-script');
}
add_action('admin_enqueue_scripts','info_load_admin_scripts');