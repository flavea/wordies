<div id="sidebar" class="show-for-medium">
	<select class="uk-select uk-margin-small">
		<option selected disabled>Order By</option>
		<option value="hotdog">Hoer</option>
		<option value="starbuck">Stt Dog</option>
		<option value="apollo">Apollo</option>
	</select>
	<select class="uk-select uk-margin-small">
		<option selected disabled>Genre</option>
		<option value="husker">Husker</option>
		<option value="starbuck">Starbuck</option>
		<option value="hotdog">Hot Dog</option>
		<option value="apollo">Apollo</option>
	</select>
	<select class="uk-select uk-margin-small">
		<option selected disabled>Rating</option>
		<option value="husker">Husker</option>
		<option value="starbuck">Starbuck</option>
		<option value="hotdog">Hot Dog</option>
		<option value="apollo">Apollo</option>
	</select>
	<select class="uk-select uk-margin-small">
		<option selected disabled>Complete</option>
		<option value="husker">Husker</option>
		<option value="starbuck">Starbuck</option>
		<option value="hotdog">Hot Dog</option>
		<option value="apollo">Apollo</option>
	</select>
	<input type="text" name="keyword" placeholder="Keyword" class="uk-input uk-margin-small">
	<input type="Submit" class="uk-button uk-button-primary uk-display-block" value="Filter Stories">
</div>

<div id="container">
	<div id="container--content">
		<h2 class="category-title"><span>Stories</span></h2>

		
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
		<ul class="uk-pagination" uk-margin>
			<li><a href="#"><span uk-pagination-previous></span></a></li>
			<li><a href="#">1</a></li>
			<li class="uk-disabled"><span>...</span></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#">6</a></li>
			<li class="uk-active"><span>7</span></li>
			<li><a href="#">8</a></li>
			<li><a href="#">9</a></li>
			<li><a href="#">10</a></li>
			<li class="uk-disabled"><span>...</span></li>
			<li><a href="#">20</a></li>
			<li><a href="#"><span uk-pagination-next></span></a></li>
		</ul>


	</div>
</div>