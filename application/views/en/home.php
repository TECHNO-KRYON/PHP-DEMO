 <div class="sidebar-section">

	<div class="title"> Currently playing games <i class="fa fa-gamepad"></i></div>

</div> 

 <div id="all" class="tab-pane fade in active content">

	<div class="post-list row-fluid">

		<?php foreach($games as $g){?>

		<div class="span3 section pull-right no-margin text-center">

			<div class="thumbnail"><a href="<?php echo base_url(); ?>en/games-category/<?php echo $g->slug_cat;?>/<?php echo $g->slug;?>"><img style="height: 150px; width: 150px;" src="<?php echo base_url(); ?>data/<?php echo $g->file_ftp; ?>/<?php echo $g->file_ftp; ?><?php echo $g->extension; ?>" alt="<?php echo $g->name; ?>" title="<?php echo $g->name; ?>" /><span<?php if(strlen($g->name) >= 15) {?> class="noline"<?php } ?>><?php echo $g->name?></span></a></div>

		</div>

		<?php }?>

	</div>

</div> 

 <div class="pagination center">

	<?php echo $links; ?>

</div>