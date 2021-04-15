<?php 
/* this is the template for header 

@package infotheme

*/

;?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
 <head>
 <?php 
    $firstName = esc_attr( get_option('first_name') );
	$lastName = esc_attr( get_option('last_name') );
	$fullName = $firstName.' '.$lastName;
	$description = esc_attr( get_option('description') );
?>
 <title><?php bloginfo('name'); wp_title() ;?></title>
   <meta name="description" content="<?php bloginfo('description');?>" >
   <meta charset="<?php bloginfo('charset');?>" >
   <meta name="viewport" content="width-device-width" initial-scale="1" >

   <link rel="profile" href="http://gmpg.org/xfn/11">
   <?php if(is_singular() && pings_open(get_queried_object())): ?>

   <link rel="pingback" href="<?php bloginfo('pingback_url');?>" >
   <?php endif ; ?>
   <?php wp_head(); ?>
 </head>
   
<body <?php body_class(); ?>>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
		<header class="header-container text-center">
		    <div class="container">
              <div class="row" >
            <div class="col-md-4">
			<h1 class="site-title">
			     <span class="header-content"> CV</span>
			     </h1>
				 <h2 class="site-description"><?php print $fullName;?> </h2>
				 <h5 class="site-description"><?php print $description;?> </h5>
            </div>
	
            <div class="col-md-4">
           
            </div>
            <div class="col-md-4 cart text-center">
				<br>
			<span class="glyphicon glyphicon-shopping-cart"></span>
			<a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> – <?php echo WC()->cart->get_cart_total(); ?></a>

            </div>
                 </div>
          </div>
			 <!--div class="header-content table">
			      <div class="table-cell">
		         <h1 class="site-title">
			     <span class="header-content"> CV</span>
			     </h1>
				 <h2 class="site-description"><?php print $fullName;?> </h2>
				 <h5 class="site-description"><?php print $description;?> </h5>
				 
		          </div>
		    </div--->
<div class="navbar bg-primary center" role="navigation"  >
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="glyphicon glyphicon-list"></span>
                    
                </button>
            </div>
     
            <div class="navbar-collapse collapse " >
                <?php  /* menu */
                    wp_nav_menu( array(
                                'menu'              => 'primary',
                                'theme_location'    => 'primary',
                                'depth'             => 5,
                                'container'         => 'div',
                                'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse ',
                                'menu_class'        => 'nav navbar-nav  ',
                                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                'walker'            => new wp_bootstrap_navwalker()
								)
                    ); 
                 ?>
            </div>
        </div><!-- Navigation -->
 
 
			</header>
				 


