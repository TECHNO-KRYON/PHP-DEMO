<div class="container">
	<div id="wrapper">
		<div class="padding">
			<div class="row-fluid">
				<div class="span12">
					<div class="sidebar-section">
						<div class="title">Currently playing games <i class="fa fa-gamepad"></i></div>
					</div>
					<div id="search_bar">
						<form method="get" class="form-search" action="<?php echo base_url(); ?>en/search/">
						  
						  <input type="text" name="game" class="input-xlarge search-query" value="<?php echo $game; ?>">		
						  <button type="submit" class="btn btn-search">Search</button>				  
						</form>
					</div>
					<div id="all" class="tab-pane fade in active content">
						<div class="post-list row-fluid">
							<?php foreach($games as $g){?>
							<div class="span2 section pull-right no-margin text-center">
								<div class="thumbnail"><a href="<?php echo base_url(); ?>en/games-category/<?php echo $g->slug_cat;?>/<?php echo $g->slug;?>"><img src="<?php echo base_url(); ?>data/<?php echo $g->file_ftp; ?>/<?php echo $g->file_ftp; ?>_150*150<?php echo $g->extension; ?>" alt="<?php echo $g->name; ?>" title="<?php echo $g->name; ?>" /><span<?php if(strlen(urlencode($g->name)) > 100) {?> class="noline"<?php } ?>><?php echo $g->name;?></span></a></div>
							</div>
							<?php }?>
						</div>
					</div>
					<div class="pagination center">
						<?php echo $links; ?>
					</div>
				</div> 
			</div>
		</div>
	</div>
</div>