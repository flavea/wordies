<div id="sidebar" class="uk-visible@m">
	<div class="uk-margin">
		<select class="uk-select">
			<option>Option 01</option>
			<option>Option 02</option>
		</select>
	</div>
	<div class="uk-margin">
		<input class="uk-input" type="text" placeholder="Author's Name">
	</div>
	<input type="Submit" class="uk-button uk-button-primary uk-display-block" value="Filter Authors">
</div>

<div class="uk-hidden@m uk-margin-xlarge-top uk-padding-large uk-padding-remove-bottom">
	<ul uk-accordion>
		<li>
			<h3 class="uk-accordion-title">Filters</h3>
			<div class="uk-accordion-content">
				<div class="uk-margin">
					<select class="uk-select">
						<option>Option 01</option>
						<option>Option 02</option>
					</select>
				</div>
				<div class="uk-margin">
					<input class="uk-input" type="text" placeholder="Author's Name">
				</div>
				<input type="Submit" class="uk-button uk-button-primary uk-display-block" value="Filter Authors">
			</div>
		</li>
	</ul>
</div>

<hr class="uk-hidden@m">

<div id="container" class="uk-padding-large">
	<div id="container--content">
		<h2 class="category-title"><span>Authors</span></h2>
		<div class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-3@m uk-text-center" uk-grid uk-height-match="target: > div > .uk-card">

			<?php for($i = 0; $i < 9; $i++) { ?>
			<div>
				<a class="uk-card uk-card-default uk-card-body uk-display-block">

					<img src="https://placehold.it/100x100" class="uk-border-circle uk-margin-small-bottom">
					<span class="uk-text-large uk-text-bold uk-text-center uk-display-block">Flavea</span>
					<div class="uk-text-small uk-text-uppercase uk-text-center">
						1 Story, 8 followers
					</div>
				</a>
			</div>
			<?php } ?>
		</div>
		
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