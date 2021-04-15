<?php get_header();?>

    <div  class="content-area " >
	
       <main id="main" class="site-main" role="main">
            <div class="container info-post-container">
			     
				
			   <?php $arg = array('post_type'=>'experience','post_per_page'=>3);
			   $query = new wp_query($arg);
			   if($loop->have_posts()):
			  
			           while($loop->have_posts()): $loop->the_post();
			   
			   get_template_part('template-parts/content-page-experience', 'page');
			  		   
					   endwhile;
			         
					 endif;
			   ?>
			</div>
	   </main>
	
	</div>
<?php get_footer();?>