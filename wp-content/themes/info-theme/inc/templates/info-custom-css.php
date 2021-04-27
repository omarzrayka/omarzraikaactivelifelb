<h1>Info Custom CSS</h1>
<?php  settings_errors();?>



<form id="save-custom-css-form" method="post" action="options.php" class="info-general-form">
<?php settings_fields('info-custom-css-options');?>
<?php do_settings_sections('omarz_info_css');?>
<?php submit_button();?>

</form>