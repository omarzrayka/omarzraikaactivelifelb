<?php 

/*

@package infotheme  

  ===================================
        ADMIN ENQUEUE fUNCTIONS
  ===================================
  
*/

function info_load_admin_scripts( $hook){
	if('toplevel_page_omarz_info' == $hook){

    wp_register_style('info_admin', get_template_directory_uri().'//css/info.admin.css', array(),'1.0.0','all');
    wp_enqueue_style('info_admin');
	
	wp_enqueue_media();
	
	wp_register_script('info-admin-script', get_template_directory_uri().'//js/info.admin.js', array('jquey'),'1.0.0',true);
    wp_enqueue_script('info-admin-script');
	
	}elseif('info_page_omarz_info_css'== $hook){
	wp_enqueue_style('ace', get_template_directory_uri().'//css/info.ace.css', array(),'1.0.0','all');	    
	wp_enqueue_script('ace', get_template_directory_uri().'//js/ace/ace.js', array('jquey'),'1.4.1',true);
  wp_enqueue_script('info-custom-css-script', get_template_directory_uri().'//js/info.custom_css.js', array('jquey'),'1.0.0',true);
    
		
	
	}else{return;}
}
add_action('admin_enqueue_scripts','info_load_admin_scripts');

/*
 ===================================
        FRONT-END ENQUEUE fUNCTIONS
 =================================== 
  */
function info_load_scripts(){
       if (class_exists('Woocommerce')){
 
        add_filter( 'woocommerce_enqueue_styles', '__return_false' );

      
        }

		wp_enqueue_style('bootstrap', get_template_directory_uri().'//css/bootstrap.min.css', array(),'3.4.1','all');	    
        wp_enqueue_style('css', get_template_directory_uri().'//style.css', array(),'1.0.0','all');
	    wp_enqueue_style('woocommerces', get_template_directory_uri().'//css/woocommerce/woocommerce.css', array(),'5.1.0','all');

      //  wp_deregister_script('jquey');
	  //  wp_register_script('jquery', get_template_directory_uri().'//js/jquery.min.js', array('jquey'),'1.9.1',true);
	  //  wp_enqueue_script('jquery');
	//	wp_enqueue_script('bootstrap', get_template_directory_uri().'//js/bootstrap.min.js', array('jquey'),'3.4.1',true);

}
add_action('wp_enqueue_scripts','info_load_scripts');
