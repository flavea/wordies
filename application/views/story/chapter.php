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

	<div class="uk-light uk-background-secondary uk-padding uk-margin-large">
		<b>Author:</b> Author<br>
		<b>Last Edited:</b> on August by Ilma<br>
		<b>Word Count:</b> 5000 words
	</div>
</div>

<div id="comments" class="uk-container uk-container-small uk-margin-large">
	<label class="uk-text-bold">Leave a Comment</label>
	<div class="uk-margin uk-clearfix">
		<textarea class="uk-textarea" rows="5" placeholder="Textarea"></textarea>
		<input type="submit" class="uk-button uk-button-secondary uk-margin uk-float-right" value="Leave Comment">
	</div>
	<hr class="uk-margin-large">


	<?php for($i = 0; $i < 10; $i++) { ?>
	<div class="uk-margin-large">

		<img class="uk-align-left uk-border-circle" src="https://placehold.it/100" alt="">
		<small class="label"><i>flavea commented on lorem ipsun on aug 25, 2017</i></small>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Orci a scelerisque purus semper eget duis. Lorem donec massa sapien faucibus et. Non tellus orci ac auctor augue mauris. Suspendisse faucibus interdum posuere lorem ipsum dolor sit.</p>
		<div class="uk-text-right">
			<a href="/" class="uk-button uk-button-default"><span uk-icon="icon: ban;ratio:.8" class="uk-margin-small-right"></span> Report</a>
			<a href="/" class="uk-button uk-button-default"><span uk-icon="icon: reply;ratio:.8" class="uk-margin-small-right"></span> Reply</a>
		</div>
	</div>
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
	<a href="/" uk-icon="icon:chevron-left" title="Previous Chapter" uk-tooltip class="uk-button toggle-menu"></a> 
	<a href="/" uk-icon="icon:chevron-right" title="Next Chapter" uk-tooltip class="uk-button toggle-menu"></a>
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