<div class="uk-container uk-container-small uk-margin-xlarge-top uk-padding-large">

  <div class="uk-card uk-card-default uk-card-body">
  <h1><?php echo lang('create_user_heading');?></h1>
<p><?php echo lang('create_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_user");?>

      
      <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo '<label for="identity">Username</label>';
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</p>';
      }
      ?>

      <p>
            <?php echo lang('create_user_email_label', 'email');?> <br />
            <?php echo form_input($email);?>
      </p>

      <p>
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php echo form_input($password_confirm);?>
      </p>


      <input type="submit" name="submit" value="Register" class="uk-button uk-button-secondary" />

<?php echo form_close();?>
</div>
</div>