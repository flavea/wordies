
<div class="uk-container uk-container-small uk-margin-xlarge">

<h2 class="uk-heading-divider"><span>Messages</span></h2>
	<?php if(count($messages) == 0) { echo "<center>There is no messages yet.</center>"; }?>
	<?php for($i = 0; $i < count($messages); $i++) { ?>
	<article class="uk-comment">
			<header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
			<?php if(isset($messages[$i]->profile_image) && $messages[$i]->profile_image != null) {  ?>
	        <div class="uk-width-auto">
	            <img class="uk-comment-avatar" src="<?php echo $messages[$i]->profile_image ?>" width="80" height="80" alt="">
	        </div>
			<?php } ?>
	        <div class="uk-width-expand">
	            <h4 class="uk-comment-title uk-margin-remove">
				<a href="<?= base_url('message/'.$messages[$i]->id); ?>" class="uk-link-reset"><?php echo $messages[$i]->title; ?></a></h4>
	            <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
	            	<li><a href="<?=base_url('profile/'.$messages[$i]->user_id);?>"><?php echo $messages[$i]->username; ?></a></li>
	                <li><?php $date = new DateTime($messages[$i]->latest_reply); echo date_format($date, 'M dS Y'); ?></li>
	            </ul>
	        </div>
	    </header>
    	<div class="uk-comment-body">
		</div>
	</article>
	<hr>
	<?php } ?>
</div>