<h1><?php echo lang('edit_user_heading');?></h1>
<p><?php echo lang('edit_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(uri_string());?>

      <p>
            <label>Username</label>
            <?php echo form_input($identity);?>
      </p>
      <p>
            <label>Profile Picture</label>
            <?php echo form_input($profile);?>
      </p>
      <p>
            <label>Twitter Username</label>
            <?php echo form_input($twitter);?>
      </p>
      <p>
            <label>Facebook Username</label>
            <?php echo form_input($facebook);?>
      </p>
      <p>

            <?php echo lang('edit_user_password_label', 'password');?> <br />
            <?php echo form_input($identity);?>
      </p>

      <p>
            <?php echo lang('edit_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
            <?php echo form_input($password_confirm);?>
      </p>

      <?php if ($this->ion_auth->is_admin()): ?>

          <h3><?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group):?>
              <label class="checkbox">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
          <?php endforeach?>

      <?php endif ?>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

      <input type="submit" name="submit" value="Edit Profile" class="uk-button uk-button-secondary" />

<?php echo form_close();?>
