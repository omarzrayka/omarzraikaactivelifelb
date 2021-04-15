<?php 

/*

@package infotheme  
--standard post format
  
*/
?>
<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
  <header class="entry-header">
      <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
	  <div class="entry-meta">
	  <?php info_post_meta(); ?>
	  </div>
	  
  </header>
  <div class="entry-content">
  
    <?php  if(has_post_thumbnail()): ?>
  <div class="standard-feature"><?php the_post_thumbnail(); ?></div>
  <?php  endif;?>
  
  <div class="entry-excerpt">
  <?php  the_excerpt();?>
  
  </div>
   
   <footer class="entry-footer">
   <?php //echo info_posted_footer(); ?>
  </footer>
</article>
