
<div id="comments" class="uk-container uk-container-small uk-margin-large">
	<label class="uk-text-bold">Leave a Comment</label>
	<div class="uk-margin uk-clearfix">
		<textarea class="uk-textarea" rows="5" placeholder="Textarea" id="comment"></textarea>
		<input type="hidden" value="<?php echo $id ?>" id="chid">
		<input type="submit" id="btnComment" class="uk-button uk-button-secondary uk-margin uk-float-right" value="Leave Comment">
	</div>
	
	<hr class="uk-margin-large uk-margin-small">

	<?php for($i = 0; $i < count($comments2); $i++) { ?>
	<article class="uk-comment">
			<header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
			<?php if(isset($comments2[$i]->profile_image) && $comments2[$i]->profile_image != null) {  ?>
	        <div class="uk-width-auto">
	            <img class="uk-comment-avatar" src="<?php echo $comments2[$i]->profile_image ?>" width="80" height="80" alt="">
	        </div>
			<?php } ?>
	        <div class="uk-width-expand">
				<?php if($comments2[$i]->user_id !=0) { ?>
	            <h4 class="uk-comment-title uk-margin-remove"><a href="<?=base_url('author/'.$comments2[$i]->user_id);?>" class="uk-link-reset"><?php echo $comments2[$i]->username; ?></a></h4>
				<?php } else { ?>
	            <h4 class="uk-comment-title uk-margin-remove">Guest</h4>
					<?php } ?>
	            <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
	                <li><?php $date = new DateTime($comments2[$i]->created); echo date_format($date, 'M dS Y'); ?></li>
	                <li><a href="<?=base_url('comment/'.$comments2[$i]->id);?>">Reply</a></li>
	            </ul>
	        </div>
	    </header>

    	<div class="uk-comment-body">
		<p><?php echo $comments2[$i]->comment; ?></p>
		</div>
	</article>
	<hr>
	<?php } ?>
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

<script type="text/javascript">
	$( "#btnComment" ).click(function() {
		var comment = $("#comment").val();
		var chid = $("#chid").val();
		if(comment == "") alert ("You must write the comment before sending it.");
		else {
			$.ajax({
				type: "POST",
				data: {
					"comment": comment,
					"parent": chid
				},
				dataType: "json",
				async: false,
				url: getBaseURL() + "stories/comment",
				success: function(data) {
					location.reload();
				}
			});
		}
	});
</script>