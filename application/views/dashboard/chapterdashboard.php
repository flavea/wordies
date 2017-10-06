<div class="uk-margin-xlarge-top uk-container uk-container-large">
	
	<?php $this->load->view('dashboard/story_header');?>

	<div id="chapter" class="uk-margin-large-top uk-container uk-container-small uk-padding-large">

		<a class="uk-button uk-button-secondary uk-margin-large-bottom" href="<?= base_url('manage/'.$story[0]->id) ?>"><span uk-icon="icon: arrow-left"></span> Back to Story</a>
		
		<?php if($permission > 1) { ?>
		<?php echo form_open("dashboard/save_chapter");?>
		<div class="uk-margin">
			<input class="uk-input uk-form-large" type="text" value="<?php echo $chapter[0]->title ?>" name="title">
		</div>

		<?php if($message != null) { ?>
		<div class="uk-alert-danger" uk-alert>
			<a class="uk-alert-close" uk-close></a>
			<?php echo $message;?>
		</div>
		<?php } ?>

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
		<?php if($permission > 3) { ?>
		<a class="btnDelete uk-button uk-button-secondary" target="chapter" target-id="<?php echo $chapter[0]->id ?>" uk-toggle="target: #delete">Delete Chapter</a>
		<?php echo form_close();?>
		<?php } ?>
		<?php } ?>

		<div class="uk-margin-medium-top">
			<h1 class="uk-heading-divider">
				<span>Sections</span>
				<?php if($permission > 2) { ?>
				<a class="uk-icon-button uk-float-right uk-background-secondary uk-light uk-margin-medium-top" uk-icon="icon: plus; ratio: .7" title="Add Sections" uk-tooltip uk-toggle="target: #new-section"></a>
				<?php } ?>
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
							<a class="uk-icon-button" uk-icon="icon: file-edit; ratio: .7" title="Edit" href="<?= base_url('section/'.$sections[$i]->id) ?>"></a>
							<?php if($permission > 3) { ?>
							<a class="btnDelete uk-icon-button" uk-icon="icon: trash; ratio: .7" title="Delete" uk-tooltip target="section" target-id="<?php echo $sections[$i]->id ?>" uk-toggle="target: #delete"></a>
							<?php } ?>
						</div>
					</div>
					<?php 
				}
			} else {
				echo 'There is no sections yet.';
			}
			?>

		</div>


		<div class="uk-margin-medium-top">
			<h1 class="uk-heading-divider">
				<span>Comments</span>
			</h1>

			<?php if(isset($comments) && $comments != null) {
				
				for($i = 0; $i < count($comments); $i++) { ?>
				<article class="uk-comment uk-margin-small">
					<header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
						<?php if(isset($comments[$i]->profile_image) && $comments[$i]->profile_image != null) {  ?>
						<div class="uk-width-auto">
							<img class="uk-comment-avatar" src="<?php echo $comments[$i]->profile_image ?>" width="80" height="80" alt="">
						</div>
						<?php } ?>
						<div class="uk-width-expand">
							<?php if($comments[$i]->user_id !=0) { ?>
							<h4 class="uk-comment-title uk-margin-remove"><a href="<?=base_url('profile/'.$comments[$i]->user_id);?>" class="uk-link-reset"><?php echo $comments[$i]->username; ?></a></h4>
							<?php } else { ?>
							<h4 class="uk-comment-title uk-margin-remove">Guest</h4>
							<?php } ?>
							<ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
								<li><?php $date = new DateTime($comments[$i]->created); echo date_format($date, 'M dS Y'); ?></li>
									<li><a href="<?=base_url('comment/'.$comments[$i]->id);?>">Reply</a></li>
									<?php if($permission > 3) { ?>
									<li><a class='btnDelete' target="comment" target-id="<?=$comments[$i]->id;?>" uk-toggle="target: #delete">Delete</a></li>
									<?php } ?>
								</ul>
							</div>
						</header>

						<div class="uk-comment-body">
							<p><?php echo $comments[$i]->comment; ?></p>
						</div>
					</article>
					<hr>
					<?php } 
				} else {
				echo 'There is no comments yet.';
			}
			?>

		</div>
	</div>

	<?php if($permission > 2) { ?>
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
	<?php } ?>

	<?php if($permission > 3) { ?>
	<div id="delete" uk-modal>
		<div class="uk-modal-dialog uk-modal-body uk-text-center">
			<button class="uk-modal-close-default" type="button" uk-close></button>
			<p>Are you sure you want to delete this?</p>
			<a class="uk-button uk-button-secondary" id="btnDeleteFinal">Yes</a>
			<a class="uk-button uk-button-default uk-modal-close">No</a>
		</div>
	</div>
	<?php } ?>

	<input type="hidden" id="story_id" value="<?php echo $story[0]->id ?>">
</div>


<script type="text/javascript">
	var target = '';
	var targetid = '';
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
				if(target == "chapter") location.href = getBaseURL() + "dashboard/story/" + $("story_id").val();
				else location.reload();
			}
		});
	});
</script>