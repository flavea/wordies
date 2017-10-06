<?php if(isset($story) && $story != null) {?>
<div class="uk-margin-xlarge-top uk-container uk-container-large">
	
	<?php $this->load->view('dashboard/story_header');?>

	<div id="chapter" class="uk-margin-large-top uk-padding-large">
		<a class="uk-button uk-button-secondary uk-margin-large-bottom" href="<?= base_url('manage/'.$story[0]->id) ?>"><span uk-icon="icon: arrow-left"></span> Back to Story</a>

		<h2 class="uk-modal-title">Update Resource</h2>
		<?php if($permission > 2) { ?>
		<?php echo form_open("dashboard/update_resource");?>
		<?php } ?>
		<div class="uk-margin">
			<input class="uk-input" type="text" placeholder="Title" name="title"  value="<?php echo $resource[0]->name ?>" required <?php if($permission == 1) echo "readonly"; ?>>
		</div>

		<div class="uk-margin">
			<input class="uk-input" type="text" placeholder="Link" name="link" value="<?php echo $resource[0]->link ?>" <?php if($permission == 1) echo "readonly"; ?>>
		</div>

		<div class="uk-margin">
			<textarea class="uk-textarea" rows="5" placeholder="Textarea" name="desc"><?php echo $resource[0]->description ? <?php if($permission == 1) echo "readonly"; ?>></textarea>
		</div>
		<?php if($permission > 2) { ?>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="submit" value="Update Resource" class="uk-button uk-button-secondary">
		<?php echo form_close();?>
		<?php } ?>
	</div>
	<?php } ?>