<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<?php echo $this->template->widget('header_widget')?>

<?php if($this->uri->segment(2) == "search"){ ?>
	<?php echo $this->template->content; //search View ?>
<?php }else{ ?>
<div class="container">
  <div id="wrapper">
    <div class="padding padding1" style="">
      <div class="row-fluid">
        <div class="span12"> <?php echo $this->template->content;?>
          <?php if($this->template->menu == 'home') {?>
                  <div class="span6 sidebar-margin">
          <div id="sidebar" class="sidebar-alignment">
          

            <?php /*?>
        <div class="sidebar-section"> <a href="#"><img src="http://placehold.it/300x250&text=300x250" alt="" /></a> </div>
      <?php */
       if($this->template->menu != "404") {?>

            <div class="sidebar-section">
              <div class="title class"> Follow us on Facebook <i class="awe-thumbs-up"></i> 
              
            </div>

              <div class="facebook-like-box">
               <center> <iframe  class="iframe" src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Farabminiclip&amp;width&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:298px; height:258px;" allowTransparency="true"></iframe></center>
              </div>
            </div>
            <?php }?>
            <div id="search" class="pull-right searchclass">
                <form method="get" action="<?php echo base_url(); ?>en/search/">
                    <input name="game" type="text"><button type="submit" class="btn btn-search">Search</button>
                </form>
            </div>
          </div>
        </div>
         <div class="span6 sidebar-margin"> 
             </div>

          <?php }?>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  <div id="wrapper">
    <div class="padding">
      <ins class="adsbygoogle"
               style="display:block"
               data-ad-client="ca-pub-7880803955280553"
               data-ad-slot="6644094793"
               data-ad-format="auto"></ins>
          <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
    </div>
  </div>
</div>
<?php }?>
<?php echo $this->template->widget('footer_widget'); ?> 