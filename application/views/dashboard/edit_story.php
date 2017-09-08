

<div class="uk-margin-large-top uk-container uk-container-large">
	<div id="dashboard-header" class="uk-margin-large-top uk-dark uk-background-muted uk-padding uk-text-center@s">
		<h2 class="uk-margin-remove uk-margin-small-top">
			<?php echo $chapter[0]->title ?>
		</h2>

		<p class="uk-margin-small-top uk-text-small"><?php echo $chapter[0]->content ?></p>
	</div>


	<div id="chapter" class="uk-container uk-container-small uk-margin-large">

		
		<h2 class="uk-modal-title">Edit Story</h2>


    	<?php echo form_open("dashboard/edit_story");?>

		<div class="uk-margin">
			<input class="uk-input" type="text" placeholder="Title" name="title" required>
		</div>

		<div class="uk-margin">
			<input class="uk-input" type="text" placeholder="Story Cover (min 550 x 800 pixels)" name="cover">
		</div>

		<div class="uk-margin">
			<select class="uk-select" name="status">
				<option>Private</option>
				<option>Public</option>
			</select>
		</div>

		<div class="uk-margin">
			<select class="uk-select" name="type">
				<?php
				if(ISSET($types) && $types != null) {
					foreach ($types as $t) {
						?>
						<option value="<?php echo $t->category_id ?>"><?php echo $t->category_name ?></option>
						<?php
					}
				}
				?>
			</select>
		</div>

		<div class="uk-margin">
			<select class="uk-select" name="genre">
				
				<?php
				if(ISSET($genres) && $genres != null) {
					for($i = 0; $i < count($genres); $i++) {
						?>
						<option value="<?php echo $genres[$i]->genre_id ?>"><?php echo $genres[$i]->genre_name ?></option>
						<?php
					}
				}
				?>
			</select>
		</div>

		<div class="uk-margin">
			<select class="uk-select" name="rating">
				<?php
				if(ISSET($ratings) && $ratings != null) {
					foreach ($ratings as $r) {
						?>
						<option value="<?php echo $r->rating_id ?>"><?php echo $r->rating_name ?></option>
						<?php
					}
				}
				?>
			</select>
		</div>

		<div class="uk-margin">
			<textarea class="uk-textarea" rows="5" placeholder="Textarea" name="desc" required>Story Description Here</textarea>
		</div>

		<input type="submit" value="Create New Story" class="uk-button uk-button-secondary" id="btnNewStory">
    <?php echo form_close();?>
	</div>
</div>

