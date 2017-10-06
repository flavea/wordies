<div id="sidebar" class="uk-visible@m">
	<select class="uk-select uk-margin-small" name="order" id="order">
		<option value="1" <?php if(1 == $order) echo "selected" ?>>Latest Updated</option>
		<option value="2" <?php if(2 == $order) echo "selected" ?>>Most Viewed</option>
		<option value="3" <?php if(3 == $order) echo "selected" ?>>Most Subsribed</option>
		<option value="4" <?php if(4 == $order) echo "selected" ?>>Most Favorited</option>
		<option value="5" <?php if(5 == $order) echo "selected" ?>>Most Commented</option>
	</select>
	<select class="uk-select  uk-margin-small" name="type" id="type">
		<option value="0">All Types</option>
		<?php
		if(ISSET($types) && $types != null) {
			foreach ($types as $t) {
				?>
				<option value="<?php echo $t->category_id ?>" <?php if($t->category_id == $type) echo "selected" ?>><?php echo $t->category_name ?></option>
				<?php
			}
		}
		?>
	</select>
	<select class="uk-select uk-margin-small" name="language" id="language">
		<option value="0">All Languages</option>
		<?php
		if(ISSET($languages) && $languages != null) {
			for($i = 0; $i < count($languages); $i++) {
				?>
				<option value="<?php echo $languages[$i]->id ?>" <?php if($languages[$i]->id == $language) echo "selected" ?>><?php echo $languages[$i]->name ?></option>
				<?php
			}
		}
		?>
	</select>
	<select class="uk-select uk-margin-small" name="genre" id="genre">
		<option value="0">All Genres</option>
		<?php
		if(ISSET($genres) && $genres != null) {
			for($i = 0; $i < count($genres); $i++) {
				?>
				<option value="<?php echo $genres[$i]->genre_id ?>" <?php if($genres[$i]->genre_id == $genre) echo "selected" ?>><?php echo $genres[$i]->genre_name ?></option>
				<?php
			}
		}
		?>
	</select>
	<select class="uk-select uk-margin-small" name="rating" id="rating">
		<option value="0">All Ratings</option>
		<?php
		if(ISSET($ratings) && $ratings != null) {
			foreach ($ratings as $r) {
				?>
				<option value="<?php echo $r->rating_id ?>" <?php if($r->rating_id== $rating) echo "selected" ?>><?php echo $r->rating_name ?></option>
				<?php
			}
		}
		?>
	</select>
	<input type="text" name="keyword" placeholder="Keyword" class="uk-input uk-margin-small" id="keyword" <?php if($keyword != "0") echo "value='".$keyword."'" ?>>
	<input type="Submit" class="uk-button uk-button-secondary uk-display-block" value="Filter Stories" id="filter">
</div>

<div class="uk-hidden@m uk-margin-xlarge-top uk-padding-large uk-padding-remove-bottom">
	<ul uk-accordion>
		<li>

			<h3 class="uk-accordion-title">Filters</h3>
			<div class="uk-accordion-content">

				<select class="uk-select uk-margin-small" name="order" id="order">
					<option value="1" <?php if(1 == $order) echo "selected" ?>>Latest Updated</option>
					<option value="2" <?php if(2 == $order) echo "selected" ?>>Most Viewed</option>
					<option value="3" <?php if(3 == $order) echo "selected" ?>>Most Subsribed</option>
					<option value="4" <?php if(4 == $order) echo "selected" ?>>Most Favorited</option>
					<option value="5" <?php if(5 == $order) echo "selected" ?>>Most Commented</option>
				</select>
				<select class="uk-select  uk-margin-small" name="type" id="type">
					<option value="0">All Types</option>
					<?php
					if(ISSET($types) && $types != null) {
						foreach ($types as $t) {
							?>
							<option value="<?php echo $t->category_id ?>" <?php if($t->category_id == $type) echo "selected" ?>><?php echo $t->category_name ?></option>
							<?php
						}
					}
					?>
				</select>
				<select class="uk-select uk-margin-small" name="language" id="language">
					<option value="0">All Languages</option>
					<?php
					if(ISSET($languages) && $languages != null) {
						for($i = 0; $i < count($languages); $i++) {
							?>
							<option value="<?php echo $languages[$i]->id ?>" <?php if($languages[$i]->id == $language) echo "selected" ?>><?php echo $languages[$i]->name ?></option>
							<?php
						}
					}
					?>
				</select>
				<select class="uk-select uk-margin-small" name="genre" id="genre">
					<option value="0">All Genres</option>
					<?php
					if(ISSET($genres) && $genres != null) {
						for($i = 0; $i < count($genres); $i++) {
							?>
							<option value="<?php echo $genres[$i]->genre_id ?>" <?php if($genres[$i]->genre_id == $genre) echo "selected" ?>><?php echo $genres[$i]->genre_name ?></option>
							<?php
						}
					}
					?>
				</select>
				<select class="uk-select uk-margin-small" name="rating" id="rating">
					<option value="0">All Ratings</option>
					<?php
					if(ISSET($ratings) && $ratings != null) {
						foreach ($ratings as $r) {
							?>
							<option value="<?php echo $r->rating_id ?>" <?php if($r->rating_id== $rating) echo "selected" ?>><?php echo $r->rating_name ?></option>
							<?php
						}
					}
					?>
				</select>
				<input type="text" name="keyword" placeholder="Keyword" class="uk-input uk-margin-small" id="keyword" <?php if($keyword != "0") echo "value='".$keyword."'" ?>>
				<input type="Submit" class="uk-button uk-button-secondary uk-display-block" value="Filter Stories" id="filter">
			</div>
		</li>
	</ul>
</div>

<hr class="uk-hidden@m">

<div id="container" class="uk-padding-large">
	<div id="container--content">
		<h2 class="category-title"><span>Stories</span></h2>

		
		<?php if(isset($stories) && $stories != null) { ?>
		<?php for($i = 0; $i < count($stories); $i++) { ?>
		<div class="summary-box uk-clearfix uk-margin-large">
			<?php if($stories[$i]->cover != null) { ?><img src="<?php echo $stories[$i]->cover; ?>" class="uk-float-left"><?php } ?>
			<div id="info" class="uk-float-right">
				<small class="label"><i>A <?php echo $stories[$i]->genre_name.' '.$stories[$i]->category_name; ?> by <a href="<?=base_url('author/'.$stories[$i]->author_id);?>"><?php echo $stories[$i]->username; ?></a></i></small>
				<a href="<?=base_url('story/'.$stories[$i]->id)?>" class="uk-button uk-button-text uk-text-capitalize uk-h2"><h2><?php echo $stories[$i]->title; ?></h2></a>
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
		<center>No story found.</center>
		<?php } ?>

		
		
		<?php echo $links; ?>

	</div>
</div>
<script type="text/javascript">
	$( "#filter" ).click(function() {
		if($("#keyword").val() == "") var keyword = "0";
		else var keyword = $("#keyword").val();
		location.href = getBaseURL() + "stories/index/" + $("#order").val() + '/' + $("#type").val() + '/' +  $("#rating").val() + '/' + $("#genre").val() + '/' + $("#language").val() + '/' + keyword;
	});
</script>