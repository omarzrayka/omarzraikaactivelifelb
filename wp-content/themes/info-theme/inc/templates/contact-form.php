
<form id="infoContactForm" action="#" method="post" data-url="<?php admin_url('admin-ajax.php') ;?>">
  
  <div class="form-group">
<input type="text" class="form-control" placeholder="Your Name" id="name" name="name" required="required">
  </div>
  
  <div class="form-group">
<input type="email" class="form-control"placeholder="Your Email" id="email" name="email" required="required">
  </div>
 
  <div class="form-group">
<textarea  class="form-control" name="message" id="message" placeholder="Your Message" required="required"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Send</button>
</form>
