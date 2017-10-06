 <div class="uk-margin-xlarge-top uk-container uk-container-large">
 	<div id="dashboard-header" class="uk-dark uk-background-muted uk-padding">
 		<input type="hidden" id="id" value="<?php echo $id; ?>">
 		<?php if($profile[0]->profile_image != null) {?>
 		<img class="uk-align-left@m uk-border-circle" src="<?php echo $profile[0]->profile_image; ?>" alt="" style="max-height: 120px;border: 5px solid #fff">
 		<?php } ?>
 		<h2 class="uk-margin-remove uk-margin-small-top">
 			<?php echo $profile[0]->username; ?>
 			<?php if($logged_in) { ?>
 			<?php if(isset($subscribed) && $subscribed != 0) { ?>
 			<a id="unsubscribe" style="color:red" class="uk-icon-button" uk-icon="icon: plus; ratio: .7" title="Unfollow This Author" uk-tooltip></a>
 			<?php } else if(isset($subscribed)) {?>
 			<a id="subscribe" class="uk-icon-button" uk-icon="icon: plus; ratio: .7" title="Follow This Author" uk-tooltip></a>
 			<?php } ?>
 			<?php if(isset($voted) && $voted != 0) { ?>
 			<a id="unlove" style="color:red" class="uk-icon-button" uk-icon="icon: heart; ratio: .7" title="Unlove This Author" uk-tooltip></a>
 			<?php } else if(isset($voted)){?>
 			<a id="love" class="uk-icon-button" uk-icon="icon: heart; ratio: .7" title="Love This Author" uk-tooltip></a>
 			<?php } ?>
 			<a href="<?= base_url('new_message/'.$profile[0]->id) ?>" class="uk-icon-button" uk-icon="icon: mail; ratio: .7" title="Send a Message" uk-tooltip></a>
 			<?php } ?>
 		</h2>
 		<?php if($profile[0]->about != null) {?>
 		<p>
 			<?php echo $profile[0]->about; ?>
 			<br>
 			<?php } ?>
 			<?php if($profile[0]->twitter != null) {?>
 			<a href="http://twitter.com/<?php echo $profile[0]->twitter; ?>"><span uk-icon="icon: twitter"></span> <?php echo $profile[0]->twitter; ?></a>
 			<?php } ?>
 			<?php if($profile[0]->facebook != null) {?>
 			<a href="http://facebook.com/<?php echo $profile[0]->facebook; ?>"><span uk-icon="icon: facebook"></span> <?php echo $profile[0]->facebook; ?></a>
 			<?php } ?>
 		</p>


 		<div class="uk-position-right uk-margin-large-right uk-flex uk-flex-middle uk-visible@l">
 			<div class="uk-padding-small uk-text-uppercase"><h1 class="uk-margin-remove"><?php if($profile[0]->story_count == null) echo '0'; else echo $profile[0]->story_count; ?></h1>Stories</div>
 			<div class="uk-padding-small uk-text-uppercase"><h1 class="uk-margin-remove"><?php if($profile[0]->word_count == null) echo '0'; else echo $profile[0]->word_count; ?></h1>words</div>
 			<div class="uk-padding-small uk-text-uppercase"><h1 class="uk-margin-remove"><?php if($profile[0]->subscribers == null) echo '0'; else echo $profile[0]->subscribers; ?></h1>Followers</div>
 			<div class="uk-padding-small uk-text-uppercase"><h1 class="uk-margin-remove"><?php if($profile[0]->votes == null) echo '0'; else echo $profile[0]->votes; ?></h1>Votes</div>
 		</div>

 		<div class="uk-position-right">
 		</div>
 	</div>

 	<?php if($the_view != "dashboard"): ?>
 		<div id="profile-menu" class="uk-text-center">
 			<ul class="uk-subnav uk-subnav-divide uk-subnav-pill uk-margin-remove-bottom" uk-margin>
 				<li class="uk-active"><a href="#">Stories</a></li>
 				<li><a href="<?= base_url('author/'.$profile[0]->id.'/followers') ?>">Followers</a></li>
 				<li><a href="<?= base_url('author/'.$profile[0]->id.'/following') ?>">Following</a></li>
 				<li><a href="<?= base_url('author/'.$profile[0]->id.'/recommendations') ?>">Recommendations</a></li>
 				<li><a href="<?= base_url('author/'.$profile[0]->id.'/subscriptions') ?>">Subscriptions</a></li>
 				<li><a href="<?= base_url('author/'.$profile[0]->id.'/comments') ?>">Comments</a></li>
 			</ul>
 		</div>

 		<div class="uk-margin-large-top uk-container uk-container-small uk-padding-large">
 		<?php endif; ?>

 		<script type="text/javascript">
 			$( "#subscribe" ).click(function() {
 				$.ajax({
 					type: "POST",
 					data: {
 						"author": $("#id").val()
 					},
 					dataType: "json",
 					async: false,
 					url: getBaseURL() + "profile/interact/1",
 					success: function(data) {
 						location.reload()
 					}
 				});
 			});

 			$( "#unsubscribe" ).click(function() {
 				$.ajax({
 					type: "POST",
 					data: {
 						"author": $("#id").val()
 					},
 					dataType: "json",
 					async: false,
 					url: getBaseURL() + "profile/interact/2",
 					success: function(data) {
 						location.reload()
 					}
 				});
 			});

 			$( "#love" ).click(function() {
 				$.ajax({
 					type: "POST",
 					data: {
 						"author": $("#id").val()
 					},
 					dataType: "json",
 					async: false,
 					url: getBaseURL() + "profile/interact/3",
 					success: function(data) {
 						location.reload()
 					}
 				});
 			});

 			$( "#unlove" ).click(function() {
 				$.ajax({
 					type: "POST",
 					data: {
 						"author": $("#id").val()
 					},
 					dataType: "json",
 					async: false,
 					url: getBaseURL() + "profile/interact/4",
 					success: function(data) {
 						location.reload()
 					}
 				});
 			});
 		</script>