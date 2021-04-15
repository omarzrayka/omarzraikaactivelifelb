<?php get_header(); ?>

    <div  class="content-area">
	
       <main id="main" class="site-main" role="main">
            <div class="container info-post-container">

              <?php if(have_posts()):
			  
			   get_template_part('template-parts/content-page-woocommerce', 'page');
			  		     
					 endif;
			   ?>
            </div>
       </main>
    </div>
<?php get_footer(); ?>
