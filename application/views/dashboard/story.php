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

<div id="dashboard" class="uk-margin-large-top uk-padding-large">


  <div class="uk-child-width-1-1@s uk-child-width-1-2@l" uk-grid>
   <div class="uk-inline">
    <h1 class="uk-heading-divider">
     <span>Chapters</span>
     <a class="uk-icon-button uk-float-right uk-background-secondary uk-light uk-margin-medium-top" uk-icon="icon: plus; ratio: .7" title="Add Chapter" uk-tooltip uk-toggle="target: #new-chapter"></a>
 </h1>

 <?php if(isset($chapters) && $chapters != null) {
    for($i = 0; $i < count($chapters); $i++) {
        ?>
        <div class="uk-inline uk-display-block">
         <h3 class="uk-text-uppercase">
          <span class="uk-margin-large-right">
            <?php if ($i < 10) echo "0".($i+1).".";
            else echo ($i+1)."."; ?>
        </span> 
        <?php echo $chapters[$i]->title ?>
    </h3>
    <div class="uk-position-right uk-margin-medium-right">
      <a class="uk-icon-button" uk-icon="icon: file-edit; ratio: .7" title="Edit" href="<?= base_url('dashboard/chapter/'.$chapters[$i]->id) ?>"></a>
      <a class="uk-icon-button" uk-icon="icon: trash; ratio: .7" title="Delete" uk-tooltip chid="<?php echo $chapters[$i]->id ?>"></a>
  </div>
</div>
<?php 
}
} else {
    echo "<br>There is no chapters yet.";
} 
?>

</div>
<div>
    <h1 class="uk-heading-divider">
     <span>Characters</span>
     <a class="uk-icon-button uk-float-right uk-background-secondary uk-light uk-margin-medium-top" uk-icon="icon: plus; ratio: .7" title="Add Character" uk-tooltip uk-toggle="target: #new-character"></a>
 </h1>


 <?php if(isset($characters) && $characters != null) {
    foreach ($characters as $char) {
        ?>
 <div class="uk-inline uk-display-block">
     <h3 class="uk-text-uppercase">
     <?php echo $char->name ?>
  </h3>
  <div class="uk-position-right uk-margin-medium-right">
      <a class="uk-icon-button" uk-icon="icon: file-edit; ratio: .7" title="Edit" uk-tooltip chid="<?php echo $char->id ?>"></a>
      <a class="uk-icon-button" uk-icon="icon: trash; ratio: .7" title="Delete" uk-tooltip chid="<?php echo $char->id ?>"></a>
  </div>
</div>

<?php 
}
} else {
    echo "<br>There is no characters yet.";
} 
?>
</center>
</div>
</div>

<div class="uk-margin-medium-top">
   <h1 class="uk-heading-divider">
    <span>Resources</span>
    <a class="uk-icon-button uk-float-right uk-background-secondary uk-light uk-margin-medium-top" uk-icon="icon: plus; ratio: .7" title="Add Resource" uk-tooltip uk-toggle="target: #new-resources"></a>
</h1>



<div class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-3@l" uk-grid uk-height-match="target: > div > .uk-card">

 <?php if(isset($resources) && $resources != null) {
    foreach ($resources as $res) {
        ?>
    <div>
     <div class="uk-card uk-card-default uk-display-block" href="">
      <div class="uk-card-header" uk-lightbox>
       <h3 class="uk-card-title uk-margin-remove-bottom"><a class="uk-link-reset" href="<?php echo $res->link ?>"><?php echo $res->name ?></a></h3>
   </div>
   <div class="uk-card-body">
       <p><?php echo $res->description ?></p>
   </div>
   <div class="uk-card-footer">
       <a href="https://www.youtube.com/watch?v=lpMdr_5bygo" uk-icon="icon: file-edit"></a>
       <a href="#" uk-icon="icon: trash"></a>
   </div>
</div>
</div>

<?php 
}
} else {
    echo "<br><center>There is no resources yet.</center>";
} 
?>
</div>


