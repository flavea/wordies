<div class="uk-margin-xlarge-top uk-container uk-container-large">
	<div id="dashboard-header" class="uk-dark uk-background-muted uk-padding">

		<?php if($story[0]->cover != null) { ?>
		<img class="uk-align-left" src="<?php echo $story[0]->cover ?>" alt="">
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

	<div id="chapter" class="uk-margin-large-top uk-container uk-container-small uk-padding-large">
        <?php echo form_open("dashboard/save_chapter");?>
		<div class="uk-margin">
			<input class="uk-input uk-form-large" type="text" value="<?php echo $chapter[0]->title ?>" name="title">
		</div>

		<div class="uk-margin">
			<select name="status" class="uk-select">
				<option value="0" <?php if($chapter[0]->status == 0) echo "selected"; ?>">Private</option>
				<option value="1" <?php if($chapter[0]->status == 1) echo "selected"; ?>">Published</option>
			</select>
		</div>

		<div class="uk-margin">
			<textarea class="uk-textarea" rows="5" placeholder="Textarea" name="desc"><?php echo $chapter[0]->content ?></textarea>
		</div>
		<input type="hidden" value="<?php echo $id ?>" name="id">

        <input type="submit" value="Update Chapter" class="uk-button uk-button-secondary">
		<a class="uk-button uk-button-secondary">Delete Chapter</a>
        <?php echo form_close();?>

		<div class="uk-margin-medium-top">
			<h1 class="uk-heading-divider">
				<span>Sections</span>
				<a class="uk-icon-button uk-float-right uk-background-secondary uk-light uk-margin-medium-top" uk-icon="icon: plus; ratio: .7" title="Add Sections" uk-tooltip uk-toggle="target: #new-section"></a>
			</h1>

			<?php if(isset($sections) && $sections != null) {
				for($i = 0; $i < count($sections); $i++) { 
					?>
					<div class="uk-inline uk-display-block">
						<h3 class="uk-text-uppercase">
							<?php if ($i < 10) echo "0".($i+1).".";
							else echo ($i+1)."."; ?>
							<?php echo $sections[$i]->desc ?>
						</h3>
						<div class="uk-position-right uk-margin-medium-right">
							<a class="uk-icon-button" uk-icon="icon: file-edit; ratio: .7" title="Edit" href="<?= base_url('dashboard/section/'.$sections[$i]->id) ?>"></a>
							<a class="uk-icon-button" uk-icon="icon: trash; ratio: .7" title="Delete" uk-tooltip chid="<?php echo $sections[$i]->id ?>"></a>
						</div>
					</div>
					<?php 
				}
			} else {
				echo 'There is no sections yet.';
			}
			?>

		</div>
	</div>

	<div id="new-section" uk-modal>
		<div class="uk-modal-dialog uk-modal-body">
			<button class="uk-modal-close-default" type="button" uk-close></button>
			<h2 class="uk-modal-title">New Section</h2>
        	<?php echo form_open("dashboard/new_section");?>
			<div class="uk-margin">
				<input class="uk-textarea" rows="5" placeholder="Section Description Here" name="desc">
			</div>

	        <input type="hidden" name="chapter_id" value="<?php echo $id; ?>">
	        <input type="submit" value="Create New Section" class="uk-button uk-button-secondary">
        	<?php echo form_close();?>

		</div>
	</div>
