<div id="sidebar" class="show-for-medium">
	<img src="../assets/img/logo-150.png">
	<p>Manage and publish your stories online.</p>
	<a class="uk-button uk-button-default uk-display-block">Login</a>
	<a class="uk-button uk-button-default uk-display-block uk-margin-small">Register</a>
</div>

<div id="container">
	<div id="container--content">
		<h2 class="category-title"><span>Latest Stories</span></h2>
		
		<?php for($i = 0; $i < 10; $i++) { ?>
		<div class="summary-box uk-clearfix uk-margin-large">
			<img src="http://i.imgur.com/QVAgcLa.jpg" class="uk-float-left">
			<div id="info" class="uk-float-right">
				<small class="label"><i>A Historical Fiction by flavea</i></small>
				<a href="/" class="uk-button uk-button-text uk-text-capitalize uk-h2"><h2>When The Cold Wind Blows</h2></a>
				<p class="uk-margin-small-top">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Orci a scelerisque purus semper eget duis. Lorem donec massa sapien faucibus et. Non tellus orci ac auctor augue mauris. Suspendisse faucibus interdum posuere lorem ipsum dolor sit.</p>
				<div class="line"></div>
				<div class="info"><b>Updated:</b> Aug 25, 2017</div>
				<div class="info"><b>Genre:</b> Romance</div>
				<div class="info"><b>Rating:</b> T+</div>
				<div class="info"><b>Chapters:</b> 1</div>
				<div class="info"><b>Word Count:</b> 2000</div>
				<div class="info"><b>Complete:</b> No</div>
			</div>
		</div>
		<?php } ?>


	</div>
</div>
