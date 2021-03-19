<?php 

/*

@package infotheme  

  ========================
        ADMIN PAGE
  ========================
  
*/

function info_add_admin_page(){
	
	add_menu_page('Info Theme Options', 'Info', 'manage_options', 'omarz_info', 
	'info_theme_create_page', 'dashicons-admin-customizer',110);
	
	add_submenu_page('omarz_info','Info Sidebar Options', 'sidebar', 'manage_options', 'omarz_info',
	'info_theme_create_page');
	add_submenu_page('omarz_info','Info CSS Options', 'Custom CSS', 'manage_options', 'omarz_info_css',
	'info_theme_settings_page');
	add_submenu_page('omarz_info','Info Contact Form', 'Contact Form', 'manage_options', 'omarz_info_theme_contact',
	'info_contact_form_page');
	add_submenu_page('omarz_info','Info Theme Options', 'Theme Option', 'manage_options', 'omarz_info_theme',
	'info_theme_support_page');

}
add_action('admin_menu', 'info_add_admin_page');

add_action('admin_init','info_custom_settings');

function info_custom_settings(){
    register_setting('info-settings-group','profile_picture');
    register_setting('info-settings-group','first_name');
    register_setting('info-settings-group','last_name');
    register_setting('info-settings-group','description');
    add_settings_section('info-sidebar-options','Sidebar Options','info_sidebar_options','omarz_info');	
    add_settings_field('sidebar-profile-picture','Profile Picture','info_sidebar_profile','omarz_info','info-sidebar-options');	
    add_settings_field('sidebar-name','Full Name','info_sidebar_name','omarz_info','info-sidebar-options');	
    add_settings_field('sidebar-description','Description','info_sidebar_description','omarz_info','info-sidebar-options');	
    
	//theme support options
	register_setting('info-theme-support','post_formats','info_post_formats_callback');
    add_settings_section('info-theme-options','Theme Options', 'info_theme_options', 'omarz_info_theme');
    add_settings_field('post-formats','Post Formats', 'info_post_formats', 'omarz_info_theme','info-theme-options');
    
	//Contact Form Options
	register_setting('info-contact-options','activate_contact');
	add_settings_section('info-contact-section','Contact Form','info_contact_section','omarz_info_theme_contact');	
    add_settings_field('activate-form','Activate Contact Form', 'info_activate_contact', 'omarz_info_theme_contact','info-contact-section');

}

//post formats callback function
function info_post_formats_callback($input){
	return $input;
}
function info_theme_options(){
	echo 'Active and Deactive specific Theme Support Options';
}
function info_contact_section(){
	echo 'Active and Deactive the build-in Contact Form';
}
function info_post_formats(){
	$options = get_option( 'post_formats' ) ;
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
	$output = '';
	foreach($formats as $format){
		$checked = (@$options[$format] == 1 ? 'checked' : '');
		$output .= '<label><input type="checkbox" name="post_formats['.$format.']" id="'.$format.'" value="1" '.$checked.'/>'.$format.'</label><br>';
	}
	echo $output;
	
}
function info_activate_contact(){
	$options = get_option( 'activate_contact' ) ;
    $checked = (@$options == 1 ? 'checked' : '');
		echo '<label><input type="checkbox" name="activate_contact" id="custom_header" value="1" '.$checked.'/> Activate the Contact Form</label><br>';

	
}
function info_sidebar_options(){
	echo 'Customize Sidebar Options';
}
function info_sidebar_profile(){
	$picture = esc_attr( get_option('profile_picture') );
	echo '<input type="button"  class="button button-secondary" value="Upload Profile Picture" id="upload-button" />
	<input type="hidden" name="profile_picture"  value="'.$picture.'" id="profile-picture"  />';
}
function info_sidebar_name(){
	$firstName = esc_attr( get_option('first_name') );
	$lastName = esc_attr( get_option('last_name') );
	echo '<input type="text" name="first_name"  value="'.$firstName.'" placeholder="First Name" />';
	echo '<input type="text" name="last_name"  value="'.$lastName.'" placeholder="Last Name" />';
}

function info_sidebar_description(){
	$description = esc_attr( get_option('description') );
	echo '<input type="text" name="description"  value="'.$description.'" placeholder="Description" />';
}
//template submenu functions
function info_theme_create_page(){
	//generation of our admin page
    require_once(get_template_directory().'/inc/templates/info-admin.php');	
}
function info_contact_form_page(){
	//generation of our admin page
    require_once(get_template_directory().'/inc/templates/info-contact-form.php');	
}

function info_theme_support_page(){
    require_once(get_template_directory().'/inc/templates/info-theme-support.php');	
}
function info_theme_settings_page(){
	echo '<h1>Info Custom CSS</h1>';
	
}
