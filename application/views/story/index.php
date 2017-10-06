

<div id="story" class="uk-child-width-1-1@s uk-child-width-1-2@m" uk-grid>

	<div class="uk-inline uk-width-1-1@s uk-hidden@m">
		<img src="<?php echo $story[0]->cover; ?>" width="100%">
	</div>
	<input type="hidden" id="id" value="<?php echo $story[0]->id; ?>">

	<div class="uk-inline uk-width-2-3@m">
		<div class="uk-padding-large">
			<div class="uk-padding-small">


				<div class="uk-position-right uk-flex uk-flex-middle">
					<div class="uk-flex uk-flex-column uk-width-1-4">
						<?php if($logged_in) { ?>
						<?php if($subscribed != 0) { ?>
						<a id="unsubscribe" style="color:red" class="uk-icon-button" uk-icon="icon: plus; ratio: .7" title="Unfollow This Story" uk-tooltip></a>
						<?php } else {?>
						<a id="subscribe" class="uk-icon-button" uk-icon="icon: plus; ratio: .7" title="Follow This Story" uk-tooltip></a>
						<?php } ?>
						<?php if($voted != 0) { ?>
						<a id="unlove" style="color:red" class="uk-icon-button uk-margin-small-top" uk-icon="icon: heart; ratio: .7" title="Unlove This Story" uk-tooltip></a>
						<?php } else {?>
						<a id="love" class="uk-icon-button uk-margin-small-top" uk-icon="icon: heart; ratio: .7" title="Love This Story" uk-tooltip></a>
						<?php } ?>
						<?php } ?>
						<a class="uk-icon-button uk-margin-small-top" uk-icon="icon: mail; ratio: .7" title="Report This Story" uk-tooltip></a>
					</div>
				</div>

				<small class="label"><i>A <?php echo $story[0]->genre_name.' '.$story[0]->category_name; ?> by <a href="<?=base_url('author/'.$story[0]->author_id);?>"><?php echo $username; ?></a></i></small>
				<div id="story-title"><h1><?php echo $story[0]->title; ?></h1></div>
				<div class="info"><b>Updated:</b> <?php $date = new DateTime($story[0]->updated); echo date_format($date, 'M dS Y'); ?></div>
				<div class="info"><b>Language:</b> <?php echo $story[0]->langname; ?></div>
				<div class="info"><b>Rating:</b> <?php echo $story[0]->rating_name; ?></div>
				<div class="info"><b>Word Count:</b> <?php echo $story[0]->word_count; ?></div>
				<div class="info"><b>Subscribers:</b> <?php echo $story[0]->subscribers; ?></div>
				<div class="info"><b>Votes:</b> <?php echo $story[0]->votes; ?></div>
				<div class="info"><b>Reads:</b> <?php echo $story[0]->view_count; ?></div>
				<div class="info"><b>Comments:</b> <?php echo $story[0]->comment_count; ?></div>
				<p><?php echo $story[0]->desc; ?></p>


				<h2 class="category-title uk-margin-small-top"><span>Chapters</span></h2>
				<div id="chapters">
					<?php if(isset($chapters) && $chapters != null) {
						for($i = 0; $i < count($chapters); $i++) {
							?>
							<a class="uk-display-block uk-button uk-button-text uk-text-left" href="<?= base_url('story/'.$story[0]->id.'/'.($i+1)) ?>">
								<h3 class="uk-text-uppercase">
									<span class="uk-margin-large-right">
										<?php if ($i < 10) echo "0".($i+1).".";
										else echo ($i+1)."."; ?>
									</span> 
									<?php echo $chapters[$i]->title ?>
								</h3>
							</a>
							<?php
						}
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="uk-width-1-3@m uk-visible@m">
		<img src="<?php echo $story[0]->cover; ?>" width="100%">
	</div>
</div>
<script type="text/javascript">
	$( "#subscribe" ).click(function() {
		$.ajax({
			type: "POST",
			data: {
				"story": $("#id").val()
			},
			dataType: "json",
			async: false,
			url: getBaseURL() + "stories/interact/1",
			success: function(data) {
				location.reload()
			}
		});
	});

	$( "#unsubscribe" ).click(function() {
		$.ajax({
			type: "POST",
			data: {
				"story": $("#id").val()
			},
			dataType: "json",
			async: false,
			url: getBaseURL() + "stories/interact/2",
			success: function(data) {
				location.reload()
			}
		});
	});

	$( "#love" ).click(function() {
		$.ajax({
			type: "POST",
			data: {
				"story": $("#id").val()
			},
			dataType: "json",
			async: false,
			url: getBaseURL() + "stories/interact/3",
			success: function(data) {
				location.reload()
			}
		});
	});

	$( "#unlove" ).click(function() {
		$.ajax({
			type: "POST",
			data: {
				"story": $("#id").val()
			},
			dataType: "json",
			async: false,
			url: getBaseURL() + "stories/interact/4",
			success: function(data) {
				location.reload()
			}
		});
	});
</script>