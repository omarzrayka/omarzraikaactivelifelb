<?php get_header();?>

    <div  class="content-area">
	
       <main id="main" class="site-main" role="main">
            <div class="container info-post-container">
			   
			   <?php if(have_posts()):
			  
			           while(have_posts()): the_post();
			   
			   get_template_part('template-parts/content-page', 'page');
			  		   
					   endwhile;
			         
					 endif;
			   ?>
			</div>
	   </main>
	
	</div>
<?php get_footer();?>