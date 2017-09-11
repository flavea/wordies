<?php if(isset($story) && $story != null) {?>
<div class="uk-margin-xlarge-top uk-container uk-container-large">
 
<?php $this->load->view('dashboard/story_header');?>

<div id="chapter" class="uk-margin-large-top uk-padding-large">

<h2 class="uk-modal-title">New Resource</h2>
<?php echo form_open("dashboard/update_resource");?>
<div class="uk-margin">
    <input class="uk-input" type="text" placeholder="Title" name="title"  value="<?php echo $resource[0]->name ?>" required>
</div>

<div class="uk-margin">
    <input class="uk-input" type="text" placeholder="Link" name="link" value="<?php echo $resource[0]->link ?>">
</div>

<div class="uk-margin">
    <textarea class="uk-textarea" rows="5" placeholder="Textarea" name="desc"><?php echo $resource[0]->description ?></textarea>
</div>

<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="submit" value="Update Resource" class="uk-button uk-button-secondary">
<?php echo form_close();?>
</div>
<?php } ?>