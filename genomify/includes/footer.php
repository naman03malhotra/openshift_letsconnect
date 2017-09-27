<section class="footer" id="contact">
  <div class="thumbnail" >
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 text-center">
        <h2 class="section-heading" style="
    color: white;
    background-color: rgb(0, 190, 242);border-radius: 4px;
">Let's Get In Touch!</h2>
        <hr class="primary">

        <form class="form-group">
          <div class="row">
            <div class="col-md-6"> 


              <input type="text" class="form-control"  value="<?php  if($_SESSION['u_id']){ echo $rowu['name']; }?>" placeholder="Your Name">

            </div>

            <div class="col-md-6">
              <input type="email" class="form-control" value="<?php  if($_SESSION['u_id']){ echo $rowu['emailid']; }?>" placeholder="Your Email">
            </div>
          </div><br>

          <div class="row">

            <div class="col-md-12">
             <input type="text" class="form-control" placeholder="Subject">
           </div>
         </div><br>

         <div class="row">

            <div class="col-md-12">
             <textarea type="text" rows="5" class="form-control" placeholder="Message"></textarea>
           </div>
         </div><br>

         <button type="submit" class="btn btn-info" name="msg" style="">Send Message</button>

       </form>


       <div class="col-lg-4 col-lg-offset-2 text-center">
        <i class="fa fa-phone fa-3x wow bounceIn"></i>
        <p>123-456-6789</p>
      </div>
      <div class="col-lg-4 text-center">
        <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
        <p><a href="mailto:your-email@your-domain.com">x@ecounsellors.in</a></p>
      </div>
    </div>

    <div>

    </div>



  </div>
</section>



