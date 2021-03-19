<h1>Info Sidebar Support</h1>
<?php  settings_errors();?>



<form method="post" action="options.php" class="info-general-form">
<?php settings_fields('info-theme-support');?>
<?php do_settings_sections('omarz_info_theme');?>
<?php submit_button();?>

</form>