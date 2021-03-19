<h1>Info Contact Form</h1>
<?php  settings_errors();?>



<form method="post" action="options.php" class="info-general-form">
<?php settings_fields('info-contact-options');?>
<?php do_settings_sections('omarz_info_theme_contact');?>
<?php submit_button();?>

</form>