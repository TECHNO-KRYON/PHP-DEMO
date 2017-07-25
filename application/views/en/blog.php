<div class="sidebar-section">
  <div class="title"><a href="<?php echo base_url()?>en/"> Last news <i class="fa fa-newspaper-o"></i> </a></div>
</div>
<div class="section">
  <div class="pull-left">
    <h3><a href="#"><?php echo $blog->title; ?></a></h3>
  </div>
  <div class="clearfix"></div>
  <div class="img2 thumbnail"><img src="<?php echo base_url();?>images/blog/<?php echo $blog->image; ?>" alt="<?php echo $blog->title; ?>" title="<?php echo $blog->title; ?>"></div>
  <div class="description"> <?php echo $blog->text; ?> </div>
  <?php echo $blog->video; ?>
  <div class="clearfix"></div>
  <div class="center">
    <?php if(!empty($previous_blog)){?>
    	<a href="<?php echo base_url();?>en/blog/<?php echo $previous_blog->alias; ?>" class="btn btn-primary btn-small"><i class="icon-white icon-arrow-left"></i> Previous </a>
    <?php }?>
    <?php if(!empty($next_blog)){?>
    	<a href="<?php echo base_url();?>en/blog/<?php echo $next_blog->alias; ?>" class="btn btn-primary btn-small"> Next <i class="icon-white icon-arrow-right"></i></a>
    <?php }?>
  </div>
</div>
