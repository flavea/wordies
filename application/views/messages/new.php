
<div class="uk-container uk-container-small uk-margin-xlarge">
	<label class="uk-text-bold">Leave a Comment</label>
	<div class="uk-margin uk-clearfix">
		
		<?php echo form_open('messages/new_message') ?>
		<label>Sending message to</label>
		<input type="hidden" name="id" value="<?php echo $users[0]->id ?>" placeholder="<?php echo $users[0]->username ?>" class="uk-input" readonly>
		<input type="text" name="username" value="<?php echo $users[0]->username ?>" placeholder="<?php echo $users[0]->username ?>" class="uk-input" disabled>
		<label class="uk-margin-small-top uk-display-block">Subject</label>
		<input type="text" name="title" class="uk-input">
		<label class="uk-margin-small-top uk-display-block">Message</label>
		<textarea class="uk-textarea" rows="5" placeholder="Textarea" name="message" required></textarea>
		<input type="submit" id="btnComment" class="uk-button uk-button-secondary uk-margin uk-float-right" value="Send Message">
		<?php echo form_close() ?>
	</div>
</div>
