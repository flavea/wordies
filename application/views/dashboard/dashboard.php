<div id="dashboard" class="uk-margin-large-top uk-margin-large-bottom">

	<h2 class="category-title"><span>My Books</span></h2>

	<a class="uk-button uk-button-secondary uk-margin-medium-bottom" uk-toggle="target: #new-story"><span uk-icon="icon: plus-circle" class="uk-margin-small-right"></span> New Story</a>

	<div class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-3@l" uk-grid uk-height-match="target: > div > .uk-card">

		<?php 
		if(isset($stories) && $stories != null) {
			foreach ($stories as $story) { ?>
			<div>
				<div class="uk-card uk-card-default">
					<div class="uk-card-header">
						<div class="uk-grid-small uk-flex-middle" uk-grid>
							<div class="uk-width-expand">
								<h3 class="uk-card-title uk-margin-remove-bottom"><a class="uk-link-reset" href="<?= base_url('story/'.$story->id) ?>"><?php echo $story->title ?></a></h3>
								<p class="uk-text-meta uk-margin-remove-top"><time><?php echo $story->updated ?></time></p>
							</div>
						</div>
					</div>
					<div class="uk-card-body">
						<p><?php echo $story->desc ?></p>
					</div>
					<div class="uk-card-footer">
						<a href="<?= base_url('manage/'.$story->id) ?>" uk-icon="icon: file-edit"></a>
						<a uk-icon="icon: trash" target="story" target-id="<?php echo $story->id ?>" uk-toggle="target: #delete"></a>
					</div>
				</div>
			</div>
			<?php }
		} else {
			echo "<center>You haven't written any stories yet</center>";
		} ?>
	</div>

	<h2 class="category-title"><span>Shared Books</span></h2>

	<div class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-3@l" uk-grid uk-height-match="target: > div > .uk-card">

		<?php 
		if(isset($shared) && $shared != null) {
			foreach ($shared as $story) { ?>
			<div>
				<div class="uk-card uk-card-default">
					<div class="uk-card-header">
						<div class="uk-grid-small uk-flex-middle" uk-grid>
							<div class="uk-width-expand">
								<h3 class="uk-card-title uk-margin-remove-bottom"><a class="uk-link-reset" href="<?= base_url('story/'.$story->id) ?>"><?php echo $story->title ?></a></h3>
								<p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00"><?php echo $story->updated ?></time></p>
							</div>
						</div>
					</div>
					<div class="uk-card-body">
						<p><?php echo $story->desc ?></p>
					</div>
					<div class="uk-card-footer">
						<a href="<?= base_url('manage/'.$story->id) ?>" uk-icon="icon: file-edit"></a>
					</div>
				</div>
			</div>
			<?php }
		} else {
			echo "<center>You don't have any shared stories.</center>";
		} ?>
	</div>

</div>

<div id="new-story" uk-modal>
	<div class="uk-modal-dialog uk-modal-body">
		<button class="uk-modal-close-default" type="button" uk-close></button>
		<h2 class="uk-modal-title">New Story</h2>


    	<?php echo form_open("dashboard/new_story");?>

		<div class="uk-margin">
			<input class="uk-input" type="text" placeholder="Title" name="title" required>
		</div>

		<div class="uk-margin">
			<select class="uk-select" name="status">
				<option>Private</option>
				<option>Public</option>
			</select>
		</div>

		<div class="uk-margin">
			<input class="uk-input" type="text" placeholder="Story Cover Image URL (min 550 x 800 pixels)" name="cover">
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
			<select class="uk-select" name="language">
				
				<?php
				if(ISSET($languages) && $languages != null) {
					for($i = 0; $i < count($languages); $i++) {
						?>
						<option value="<?php echo $languages[$i]->id ?>"><?php echo $languages[$i]->name ?></option>
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


<div id="delete" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-text-center">
    <button class="uk-modal-close-default" type="button" uk-close></button>
    <p>Are you sure you want to delete this?</p>
    <a class="uk-button uk-button-secondary" id="btnDeleteFinal">Yes</a>
    <a class="uk-button uk-button-default uk-modal-close">No</a>
  </div>
</div>

<script type="text/javascript">
	$( ".btnDelete" ).click(function() {
    target = $(this).attr("target");
    targetid = $(this).attr("target-id");
  });


  $( "#btnDeleteFinal" ).click(function() {
    $.ajax({
      type: "POST",
      data: {
        "id": targetid
      },
      dataType: "json",
      async: false,
      url: getBaseURL() + "dashboard/delete_" + target,
      success: function(data) {
        alert("Delete success.");
        if(target == "character") location.href = getBaseURL() + "dashboard";
        else location.reload();
      }
    });
  });
</script>