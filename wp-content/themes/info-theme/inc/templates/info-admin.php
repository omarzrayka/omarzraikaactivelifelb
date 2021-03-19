<h1>Info Sidebar Options</h1>
<?php settings_errors();?>
<?php 
    $firstName = esc_attr( get_option('first_name') );
	$lastName = esc_attr( get_option('last_name') );
	$fullName = $firstName.' '.$lastName;
	$description = esc_attr( get_option('description') );
?>

<div class="info-sidebar-preview">
    <div class="info-sidebar">
	  <h1 class="info-username"><?php print $fullName ?></h1>
	  <h2 class="info-description"><?php print $description ?></h2>
	  <div class="icons-wrapper">
	  
	  </div>
    </div>
</div>
<form method="post" action="options.php" class="info-general-form">
<?php settings_fields('info-settings-group');?>
<?php do_settings_sections('omarz_info');?>
<?php submit_button();?>

</form>