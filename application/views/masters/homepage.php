
<?php if(!$logged_in) { ?>
<div id="sidebar" class="uk-visible@m">
	<img src="./assets/img/logo-150.png">
	<p>Manage and publish your stories online.</p>
	<a class="uk-button uk-button-default uk-display-block">Login</a>
	<a class="uk-button uk-button-default uk-display-block uk-margin-small">Register</a>
</div>

<div class="uk-hidden@m uk-text-center uk-margin-large-top uk-padding-large">
	<img src="./assets/img/logo-150.png">
	<p>Manage and publish your stories online.</p>
	<a class="uk-button uk-button-default uk-display-block">Login</a>
	<a class="uk-button uk-button-default uk-display-block uk-margin-small">Register</a>
</div>

<div id="container" class="uk-padding-large">
	<div id="container--content">
<?php } else { ?>
	<div class="uk-container uk-container-small uk-margin-xlarge">
<?php } ?>
		<h2 class="category-title"><span>Latest Stories</span></h2>
		
		<?php if(isset($stories) && $stories != null) { ?>
		<?php for($i = 0; $i < count($stories); $i++) { ?>
		<div class="summary-box uk-clearfix uk-margin-large">
		<?php if($stories[$i]->cover != null) { ?><img src="<?php echo $stories[$i]->cover; ?>" class="uk-float-left"><?php } ?>
			<div id="info" class="uk-float-right">
				<small class="label"><i>A <?php echo $stories[$i]->genre_name.' '.$stories[$i]->category_name; ?> by <a href="<?=base_url('profile/'.$stories[$i]->author_id);?>"><?php echo $stories[$i]->username; ?></a></i></small>
				<a href="<?=base_url('stories/story/'.$stories[$i]->id)?>" class="uk-button uk-button-text uk-text-capitalize uk-h2"><h2><?php echo $stories[$i]->title; ?></h2></a>
				<p class="uk-margin-small-top"><?php echo $stories[$i]->desc; ?></p>
				<div class="line"></div>
				<div class="info"><b>Updated:</b> <?php $date = new DateTime($stories[$i]->updated); echo date_format($date, 'M dS Y'); ?></div>
				<div class="info"><b>Language:</b> <?php echo $stories[$i]->langname; ?></div>
				<div class="info"><b>Rating:</b> <?php echo $stories[$i]->rating_name; ?></div>
				<div class="info"><b>Word Count:</b> <?php echo $stories[$i]->word_count; ?></div>
				<div class="info"><b>Subscribers:</b> <?php echo $stories[$i]->subscribers; ?></div>
				<div class="info"><b>Votes:</b> <?php echo $stories[$i]->votes; ?></div>
				<div class="info"><b>Reads:</b> <?php echo $stories[$i]->view_count; ?></div>
				<div class="info"><b>Comments:</b> <?php echo $stories[$i]->comment_count; ?></div>
				
				<?php
					$this->load->model("Basic_model");
					$tags = $this->Basic_model->simple_select('tag_views', array('story_id' => $stories[$i]->id));
					if(isset($tags) & $tags !=null) {
						echo "<div class='line'></div><div class='uk-text-small'><small>";
						foreach ($tags as $tag) {
							echo "<a href='".base_url('tag/'.$tag->tag)."' class='uk-display-inline-block uk-margin-small-right uk-button uk-button-text'><span uk-icon='icon: tag;ratio:.8'></span> ".$tag->tag."</a>";
						}
						echo "</small></div>";
					}
				?>
			</div>
		</div>
		<?php } ?>

		<?php } else { ?>
		<center>There is no story yet.</center>
		<?php } ?>


	</div>
</div>
