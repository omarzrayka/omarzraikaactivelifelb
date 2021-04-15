<?php 

/*

@package infotheme  

  ========================
        shortcodes PAGE
  ========================
  
*/
function info_contact_form($atts, $content = null){
	
	$atts = shortcode_atts(
	      array(),
		  $atts,
		  'contact_form'
	);
	
	ob_start();
	include 'templates/contact-form.php';
	return ob_get_clean();
}

add_shortcode('contact_form', 'info_contact_form');

function info_experience($atts, $content = null){
	
	$atts = shortcode_atts(
	      array(),
		  $atts,
		  'experience'
	);
	
	ob_start();
	//include 'templates/archive-experience.php';
	return ob_get_clean();
}

add_shortcode('experience', 'info_experience');
