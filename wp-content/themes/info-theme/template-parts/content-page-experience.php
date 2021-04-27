<?php 

/*

@package infotheme  
--page template
  
*/
?>
<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
  

    <div class="entry-content">
	<b id="title">  <?php the_title(); ?></b>

    <?php  the_content(); ?>
    <span id="year" ><?php if(get_post_meta($post->ID, '_experience_year_value_key', true)!="") echo get_post_meta($post->ID, '_experience_year_value_key', true); ?> </span>

  </div>
  
   <footer class="entry-footer">
   	  
  </footer>
  
  
  
</article>