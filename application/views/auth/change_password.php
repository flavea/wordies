<div class="uk-container uk-container-small uk-margin-xlarge-top uk-padding-large">

  <div class="uk-card uk-card-default uk-card-body">
  <h1><?php echo lang('change_password_heading');?></h1>

<?php if($message != null) { ?>
    <div class="uk-alert-danger" uk-alert>
    <a class="uk-alert-close" uk-close></a>
      <?php echo $message;?>
      </div>
      <?php } ?>

<?php echo form_open("auth/change_password");?>

      <p>
            <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
            <?php echo form_input($old_password);?>
      </p>

      <p>
            <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
            <?php echo form_input($new_password);?>
      </p>

      <p>
            <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
            <?php echo form_input($new_password_confirm);?>
      </p>

      <?php echo form_input($user_id);?>
      <input type="submit" name="submit" value="Change Password" class="uk-button uk-button-secondary" />

<?php echo form_close();?>
</div>
</div>