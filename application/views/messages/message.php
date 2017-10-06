
<div class="uk-container uk-container-small uk-margin-xlarge">
	<h2 class="uk-heading-divider"><?php echo $head[0]->title; ?></h2>
	<label class="uk-text-bold">Reply</label>
	<div class="uk-margin uk-clearfix">
		<?php echo form_open('messages/message') ?>
		<textarea class="uk-textarea" rows="5" placeholder="Textarea" name="message" required></textarea>
		<input type="hidden" value="<?php echo $id ?>" name="id">
		<input type="submit" id="btnComment" class="uk-button uk-button-secondary uk-margin uk-float-right" value="Reply">
		<?php echo form_close() ?>
	</div>
	<hr>
	<?php for($i = 0; $i < count($messages); $i++) { ?>
	<article class="uk-comment uk-margin-small">
			<header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
			<?php if(isset($messages[$i]->profile_image) && $messages[$i]->profile_image != null) {  ?>
	        <div class="uk-width-auto">
	            <img class="uk-comment-avatar" src="<?php echo $messages[$i]->profile_image ?>" width="80" height="80" alt="">
	        </div>
			<?php } ?>
	        <div class="uk-width-expand">
	            <h4 class="uk-comment-title uk-margin-remove"><a href="<?=base_url('profile/'.$messages[$i]->sender);?>" class="uk-link-reset"><?php echo $messages[$i]->username; ?></a></h4>
	            <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
	                <li><?php $date = new DateTime($messages[$i]->date); echo date_format($date, 'M dS Y'); ?></li>
	            </ul>
	        </div>
	    </header>
    	<div class="uk-comment-body">
		<p><?php echo $messages[$i]->reply; ?></a></p>
		</div>
	</article>
	<hr>
	<?php } ?>
</div>