
<div id="feedback">
    <div id="feedback-form" style='display:none;' class="col-xs-4 col-md-4 panel panel-default">
            <button type="button" class="close closex " data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="">&times;</span></button>

     <h3>Tell us what you think.</h3>

<p>Love us / have suggestions / ideas / feature requests? Tell us how we can improve our website.</p>
<div id="feed-cont">
        <div class="form-group">
        <input class="form-control" id="feed_email" name="email" value="<?php  if($_SESSION['u_id']){ echo $rowu['emailid']; }?>" style="<?php  if($_SESSION['u_id']) {echo 'display:none;';} ?>" placeholder="E-mail" type="email" />
        </div>

        <select id="feed_option" class="form-control">
       <option value="" style="display:none">Please select a category</option>

        
        <?php echo '<option value="Improve '.$_SERVER['REQUEST_URI'].'">Improve This Page</option>'; ?>
        <option>Suggest New Features/Ideas</option>
         <option>Counselling Experience</option>
         <option>I love Ecounsellors</option>
         <option>Others/ General Feedback</option>
        <!-- <option>Ecounsellors referral system</option>-->
          
          
        </select>
        <br>


        <div class="form-group">
          <textarea class="form-control" name="body" id="feed_exp" required placeholder="Please tell us, how we can improve..." rows="5"></textarea>
        </div>
        <button class="btn btn-info pull-right" id="feed_send">Send</button>
      
    </div>
  </div><!-- feed cont-->  
    <div id="feedback-tab"><span class="fa fa-heart animated rubberBand infinite"></span>Feedback</div>


     <div id="loadbar_feed" style="display: none;">
          <div class="blockG" id="rotateG_01"></div>
          <div class="blockG" id="rotateG_02"></div>
          <div class="blockG" id="rotateG_03"></div>
          <div class="blockG" id="rotateG_04"></div>
          <div class="blockG" id="rotateG_05"></div>
          <div class="blockG" id="rotateG_06"></div>
          <div class="blockG" id="rotateG_07"></div>
          <div class="blockG" id="rotateG_08"></div>
        </div>


  </div><!-- Feed Form-->
<!--
  <div id="bug">
    <div id="bug-form" style='display:none;' class="col-xs-4 col-md-4 panel panel-default">
            <button type="button" class="close closex-bug " data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="">&times;</span></button>

    
      <h3>Report Bug!</h3>
    <h6>Thank you for your interest in Ecounsellors.in One of the best ways you can help us improve our website is to let us know about any problems you find with it.</h6>
    <div id="bug-cont">
       <p></p> 
       <div id="bug_div">
        <button class="fpbtn btn-block" id="upload_bug">Upload Screenshot</button>
     </div><br> <div class="form-group">
    
        <input class="form-control" id="bug_email" name="email" value="<?php  if($_SESSION['u_id']){ echo $rowu['emailid']; }?>" style="<?php  if($_SESSION['u_id']) {echo 'display:none;';} ?>" placeholder="E-mail" type="email" />
        
     
        </div>
        <div class="form-group">
          <textarea class="form-control" id="bug_exp" name="body" required placeholder="Please explain the problem you are facing." rows="4"></textarea>
        </div>
        <button class="btn btn-info pull-right" id="bug_send" type="submit">Send</button>
  </div>
     <div id="loadbar_feed" style="display: none;">
          <div class="blockG" id="rotateG_01"></div>
          <div class="blockG" id="rotateG_02"></div>
          <div class="blockG" id="rotateG_03"></div>
          <div class="blockG" id="rotateG_04"></div>
          <div class="blockG" id="rotateG_05"></div>
          <div class="blockG" id="rotateG_06"></div>
          <div class="blockG" id="rotateG_07"></div>
          <div class="blockG" id="rotateG_08"></div>
        </div>
    </div>
      
    <div id="bug-tab"><span class="fa fa-bug animated rubberBand infinite"></span>  Report Bug</div>
  </div>-->