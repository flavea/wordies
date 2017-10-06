<div class="uk-container uk-container-small uk-margin-xlarge">
	<h2 class="category-title"><span>Authors</span></h2>
	<div class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-3@m uk-text-center" uk-grid uk-height-match="target: > div > .uk-card">

		<?php 
		if(isset($authors) && $authors != null) {
			foreach ($authors as $author) { ?>

			<div>
				<a class="uk-card uk-card-default uk-card-body uk-display-block" href="<?= base_url('author/'.$author->id) ?>">
				<?php if($author->profile_image != null) { ?>
					<img src="<?= $author->profile_image ?>" class="uk-border-circle uk-margin-small-bottom">
				<?php } ?>
					<span class="uk-text-large uk-text-bold uk-text-center uk-display-block"><?= $author->username ?></span>
					<div class="uk-text-small uk-text-uppercase uk-text-center">
						<?= $author->story_count ?> Stories, <?= $author->subscribers ?> followers
					</div>
				</a>
			</div>
			<?php }
		}  ?>
	</div>

	<?php echo $links; ?>
</div>