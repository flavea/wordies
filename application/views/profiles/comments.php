
 <div class="uk-container uk-container-small">
	<h2 class="category-title"><span>Comments</span></h2>

	<?php if(count($comments) == 0) echo "</p>This author hasn't made any comments"; ?>
	
	<?php for($i = 0; $i < count($comments); $i++) { ?>
	<article class="uk-comment uk-margin-small">
			<header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
			<?php if(isset($comments[$i]->profile_image) && $comments[$i]->profile_image != null) {  ?>
	        <div class="uk-width-auto">
	            <img class="uk-comment-avatar" src="<?php echo $comments[$i]->profile_image ?>" width="80" height="80" alt="">
	        </div>
			<?php } ?>
	        <div class="uk-width-expand">
				<?php if($comments[$i]->user_id !=0) { ?>
	            <h4 class="uk-comment-title uk-margin-remove"><a href="<?=base_url('author/'.$comments[$i]->user_id);?>" class="uk-link-reset"><?php echo $comments[$i]->username; ?></a></h4>
				<?php } else { ?>
	            <h4 class="uk-comment-title uk-margin-remove">Guest</h4>
					<?php } ?>
	            <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
	                <li><?php $date = new DateTime($comments[$i]->created); echo date_format($date, 'M dS Y'); ?></li>
	                <li>
			<?php if($comment[$i]->parent_id == 0) { ?>
			<?php echo $comments[$i]->chapter_title; ?> - <a href="<?php base_url('story/'.$comments[$i]->story_id) ?>"><?php echo $comments[$i]->story_title; ?></a>
			<?php } else { ?>
				in reply to <a href="<?= base_url('comment/'.$comments[$i]->parent_id); ?>">#<?php echo $comments[$i]->parent_id; ?></a>
			<?php } ?></li>
	                <li><a href="<?=base_url('comment/'.$comments[$i]->id);?>">Reply</a></li>
	            </ul>
	        </div>
	    </header>

    	<div class="uk-comment-body">
		<p><?php echo $comments[$i]->comment; ?></p>
		</div>
	</article>
	<hr>
	<?php } ?>
</div>

