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
    
	//Custom CSS Options
	register_setting('info-custom-css-options','info_css', 'info_sanitize_custom_css');
	add_settings_section('info-custom-css-section','Custom CSS','info_custom_css_section_callback','omarz_info_css');	
    add_settings_field('custom_css','Insert your custom CSS', 'info_custom_css_callback', 'omarz_info_css','info-custom-css-section');

}

//post formats callback function
function info_post_formats_callback($input){
	return $input;
}

function info_theme_options(){
	echo 'Active and Deactive specific Theme Support Options';
}
function info_custom_css_section_callback(){
	echo 'Customize Your Theme With Your Own CSS';
}
function info_custom_css_callback(){
	$css = get_option( 'info_css' ) ;
    $css = (empty($css) ?  '/* info theme custom css */' : $css);
		echo '<div  id="customCss" contentEditable> '.$css.'</div><textarea id="info_css" name="info_css" style="display:none;visibility:hidden">'.$css.'</textarea><br>';
	
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
function info_sanitize_custom_css($input){
	$output = esc_textarea($input);
	return $output;
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
 require_once(get_template_directory().'/inc/templates/info-custom-css.php');	

	
}
function info_add_woocommerce_support()
 {
add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'info_add_woocommerce_support' );

function remove_woocommerce_styles($enqueue_styles){
	//unset($enqueue_styles['woocommerce-general']);
	//unset($enqueue_styles['woocommerce-layout']);
	//unset($enqueue_styles['woocommerce-smallscreen']);
	return $enqueue_styles;
}
add_action( 'woocommerce_enqueue_styles', 'remove_woocommerce_styles' );


/**
 * Footer widget one
 */
function custom_footer_widget_one(){
	$args= array(
		'id'=> 'footer_widget-col-one',
		'name'=> __('Footer Colum One','text-domain'),
		'description'=> __('colum_one','text-domain'),
		'before_title'=>'<h3 class="title">',
		'after_title'=>'</h3>',
		'before_widget'=>'<div id="%1$s" class="widget %2s">',
		'after_widget'=> '</div>'
	);
	register_sidebar($args);
}
add_action( 'widgets_init', 'custom_footer_widget_one' );

function custom_footer_widget_two(){
	$args= array(
		'id'=> 'footer_widget-col-two',
		'name'=> __('Footer Colum Two','text-domain'),
		'description'=> __('colum_One','text-domain'),
		'before_title'=>'<h3 class="title">',
		'after_title'=>'</h3>',
		'before_widget'=>'<div id="%1$s" class="widget %2s">',
		'after_widget'=> '</div>'
	);
	register_sidebar($args);
}
add_action( 'widgets_init', 'custom_footer_widget_two');


function custom_footer_widget_three(){
	$args= array(
		'id'=> 'footer_widget-col-three',
		'name'=> __('Footer Colum Three','text-domain'),
		'description'=> __('colum_One','text-domain'),
		'before_title'=>'<h3 class="title">',
		'after_title'=>'</h3>',
		'before_widget'=>'<div id="%1$s" class="widget %2s">',
		'after_widget'=> '</div>'
	);
	register_sidebar($args);
}
add_action( 'widgets_init', 'custom_footer_widget_three');

// Minimum CSS to remove +/- default buttons on input field type number
add_action( 'wp_head' , 'custom_quantity_fields_css' );
function custom_quantity_fields_css(){
    ?>
    <style>
    .quantity input::-webkit-outer-spin-button,
    .quantity input::-webkit-inner-spin-button {
        display: none;
        margin: 0;
		
		
    }
    .quantity input.qty {
        appearance: textfield;
        -webkit-appearance: none;
        -moz-appearance: textfield;
		 border: 0px;
		 background:#337ab7;
		 height:30px;
		 color:white;

    }
	 .items-count{
		background: #759cc7;
		border: 0px;
		margin-bottom: -2px;
		height:25px;
		height:30px;
	}
	.glyphicon-plus, .glyphicon-minus{
    color:white;
	}
    </style>
    <?php
}


add_action( 'wp_footer' , 'custom_quantity_fields_script' );
function custom_quantity_fields_script(){
	?>
    <script type='text/javascript'>
    jQuery( function( $ ) {
        if ( ! String.prototype.getDecimals ) {
            String.prototype.getDecimals = function() {
                var num = this,
                    match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                if ( ! match ) {
                    return 0;
                }
                return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
            }
        }
        // Quantity "plus" and "minus" buttons
        $( document.body ).on( 'click', '.plus, .minus', function() {
            var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
                currentVal  = parseFloat( $qty.val() ),
                max         = parseFloat( $qty.attr( 'max' ) ),
                min         = parseFloat( $qty.attr( 'min' ) ),
                step        = $qty.attr( 'step' );

            // Format values
            if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
            if ( max === '' || max === 'NaN' ) max = '';
            if ( min === '' || min === 'NaN' ) min = 0;
            if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

            // Change the value
            if ( $( this ).is( '.plus' ) ) {
                if ( max && ( currentVal >= max ) ) {
                    $qty.val( max );
                } else {
                    $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            } else {
                if ( min && ( currentVal <= min ) ) {
                    $qty.val( min );
                } else if ( currentVal > 0 ) {
                    $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            }

            // Trigger change event
            $qty.trigger( 'change' );
        });
    });
    </script>
    <?php
}

function info_widget_setup(){
	$args= array(
		'id'=> 'sidebar-1',
		'name'=> 'Sidebar',
		'class'=> 'custom',
		'description'=> 'Standard Sidebar',
		'before_title'=>'<h3 class="title">',
		'after_title'=>'</h3>',
		'before_widget'=>'<div id="%1$s" class="widget %2s">',
		'after_widget'=> '</div>'
	);
	register_sidebar($args);
}
add_action( 'widgets_init', 'info_widget_setup');

