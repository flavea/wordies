

<div id="story" class="uk-child-width-1-1@s uk-child-width-1-2@m" uk-grid>

	<div class="uk-inline uk-width-1-1@s uk-hidden@m">
		<img src="<?php echo $story[0]->cover; ?>" width="100%">
	</div>


	<div class="uk-inline uk-width-2-3@m">
		<div class="uk-padding-large">
			<div class="uk-padding-small">


				<div class="uk-position-right uk-flex uk-flex-middle">
					<div class="uk-flex uk-flex-column uk-width-1-4">
						<a class="uk-icon-button" uk-icon="icon: plus; ratio: .7" title="Follow This Story" uk-tooltip></a>
						<a class="uk-icon-button uk-margin-small-top" uk-icon="icon: heart; ratio: .7" title="Love This Story" uk-tooltip></a>
						<a class="uk-icon-button uk-margin-small-top" uk-icon="icon: mail; ratio: .7" title="Report This Story" uk-tooltip></a>
					</div>
				</div>

				<small class="label"><i>A Historical Fiction by flavea</i></small>
				<div id="story-title"><h1><?php echo $story[0]->title; ?></h1></div>
				<div class="info"><b>Updated:</b> Aug 25, 2017</div>
				<div class="info"><b>Rating:</b> T+</div>
				<div class="info"><b>Word Count:</b> 2000</div>
				<div class="info"><b>Complete:</b> No</div>
				<div class="info"><b>Subscribers:</b> 0</div>
				<div class="info"><b>Votes:</b> 0</div>
				<p><?php echo $story[0]->desc; ?></p>


				<h2 class="category-title uk-margin-small-top"><span>Chapters</span></h2>
				<div id="chapters">
					<?php if(isset($chapters) && $chapters != null) {
						for($i = 0; $i < count($chapters); $i++) {
							?>
							<a class="uk-display-block uk-button uk-button-text uk-text-left" href="<?= base_url('stories/story/'.$story[0]->id.'/'.($i+1)) ?>">
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
		<img src="http://i.imgur.com/QVAgcLa.jpg" width="100%">
	</div>
</div>