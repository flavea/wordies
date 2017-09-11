
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

 <a class="uk-button uk-button-secondary uk-margin-small-top" href="<?= base_url('dashboard/edit_story/'.$story[0]->id) ?>">Edit Info</a>
 <a class="uk-button uk-button-secondary uk-margin-small-top">Add Tags</a>
 <a class="uk-button uk-button-secondary uk-margin-small-top" uk-toggle="target: #share">Share</a>
 <a class="btnDelete uk-button uk-button-secondary uk-margin-small-top" target="story" target-id="<?php echo $story[0]->id ?>" uk-toggle="target: #delete">Delete</a>
 <a class="uk-button uk-button-secondary uk-margin-small-top">PDF</a>

 <div class="uk-position-right uk-margin-large-right uk-flex uk-flex-middle uk-visible@l">
   <div class="uk-padding-small uk-text-uppercase"><h1 class="uk-margin-remove">2</h1>Chapters</div>
   <div class="uk-padding-small uk-text-uppercase"><h1 class="uk-margin-remove">2</h1>Characters</div>
   <div class="uk-padding-small uk-text-uppercase"><h1 class="uk-margin-remove">2</h1>Comments</div>
 </div>

</div>