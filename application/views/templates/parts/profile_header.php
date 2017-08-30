 <div class="uk-margin-xlarge-top uk-container uk-container-large">
 <div id="dashboard-header" class="uk-dark uk-background-muted uk-padding">
 	<img class="uk-align-left@m uk-border-circle" src="https://placehold.it/125x125" alt="">
 	<h2 class="uk-margin-remove uk-margin-small-top">
 		Flavea
 		<a class="uk-icon-button" uk-icon="icon: plus; ratio: .7" title="Follow This Author" uk-tooltip></a>
 		<a class="uk-icon-button" uk-icon="icon: heart; ratio: .7" title="Love This Author" uk-tooltip></a>
 		<a class="uk-icon-button" uk-icon="icon: mail; ratio: .7" title="Send a Message" uk-tooltip></a>
 	</h2>
 	<p>
 	Last Online: August 27th, 2017
 	<br>
 	<a href="/"><span uk-icon="icon: twitter"></span> _kittensoo</a>
 	<a href="/"><span uk-icon="icon: facebook"></span> _kittensoo</a>
 	<a href="/"><span uk-icon="icon: home"></span> hellolittlered.org</a>
 	</p>

 	
    <div class="uk-position-right uk-margin-large-right uk-flex uk-flex-middle uk-visible@l">
 		<div class="uk-padding-small uk-text-uppercase"><h1 class="uk-margin-remove">25</h1>Stories</div>
 		<div class="uk-padding-small uk-text-uppercase"><h1 class="uk-margin-remove">25</h1>Comments</div>
 		<div class="uk-padding-small uk-text-uppercase"><h1 class="uk-margin-remove">25</h1>Followers</div>
 		<div class="uk-padding-small uk-text-uppercase"><h1 class="uk-margin-remove">25</h1>Votes</div>
 	</div>
 	
    <div class="uk-position-right">
 	</div>
 </div>

 <?php if($the_view != "dashboard"): ?>
 <div id="profile-menu" class="uk-text-center">
 	<ul class="uk-subnav uk-subnav-divide uk-subnav-pill uk-margin-remove-bottom" uk-margin>
	    <li class="uk-active"><a href="#">Stories</a></li>
	    <li><a href="#">Followers</a></li>
	    <li><a href="#">Following</a></li>
	    <li><a href="#">Recommendations</a></li>
	    <li><a href="#">Subscriptions</a></li>
	    <li><a href="#">Comments</a></li>
	</ul>
 </div>

<div class="uk-margin-large-top uk-container uk-container-small uk-padding-large">
<?php endif; ?>