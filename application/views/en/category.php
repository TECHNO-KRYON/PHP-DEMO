<div class="category">
  <div class="color-overlay <?php echo $category->slug; ?>">
    
    <?php $count =  count($slider_category);?>
    <?php if($count >= 9){?>
       <div class="span6 pull-left" >
       <h3><?php echo $category->name; ?></h3>
    <ul class="pgwSlider">
      <?php for($i=0;$i<3;$i++){?>
      <li><a href="<?php echo base_url(); ?>en/games-category/<?php echo $slider_category[$i]->slug_cat;?>/<?php echo $slider_category[$i]->slug;?>"> <img style="height: 300px" alt="<?php echo $slider_category[$i]->name; ?>" title="<?php echo $slider_category[$i]->name; ?>" src="<?php echo base_url(); ?>data/<?php echo $slider_category[$i]->file_ftp; ?>/<?php echo $slider_category[$i]->file_ftp.$slider_category[$i]->extension; ?>"> <span><?php echo $slider_category[$i]->name?></span></a> </li>
      <?php }?>
    </ul></div>
    
     <div class="span6 pull-right" >
    <h3>Games you might like it:</h3>
    <?php for($i=3;$i<count($slider_category);$i++){?>
    <div class="span2 text-center" style="margin-left: 25px">
      <div class="thumbnail" ><a href="<?php echo base_url(); ?>en/games-category/<?php echo $slider_category[$i]->slug_cat;?>/<?php echo $slider_category[$i]->slug;?>"><img alt="<?php echo $slider_category[$i]->name; ?>" title="<?php echo $slider_category[$i]->name; ?>" style="height: 100px; width: 100px;" src="<?php echo base_url(); ?>data/<?php echo $slider_category[$i]->file_ftp; ?>/<?php echo $slider_category[$i]->file_ftp; ?><?php echo $slider_category[$i]->extension;?>"><span<?php if(strlen($slider_category[$i]->name) >= 15) {?> class="noline"<?php } ?>><?php echo $slider_category[$i]->name?></span> </a></div>
    </div>
    <?php }?>
    </div>
    <div class="clearfix"></div>
    <?php }?>
  </div>
</div>
<div id="all" class="tab-pane fade in active content">
  <div class="post-list row-fluid">
    <?php foreach($games as $g){?>
    <div class="span3 section pull-right no-margin text-center">
      <div class="thumbnail"><a href="<?php echo base_url(); ?>en/games-category/<?php echo $g->slug_cat;?>/<?php echo $g->slug;?>"><img style="height: 150px; width: 150px" src="<?php echo base_url(); ?>data/<?php echo $g->file_ftp; ?>/<?php echo $g->file_ftp; ?><?php echo $g->extension;?>" alt="<?php echo $g->name; ?>" title="<?php echo $g->name; ?>" /> <span<?php if(strlen($g->name) >= 15) {?> class="noline"<?php } ?>><?php echo $g->name?></span></a></div>
    </div>
    <?php }?>
  </div>
</div>
<div class="pagination center"> <?php echo $links; ?> </div>
