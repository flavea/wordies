<?php if(isset($story) && $story != null) {?>
<div class="uk-margin-xlarge-top uk-container uk-container-large">
	
	<?php $this->load->view('dashboard/story_header');?>


	<div id="chapter" class="uk-container uk-container-small uk-margin-large">

		<a class="uk-button uk-button-secondary uk-margin-large-bottom" href="<?= base_url('manage/'.$story[0]->id) ?>"><span uk-icon="icon: arrow-left"></span> Back to Story</a>
		
		<h2 class="uk-modal-title">Edit Story</h2>

		<?php if($message != null) { ?>
		<div class="uk-alert-danger" uk-alert>
			<a class="uk-alert-close" uk-close></a>
			<?php echo $message;?>
		</div>
		<?php } ?>


		<?php echo form_open("dashboard/edit_story");?>

		<div class="uk-margin">
			<input class="uk-input" type="text" placeholder="Title" name="title" value="<?php echo $story[0]->title ?>"required>
		</div>

		<div class="uk-margin">
			<input class="uk-input" type="text" placeholder="Story Cover (min 550 x 800 pixels)" name="cover" value="<?php echo $story[0]->cover ?>">
		</div>

		<div class="uk-margin">
			<select class="uk-select" name="status">
				<option value="0" <?php if($story[0]->status_id == 0) echo "selected"; ?>>Private</option>
				<option value="1" <?php if($story[0]->status_id == 1) echo "selected"; ?>>Public</option>
			</select>
		</div>

		<div class="uk-margin">
			<select class="uk-select" name="type">
				<?php
				if(ISSET($types) && $types != null) {
					foreach ($types as $t) {
						?>
						<option value="<?php echo $t->category_id ?>" <?php if($story[0]->type_id == $t->category_id) echo "selected"; ?>><?php echo $t->category_name ?></option>
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
						<option value="<?php echo $genres[$i]->genre_id ?>"  <?php if($story[0]->genre_id == $genres[$i]->genre_id) echo "selected"; ?>><?php echo $genres[$i]->genre_name ?></option>
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
						<option value="<?php echo $r->rating_id ?>" <?php if($story[0]->rating_id == $r->rating_id) echo "selected"; ?>><?php echo $r->rating_name ?></option>
						<?php
					}
				}
				?>
			</select>
		</div>

		<div class="uk-margin">
			<select class="uk-select" name="language">
				<?php
				if(ISSET($languages) && $languages != null) {
					foreach ($languages as $l) {
						?>
						<option value="<?php echo $l->id ?>" <?php if($story[0]->language_id == $l->id) echo "selected"; ?>><?php echo $l->name ?></option>
						<?php
					}
				}
				?>
			</select>
		</div>

		<div class="uk-margin">
			<textarea class="uk-textarea" rows="5" placeholder="Textarea" name="desc" required><?php echo $story[0]->desc ?></textarea>
		</div>

		<input class="uk-input" type="hidden" placeholder="Title" name="id" value="<?php echo $id ?>">
		<input type="submit" value="Update Story" class="uk-button uk-button-secondary" id="btnNewStory">
		<?php echo form_close();?>
	</div>
</div>


<?php } ?>