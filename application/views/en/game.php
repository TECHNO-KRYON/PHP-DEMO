<div class="center">
  <?php if($game->src_type == "code"){ ?>
  <?php echo $game->code;?>
  <?php }else{ 
  
  if(file_exists(realpath("./")."/data/".$game->file_ftp."/".$game->file_ftp.".swf")){
?>
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" allowFullScreen="true" width="100%" height="600px">
    <param name="movie" value="<?php echo base_url(); ?>data/<?php echo $game->file_ftp; ?>/<?php echo $game->file_ftp; ?>.swf" />
    <param name="quality" value="high" />
    <PARAM NAME="SCALE" VALUE="default">
    <param name="allowFullScreen" value="true" />
    <embed src="<?php echo base_url(); ?>data/<?php echo $game->file_ftp; ?>/<?php echo $game->file_ftp; ?>.swf" quality="high" allowFullScreen="true" type="application/x-shockwave-flash" data="flashFullscreen.swf" width="100%" height="600px" SCALE="default" pluginspage="http://www.macromedia.com/go/getflashplayer" />
    </embed>
  </object>
  <?php }}?>
</div>
<hr>
<div class="row-fluid">
  <div class="span9" style="padding-left: 5px;">
    <div class="game-title"> <span>Name of the :</span>
      <h1>
        <?=$game->name?>
      </h1>
      <br>
      <span>Description :</span>
      <p>
        <?=$game->description?>
      </p>
    </div>
  </div>
  <div class="span2  pull-right">
    <div class="rate pull-left text-left" style="direction:ltr;">
    <div class="stars">
      <?php for($i=0;$i<5;$i++){

             	if($game->note >= ($i +1)){	

         ?>
      <i class="fa fa-star"></i>
      <?php }else{?>
      <i class="fa fa-star-o"></i>
      <?php }?>
      <?php }?>
    </div>
    <span class="label label-success">
    <?=$game->category_name?>
    </span> </div>
</div>
</div>
<div class="clearfix"></div>

