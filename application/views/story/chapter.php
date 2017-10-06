<script>
</script>

<progress value="0" id="progressBar">
	<div class="progress-container">
		<span class="progress-bar"></span>
	</div>
</progress>
<div id="chapter" class="uk-container uk-container-small uk-margin-xlarge-top uk-margin-xlarge-bottom">
	<h1 style="font-size: 350%"><?php echo $chapter->title ?></h1>

	<center><div class="uk-divider-small uk-margin-large uk-margin-large-top"></div></center>


	<?php for($i = 0; $i < count($sections); $i++) {
		echo $sections[0]->content;
		if($i != count($sections)-1) echo "<div class='uk-divider-small' style='margin: 1em auto'></div>";
	}
	?>

	<div id="meta" class="uk-light uk-background-secondary uk-padding uk-margin-large">
		<b>Author:</b> <?php echo $username; ?><br>
		<b>Last Updated:</b> <?php $date = new DateTime($chapter->updated); echo date_format($date, 'M dS Y'); ?><br>
		<b>Word Count:</b> <?php echo $words_count[0]->words_count; ?> words
	</div>
</div>

<div id="comments" class="uk-container uk-container-small uk-margin-large">
	<label class="uk-text-bold">Leave a Comment</label>
	<div class="uk-margin uk-clearfix">
		<textarea class="uk-textarea" rows="5" placeholder="Textarea" id="comment"></textarea>
		<input type="hidden" value="<?php echo $chapter->id ?>" id="chid">
		<input type="submit" id="btnComment" class="uk-button uk-button-secondary uk-margin uk-float-right" value="Leave Comment">
	</div>
	<hr class="uk-margin-large">


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
	            <h4 class="uk-comment-title uk-margin-remove"><a href="<?=base_url('profile/'.$comments[$i]->user_id);?>" class="uk-link-reset"><?php echo $comments[$i]->username; ?></a></h4>
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

<div class="uk-inline uk-text-center uk-position-bottom-left uk-padding uk-visible@m" style="position: fixed!important;">
	<?php if($chid > 1) { ?>
	<a href="<?= base_url('stories/story/'.$story_id.'/'.($chid - 1)) ?>" uk-icon="icon:chevron-left" title="Previous Chapter" uk-tooltip class="uk-position-left uk-flex uk-flex-middle uk-margin-small-left"></a> 
	<?php }
	if($chid < count($chapters)) { ?>
	<a href="<?= base_url('stories/story/'.$story_id.'/'.($chid + 1)) ?>" uk-icon="icon:chevron-right" title="Next Chapter" uk-tooltip class="uk-position-right uk-flex uk-flex-middle uk-margin-small-right"></a>
	<?php } ?>
	<h1 class="uk-margin-remove"><?php echo $chid ?>/<?php echo count($chapters) ?></h1>

	<a class="uk-text-uppercase uk-text-small" uk-toggle="target: #offcanvas-reveal">Chapter List</a>
</div>


<div class="uk-inline uk-text-center uk-position-bottom-right uk-visible@m" style="position: fixed!important;">
	<a class="uk-button" href="#comments" uk-scroll>Skip to Comments</a>
</div>

<div class="uk-inline uk-position-bottom-right uk-hidden@m" style="background: #fff;width:100%;position: fixed!important;">
	<hr class="uk-margin-remove">
	<?php if($chid > 1) { ?>
	<a href="<?= base_url('stories/story/'.$story_id.'/'.($chid - 1)) ?>" uk-icon="icon:chevron-left" title="Previous Chapter" uk-tooltip class="uk-button toggle-menu"></a> 
	<?php }
	if($chid < count($chapters)) { ?>
	<a href="<?= base_url('stories/story/'.$story_id.'/'.($chid + 1)) ?>" uk-icon="icon:chevron-right" title="Next Chapter" uk-tooltip class="uk-button toggle-menu"></a>
	<?php } ?>
	<a uk-toggle="target: #offcanvas-reveal" class="uk-button"><span uk-icon="icon: table;ratio:.75" class="uk-margin-small-right uk-display-inline-block"></span> Chapter <?php echo $chid ?></a> 

</div>
<div class="uk-offcanvas-content">

	<div id="offcanvas-reveal" class="uk-overflow-auto" uk-offcanvas="mode: reveal; overlay: true">
		<div class="uk-offcanvas-bar">

			<button class="uk-offcanvas-close" type="button" uk-close></button>

			<h3><?php echo $story[0]->title ?></h3>

			<ul class="uk-nav uk-nav-default">

				<?php if(isset($chapters) && $chapters != null) {
					for($i = 0; $i < count($chapters); $i++) { ?>
					<li><a href="<?= base_url('stories/story/'.$story[0]->id.'/'.($i+1)) ?>">
						<?php if ($i < 10) echo "0".($i+1).".";
						else echo ($i+1)."."; ?> 
						<?php echo $chapters[$i]->title ?>
						</a>
					</li>
					<li class="uk-nav-divider"></li>
				<?php
				}
				}
				?>
			</ul>

		</div>
	</div>
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
					"chapter": chid
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