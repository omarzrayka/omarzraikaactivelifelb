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
  <!--div id="myCarousel" class="carousel slide" data-ride="carousel"-->
  <!-- Indicators -->
  <!--ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol--->

  <!-- Wrapper for slides -->
  <!---div class="carousel-inner">
    <div class="item active">
    <img src="<?php  the_post_thumbnail_url('post-image');?>" class="img-fluid mb-5">
    </div>

    <div class="item">
    <img src="<?php  the_post_thumbnail_url('post-image');?>" class="img-fluid mb-5">
    </div>

    <div class="item">
    <img src="<?php  the_post_thumbnail_url('post-image');?>" class="img-fluid mb-5">
	    </div>
  </div---->

  <!-- Left and right controls -->
  <!---a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div--->
  <?php  woocommerce_content();?>
  
  </div>
     
   <footer class="entry-footer">
   <?php //echo info_posted_footer(); ?>
  </footer>
</article>
