<div class="uk-container uk-container-small uk-margin-xlarge-top uk-padding-large uk-text-center">

  <div class="uk-card uk-card-default uk-card-body">
    <h1><?php echo lang('login_heading');?></h1>
    <p><?php echo lang('login_subheading');?></p>

    <div id="infoMessage"><?php echo $message;?></div>

    <?php echo form_open("auth/login");?>

    <div class="uk-margin">
        <div class="uk-inline">
          <span class="uk-form-icon" uk-icon="icon: user"></span>
    <?php echo form_input($identity);?>
        </div>
    </div>

    <div class="uk-margin">
        <div class="uk-inline">
          <span class="uk-form-icon" uk-icon="icon: lock"></span>
        <?php echo form_input($password);?>
        </div>
    </div>

    <div class="uk-margin">
      <input type="checkbox" name="remember" value="1"  id="remember" class="uk-checkbox" />
      <label for="remember">Remember Me</label>
    </div>


    <p><input type="submit" name="submit" value="Login" class="uk-button uk-button-secondary" />
    <a class="uk-button uk-button-default">Register</a></p>

    <?php echo form_close();?>

    <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
  </div>
</div>