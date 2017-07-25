<div id="footer">
  <div class="footer-navigation">
    <div class="container-fluid">
      <ul id="footer-nav">     
        <?php foreach($categories as $c){?>
        <li style="margin-left: 8px;"><a href="<?php echo base_url()."en"; ?>/games-category/<?php echo $c->slug; ?>/"><?php echo $c->name; ?></a></li>
        <?php }?>
        <li style="margin-left: 8px;"><a href="<?php echo base_url()."en"; ?>/blog">GAMES NEWS</a></li> 
        <li style="margin-left: 8px;"><a href="<?php echo base_url()."en"; ?>/gifts">GIFT SHOP</a></li>
        <li style="margin-left: 8px;"><a href="<?php echo base_url()."en"; ?>/carrier">CONTACT</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-widget">
    <div class="container">
      <div class="row">
        <div class="span3">
          <div class="title"> Last news </div>
          <?php if(!empty($blogs)){?>
          <ul>
            <?php foreach($blogs as $b){?>
            <li> <img style="width:40px;height:35px;" src="<?php echo base_url();?>images/blog/thumbs/<?php echo $b->image;?>" alt="<?php echo $b->title;?>">
              <div class="text"> <a href="<?php echo base_url();?>en/blog/<?php echo $b->alias;?>"><?php echo $b->title;?></a> <span class="clearfix date">&nbsp;</span> </div>
            </li>
            <?php }?>
          </ul>
          <?php }?>
        </div>
        <div class="span3">
          <div class="title">&nbsp;</div>
          <?php if(!empty($games)){?>
          <ul>
            <?php for($i=0;$i<3;$i++){?>
            <li> <img style="width:40px;height:35px;" src="<?php echo base_url(); ?>data/<?php echo $games[$i]->file_ftp; ?>/<?php echo $games[$i]->file_ftp; ?>_150*150<?php echo $games[$i]->extension; ?>" alt="<?php echo $games[$i]->name?>" />
              <div class="text"> <a href="<?php echo base_url(); ?>en/games-category/<?php echo $games[$i]->slug_cat;?>/<?php echo $games[$i]->slug;?>" class="poster"> <?php echo $games[$i]->name?></a> <a style="display: block;margin-top: 10px;" href="<?php echo base_url(); ?>en/games-category/<?php echo $games[$i]->slug_cat;?>/"><?php echo $games[$i]->category_name; ?></a> <span class="clearfix"></span> </div>
            </li>
            <?php }?>
          </ul>
          <?php }?>
        </div>
        <div class="span3">
          <div class="title"> Currently playing games </div>
          <?php if(!empty($games)){?>
          <ul>
            <?php for($i=3;$i<6;$i++){?>
            <li> <img style="width:40px;height:35px;" src="<?php echo base_url(); ?>data/<?php echo $games[$i]->file_ftp; ?>/<?php echo $games[$i]->file_ftp; ?>_150*150<?php echo $games[$i]->extension; ?>" alt="<?php echo $games[$i]->name?>" />
              <div class="text"> <a href="<?php echo base_url(); ?>en/games-category/<?php echo $games[$i]->slug_cat;?>/<?php echo $games[$i]->slug;?>" class="poster"> <?php echo $games[$i]->name?></a> <a style="display: block;margin-top: 10px;" href="<?php echo base_url(); ?>en/games-category/<?php echo $games[$i]->slug_cat;?>/"><?php echo $games[$i]->category_name; ?></a> <span class="clearfix"></span> </div>
            </li>
            <?php }?>
          </ul>
          <?php }?>
        </div>
        <div class="span3">
          <div class="title">About us</div>
          <ul>
            <li>
              <div class="text"> Arab miniclip is the  arabic number one flash games website . with a large collection of flash games from different categories for all arabic internet users . this website offer the possibility of rating games and contacting different players from all over the Arabic wolrd .</div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="copy"> &copy; Copyright Arab Mini Clip <?php echo date("Y"); ?> <a style="color: white;" class="pull-right" href="<?php echo base_url(); ?>en/privacy-policy">Privacy Policy</a></div>
    </div>
  </div>
</div>
</div>
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>js/selectnav.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.bxslider.min.js"></script> 
<script src="<?php echo base_url(); ?>js/pgwslider.min.js"></script> 
<script src="<?php echo base_url(); ?>js/owl.carousel.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.swfobject.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.twbsPagination.min.js"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>js/prettyPhoto.js"></script>
<script src="<?php echo base_url(); ?>js/custom.js?v=0.2"></script> 
<script src="<?php echo base_url(); ?>google_analytics_auto.js"></script> 
<?php echo $this->template->js;?>
<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script> 
<script type="text/javascript">



  window.fbAsyncInit = function() {



	 FB.init({ 



	   appId:'<?php echo $this->config->item('appID'); ?>',



	   cookie:true,



	   status:true,



	   xfbml:true,



	   oauth : true,



	   xfbml : true



	 });



   };



   (function(e){var t,n="facebook-jssdk",r=e.getElementsByTagName("script")[0];if(e.getElementById(n)){return}t=e.createElement("script");t.id=n;t.async=true;t.src="//connect.facebook.net/en_US/all.js";r.parentNode.insertBefore(t,r)})(document);$("#facebook").click(function(e){FB.login(function(e){if(e.authResponse){parent.location="<?php echo base_url(); ?>/facebook/"}},{scope:"email,read_stream,publish_stream,user_birthday,user_location,user_work_history,user_hometown,user_photos"})})



</script> 

<!-- Start Alexa Certify Javascript --> 

<script type="text/javascript">

_atrk_opts = { atrk_acct:"dZZbh1acOh0025", domain:"arabminiclip.com",dynamic: true};

(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();

</script>
<noscript>
<img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=dZZbh1acOh0025" style="display:none" height="1" width="1" alt="" />
</noscript>

<!-- End Alexa Certify Javascript -->

</body></html>