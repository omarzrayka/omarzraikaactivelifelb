<?php get_header(); ?>

    <div  class="content-area">
	
       <main id="main" class="site-main" role="main">
            <div class="container info-post-container">
        <div class="row">
        <div class="col-xs-12 col-sm-4">
            <?php get_sidebar(); ?>
          </div>
        <div class="col-xs-12 col-sm-8">
              <?php if(have_posts()):
			  
			   get_template_part('template-parts/content-page-woocommerce', 'page');
			  		     
					 endif;
			   ?>
          </div>
         
          </div>
              </div>
           
       </main>
    </div>
<?php get_footer(); ?>