</div>
</div>

<!--<div class="uk-margin-medium-top">
   <h1 class="uk-heading-divider">
    <span>Latest Comments</span>
</h1>

<div class="uk-child-width-1-1@s uk-child-width-1-1@m uk-child-width-1-2@l" uk-grid uk-height-match="target: > div > .uk-card">

    <?php for($i = 0; $i < 4; $i++) { ?>
    <div>
     <div class="uk-card uk-card-default uk-padding-small">
      <img class="uk-align-left uk-border-circle" src="https://placehold.it/100" alt="">
      <small class="label"><i>flavea commented on lorem ipsun on aug 25, 2017</i></small>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Orci a scelerisque purus semper eget duis. Lorem donec massa sapien faucibus et. Non tellus orci ac auctor augue mauris. Suspendisse faucibus interdum posuere lorem ipsum dolor sit.</p>
      <div class="uk-text-right">
       <a href="/" class="uk-button uk-button-default"><span uk-icon="icon: ban;ratio:.8" class="uk-margin-small-right"></span> Report</a>
       <a href="/" class="uk-button uk-button-default"><span uk-icon="icon: reply;ratio:.8" class="uk-margin-small-right"></span> Reply</a>
       <a href="/" class="uk-button uk-button-default"><span uk-icon="icon: trash;ratio:.8" class="uk-margin-small-right"></span> Delete</a>
   </div>
</div>
</div>
<?php } ?>
</div>

<center><a class="uk-button uk-button-secondary uk-margin-medium-top uk-margin-medium-bottom">All Comments</a></center>

</div>
</div>
-->
<div id="new-chapter" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title">New Chapter</h2>

        <?php echo form_open("dashboard/new_chapter");?>
        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="Chapter Name" name="title">
        </div>

        <div class="uk-margin">
            <select class="uk-select" name="status">
                <option value="0">Private</option>
                <option value="1">Public</option>
            </select>
        </div>

        <div class="uk-margin">
            <textarea class="uk-textarea" rows="5" placeholder="Textarea" name="desc">Chapter Description Here</textarea>
        </div>

        <input type="hidden" name="story_id" value="<?php echo $id; ?>">
        <input type="submit" value="Create New Chapter" class="uk-button uk-button-secondary">
        <?php echo form_close();?>

    </div>
</div>


<div id="new-character" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title">New Character</h2>
        <?php echo form_open("dashboard/new_character");?>
        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="Character Name" name="name">
        </div>

        <input type="hidden" name="story_id" value="<?php echo $id; ?>">
        <input type="submit" value="Create New Character" class="uk-button uk-button-secondary">
        <?php echo form_close();?>

    </div>
</div>

<div id="new-resources" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title">New Resource</h2>
        <?php echo form_open("dashboard/new_resource");?>
        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="Title" name="title" required>
        </div>

        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="Link" name="link">
        </div>

        <div class="uk-margin">
            <textarea class="uk-textarea" rows="5" placeholder="Textarea" name="desc">Description</textarea>
        </div>

        <input type="hidden" name="story_id" value="<?php echo $id; ?>">
        <input type="submit" value="Create New Resource" class="uk-button uk-button-secondary">
        <?php echo form_close();?>

    </div>
</div>


<div id="share" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title">Share Story</h2>
        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="User's Username">
        </div>

        <div class="uk-margin">
            <select class="uk-select">
                <option>View Only</option>
                <option>View and Edit</option>
                <option>View, Add, Edit, and Delete</option>
            </select>
        </div>


        <a class="uk-button uk-button-secondary" id="btnNewResources">Share</a>

    </div>
</div>

<div id="delete" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <p>Are you sure you want to delete this story?</p>


        <a class="uk-button uk-button-secondary" id="btnDeleteStory">Yes</a>

    </div>
</div>
<?php } ?>