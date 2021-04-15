<?php 

/*

@package infotheme  

  ========================
   THEME CUSTOM POST TYPES 
  ========================
  
*/
$contact = get_option('activate_contact') ;

if( @$contact ==1 ){
add_action('init','info_contact_custom_post_type');
add_filter('manage_info-contact_posts_columns','info_set_contact_columns');
add_action('manage_info-contact_posts_custom_column','info_contact_custom_column', 10 ,2);
add_action('add_meta_boxes','info_add_contact_meta_box');
add_action('save_post','info_save_contact_email_data');
}
/*CONTACT CPT */
function info_contact_custom_post_type(){
	$labels = array(
	'name'            => 'Messages',
	'singular_name'   => 'Message',
	'menu_name'       => 'Messages',
	'name_admin_bar'  => 'Message',
	);
	$args = array(
	 'labels'        =>$labels,
	 'show_ui'       => true,
	 'show_in_menu'  => true,
	 'capability'    => 'post',
	 'hierachical'   => false,
	 'menu_position' => 26,
	 'menu_icon' => 'dashicons-email-alt',
	 'supports'      => array('title','editor','author')
	 );
	 register_post_type('info-contact', $args);
}
function info_set_contact_columns( $columns){
	$newcolumns = array();
	$newcolumns['title'] = 'Full Name';
	$newcolumns['message'] = 'Message';
	$newcolumns['email'] = 'Email';
	$newcolumns['date'] = 'Date';
	return $newcolumns;	
}

function info_contact_custom_column($column, $post_id){
	switch($column){
		case 'message';
		echo get_the_excerpt();
		break;
		case 'email';
		$email = get_post_meta($post_id,'_contact_email_value_key', true);
		echo $email;
		//echo 'email address';
		break;
		
	}
}
/*CONTACT META BOX*/
function info_add_contact_meta_box(){
	add_meta_box('contact_email','User Email','info_contact_email_callback','info-contact','side');
	
}
function info_contact_email_callback($post){
	wp_nonce_field('info_save_contact_email_data','info_contact_email_meta_box_nonce');
	$value = get_post_meta($post->ID ,'_contact_email_value_key',true);
	echo '<label for="info_contact_email_field">User Email Address </label>';
	echo '<input type="email" id="info_contact_email_field" name="info_contact_email_field" value="'.esc_attr($value).'" size="25">';
	
}
function info_save_contact_email_data($post_id){
	if( ! isset($_POST['info_contact_email_meta_box_nonce'])){
		return;
	}
	if( ! wp_verify_nonce($_POST['info_contact_email_meta_box_nonce'],'info_save_contact_email_data')){
		return;
	}
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
	}
	if( ! current_user_can('edit_post', $post_id)){
		return;
	}
	if( ! isset( $_POST['info_contact_email_field'])){
		return;
	}
	$my_data = sanitize_text_field($_POST['info_contact_email_field']);
	
	update_post_meta($post_id,'_contact_email_value_key', $my_data);	
}

function info_custom_post_type(){
	$labels=array('name'=>'experience',
	'singular_name'=>'experience',
	'add_new'=>'Add Experience',
	'all_experiences'=>'All experience',
	'add_new_experience'=>'Add Experience',
	'edit_experience'=>'Edit Experience',
	'new_experience'=>'New Experience',
	'view_experience'=>'View Experience',
	'search_experience'=>'Search Experience',
	'not_found'=>'No experience found',
	'not_found_in_trash'=>'No experience found in trash',
	'parent_experience_colon'=>'Parent item'
	);
	$args= array('labels'=>$labels,
	             'public'=>true,
	             'has_archive'=>true,
	             'public_queryable'=>true,
	             'query_var'=>true,
	             'rewrite'=>true,
	             'capability_type'=>'post',
	             'hierarchical'=>false,
				 'support'=>array('title','editor','excerpt','thumbnail','revision'),
				 'taxonomies'=>array('category','post_tag'),
				 'menu_position'=>5,
				 'exclude_from_search'=>false
				 );
    register_post_type('experience', $args);
}
function set_experience_columns( $columns){
	$newcolumns = array();
	$newcolumns['title'] = 'title';
	$newcolumns['description'] = 'Description';
	$newcolumns['year'] = 'Year';
	return $newcolumns;	
}
function experience_custom_column($column, $post_id){
	switch($column){
		case 'description';
		echo get_the_excerpt();
		break;
		case 'year';
		$year = get_post_meta($post_id,'_experience_year_value_key', true);
		echo $year;
		break;
		
	}
}
function add_experience_meta_box(){
	add_meta_box('experience_year','experience year','experience_year_callback','experience','side');
	
}
function experience_year_callback($post){
	wp_nonce_field('save_experience_year_data','experience_year_meta_box_nonce');
	$value = get_post_meta($post->ID ,'_experience_year_value_key',true);
	echo '<label for="experience_year_field">Experience Year: </label>';
	echo '<input type="text" id="experience_year_field" name="experience_year_field" value="'.esc_attr($value).'" size="25">';
	
}
function save_experience_year_data($post_id){
	if( ! isset($_POST['experience_year_meta_box_nonce'])){
		return;
	}
	if( ! wp_verify_nonce($_POST['experience_year_meta_box_nonce'],'save_experience_year_data')){
		return;
	}
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
	}
	if( ! current_user_can('edit_post', $post_id)){
		return;
	}
	if( ! isset( $_POST['experience_year_field'])){
		return;
	}
	$my_data = sanitize_text_field($_POST['experience_year_field']);
	
	update_post_meta($post_id,'_experience_year_value_key', $my_data);	
}
add_action('init', 'info_custom_post_type');
add_filter('manage_experience_posts_columns','set_experience_columns');
add_action('manage_experience_posts_custom_column','experience_custom_column', 10 ,2);
add_action('add_meta_boxes','add_experience_meta_box');
add_action('save_post','save_experience_year_data');


add_action( 'pre_get_posts', 'add_my_post_types_to_query' );
 
function add_my_post_types_to_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'experience' ) );
    return $query;
}

