<?php if(!empty($blog)){?>
<div class="sidebar-section  spanclass">
  <div class="title"> <a href="http://www.arabminiclip.com/ar/blog/">Last news <i class="fa fa-newspaper-o"></i> </a></div>
</div>
<?php 
foreach($blog as $k=>$b)
{
	$page = round(($k+1)/$per_page);
?>

<div class="section page_blog page_<?php echo $page;?> <?php if($page > 1){?> hidden<?php }?>">
  <div class="img1 img-thumbnail pull-left"><img src="<?php echo base_url();?>images/blog/thumbs/<?php echo $b->image;?>" alt="<?php echo $b->title;?>"></div>

  <h3><a href="<?php echo base_url();?>en/blog/<?php echo $b->alias;?>"><?php echo $b->title;?></a></h3>
  <p><?php echo $b->intro;?></p>

  <a href="<?php echo base_url();?>en/blog/<?php echo $b->alias;?>" class="btn btn-primary pull-right">Read more</a>
   
  <div class="clearfix"></div>
</div>
<?php }?>
<div class="pagination center">
	<ul id="pagination"></ul>
</div>
<?php }?>
