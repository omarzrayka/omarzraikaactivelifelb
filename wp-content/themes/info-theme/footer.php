<?php 
/* this is the template for footer 

@package infotheme

*/

;?>
<footer class="site-footer" id="footer">

    <div class="bg-primary text-white pt-5 pb-5">
          <div class="container">
              <div class="row" >
            <div class="col-md-4">
            <?php dynamic_sidebar('footer_widget-col-one');?>
            </div>
            <div class="col-md-4">
            <?php dynamic_sidebar('footer_widget-col-two');?>
            </div>
            <div class="col-md-4 ms-auto">
             <?php dynamic_sidebar('footer_widget-col-three');?>
            </div>
                 </div>
          </div>
   </div>
    
   
          
    <div clas="container pt-2 pb-2">
    <div class="row d-flex align-items-center" >
    <div class="col-md-12">
    <p>&copy<?php bloginfo('name');?><?php echo date('Y');?> / created by <a href="">omarz</a></p>
    </div>
    </div>
    </div>
   <!--div class="row" >
	     <div class="col-xs-12" >
         <div class="row leg-room">
         <div class="container" >
    <div class="col-md-12 text-center" id="footer">
        <h1 class="text-uppercase">Best Store</h1>
        <p class="monospaced">
            &copy;2021 Best Store Company Inc. 
            <span class="text-uppercase">All Rights Reserved</span></p>
    </div>
    </div>
        </div>
        </div> 
 </div---><!-- end container -->
 </footer>
 

<?php wp_footer(); ?>

</html>