<h1 style="color: #135e08;font-size: 23px;">Reset your password ?</h1>
<p style="padding: 10px 0px;">Please enter your new password.</p>
<div id="infoMessage"><?php echo $message;?></div>
<?php 
	if($this->session->flashdata('success')) { 
		echo '<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>'.$this->session->flashdata('success').'</div>';
	  }

  ?>
<?php 
$attributes = array('class' => 'form-horizontal');
echo form_open('en/account/reset_password/' . $code, $attributes);
?>
  <div class="control-group">
    <label class="control-label" for="new_password">New password </label>
    <div class="controls">
      <?php echo form_input($new_password);?>
      <?php echo form_error('new', '<span class="help-block text-danger">', '</span>'); ?> </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="new_password_confirm">Confirm your password </label>
    <div class="controls">
      <?php echo form_input($new_password_confirm);?>
      <?php echo form_error('new_confirm', '<span class="help-block text-danger">', '</span>'); ?> </div>
  </div>
  <?php echo form_input($user_id);?>
  <div class="form-actions">
    <button type="submit" class="btn btn-primary"> Send</button>
  </div>
<?php echo form_close();?>
<?php echo $this->template->widget('games_played_now'); ?>