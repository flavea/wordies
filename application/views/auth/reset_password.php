<div class="uk-container uk-container-small uk-margin-xlarge-top uk-padding-large">

  <div class="uk-card uk-card-default uk-card-body">
<h1><?php echo lang('reset_password_heading');?></h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open('auth/reset_password/' . $code);?>

	<p>
		<label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
		<?php echo form_input($new_password);?>
	</p>

	<p>
		<?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
		<?php echo form_input($new_password_confirm);?>
	</p>

	<?php echo form_input($user_id);?>
	<?php echo form_hidden($csrf); ?>

      <input type="submit" name="submit" value="Reset Password" class="uk-button uk-button-secondary" />

<?php echo form_close();?>
</div>
</div>