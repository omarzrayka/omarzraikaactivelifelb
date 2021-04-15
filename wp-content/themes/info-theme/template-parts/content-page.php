<?php 

/*

@package infotheme  
--page template
  
*/
?>
<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
  <header class="entry-header text-center">
      <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
	  <div class="entry-meta">
	  <?php info_post_meta(); ?>
	  </div>
	  
  </header>
  
  <div class="entry-content">
   <?php   the_content(); ?>
  </div>
  
   <footer class="entry-footer">content page
   <?php //echo info_posted_footer(); ?>
  </footer>
  
  
  
</article>