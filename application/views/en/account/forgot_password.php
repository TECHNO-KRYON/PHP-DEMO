<h1 style="color: #135e08;font-size: 23px;">Forgot password ?</h1>
<p style="padding: 10px 0px;">Please enter your email address so we can send you an email and you can reset your password reset.</p>
<div id="infoMessage"><?php echo $message;?></div>
<?php 
	if($this->session->flashdata('success')) { 
		echo '<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>'.$this->session->flashdata('success').'</div>';
	}
?>
<form action="<?php echo base_url();?>en/account/forgot_password" class="form-horizontal" method="post" accept-charset="utf-8">
  <div class="control-group">
    <label class="control-label" for="email">Email :</label>
    <div class="controls">
      <input type="text" class="span8" id="email" name="email" placeholder="Email" value="<?php echo set_value('email');?>">
      <?php echo form_error('email', '<span class="help-block text-danger">', '</span>'); ?> </div>
  </div>
  <div class="form-actions">
    <button type="submit" class="btn btn-primary"> Send</button>
  </div>
</form>
<?php echo $this->template->widget('games_played_now'); ?>