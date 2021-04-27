<?php 
/* this is the template for footer 

@package infotheme

*/

;?>
 <footer class="bg-primary text-lg-start">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
      
        <?php dynamic_sidebar('footer_widget-col-one');?>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
       
        <?php dynamic_sidebar('footer_widget-col-two');?>
      </div>
      <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
       
        <?php dynamic_sidebar('footer_widget-col-three');?>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
  <p>&copy<?php bloginfo('name');?><?php echo date('Y');?> / created by <a href="">omarz</a></p>
  </div>
  <!-- Copyright -->
</footer>

<?php wp_footer(); ?>

</html>
