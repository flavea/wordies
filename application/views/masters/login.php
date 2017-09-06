<div class="uk-container uk-container-small uk-margin-xlarge-top uk-padding-large uk-text-center">

	<div class="uk-card uk-card-default uk-card-body">
		<form>
			<h3 class="uk-card-title">Login</h3>

			
            <?php echo form_open("auth/login");?>

  <p>
    <label for="identity">Username</label>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>
  </p>

  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>


  <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

<?php echo form_close();?>
		</div>

	</form>
</div>