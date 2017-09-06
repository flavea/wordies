<div class="uk-container uk-container-small uk-margin-xlarge-top uk-padding-large">

  <div class="uk-card uk-card-default uk-card-body">
<h1><?php echo lang('forgot_password_heading');?></h1>
<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <p>
      	<label for="identity">Username</label>
      	<?php echo form_input($identity);?>
      </p>

      
      <input type="submit" name="submit" value="Reset Password" class="uk-button uk-button-secondary" />

<?php echo form_close();?>
</div>
</div>