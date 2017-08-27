
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