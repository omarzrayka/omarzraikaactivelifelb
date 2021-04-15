<?php 

/*

@package infotheme  
--standard post format
  
*/
?>

<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
  <header class="entry-header">
  </header>
  <div class="entry-content" >
  <?php  woocommerce_content();?>
  
  </div>
     
   <footer class="entry-footer">
   <?php //echo info_posted_footer(); ?>
  </footer>
</article>
