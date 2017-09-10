<?php if(isset($story) && $story != null) {?>
<div class="uk-margin-xlarge-top uk-container uk-container-large">
 <div id="dashboard-header" class="uk-dark uk-background-muted uk-padding">

    <?php if($story[0]->cover != null) { ?>
    <img class="uk-align-left" src="<?php echo $story[0]->cover ?>" alt="" width="150">
    <?php } else { ?>
    <img class="uk-align-left" src="https://placehold.it/150x220" alt="">
    <?php } ?>

    <h2 class="uk-margin-remove uk-margin-small-top">
       <?php echo $story[0]->title ?>
   </h2>

   <p class="uk-margin-small-top uk-width-xlarge uk-text-small"><?php echo $story[0]->desc ?></p>

   <a class="uk-button uk-button-secondary uk-margin-small-top">Edit Info</a>
   <a class="uk-button uk-button-secondary uk-margin-small-top">Add Tags</a>
   <a class="uk-button uk-button-secondary uk-margin-small-top" uk-toggle="target: #share">Share</a>
   <a class="uk-button uk-button-secondary uk-margin-small-top">Delete</a>
   <a class="uk-button uk-button-secondary uk-margin-small-top">PDF</a>

   <div class="uk-position-right uk-margin-large-right uk-flex uk-flex-middle uk-visible@l">
       <div class="uk-padding-small uk-text-uppercase"><h1 class="uk-margin-remove">2</h1>Chapters</div>
       <div class="uk-padding-small uk-text-uppercase"><h1 class="uk-margin-remove">2</h1>Characters</div>
       <div class="uk-padding-small uk-text-uppercase"><h1 class="uk-margin-remove">2</h1>Comments</div>
   </div>

</div>


	<div id="chapter" class="uk-container uk-container-small uk-margin-large">

		
		<h2 class="uk-modal-title">Edit Story</h2>


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
			<textarea class="uk-textarea" rows="5" placeholder="Textarea" name="desc" required><?php echo $story[0]->desc ?></textarea>
		</div>

			<input class="uk-input" type="hidden" placeholder="Title" name="id" value="<?php echo $id ?>">
		<input type="submit" value="Update Story" class="uk-button uk-button-secondary" id="btnNewStory">
    <?php echo form_close();?>
	</div>
</div>


<?php } ?>