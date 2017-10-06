
 <div class="uk-container uk-container-small">
 		<h2 class="category-title"><span><?php echo $heading?></span></h2>
		<div class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-3@m uk-text-center" uk-grid uk-height-match="target: > div > .uk-card">

		<?php if(count($users) == 0) echo "<p>Oops, no one is here yet."; ?>
		<?php for($i = 0; $i < count($users); $i++) { ?>
			<div>
				<a class="uk-card uk-card-default uk-card-body uk-display-block" href="<?base_url('author/'.$users[$i]->id) ?>">
				<?php if($users[$i]->profile_image) { ?>
					<img src="<?php echo $users[$i]->profile_image ?>" class="uk-border-circle uk-margin-small-bottom">
				<?php } ?>
					<span class="uk-text-large uk-text-bold"><?php echo $users[$i]->username ?></span>
					<div class="author-stat" class="uk-text-uppercase">
						<?php echo $users[$i]->story_count ?> stories, <?php echo $users[$i]->subscribers ?> followers
					</div>
				</a>
			</div>
		<?php } ?>
		</div>
 </div>