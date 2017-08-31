
<nav id="main-menu" class="uk-navbar-container" uk-navbar>
	<div class="uk-navbar-left">

		<ul class="uk-navbar-nav">
			
			<li class="separator uk-padding-remove">

				<a href="#">
					<div class="uk-inline small-icon uk-margin-small-right uk-border-circle">
						<span class="uk-position-top-right uk-badge uk-badge-custom uk-hidden@m">10</span>
						<img src="http://placeholder.it/20x20">
					</div>
					<span class="uk-visible@m">Hello, Guest</span> <span uk-icon="icon: chevron-down;" class="uk-margin-small-left@m"></span></a>
					<div class="uk-navbar-dropdown">
						<ul class="uk-nav uk-navbar-dropdown-nav">
							<?php if($logged_in == true) { ?>
							<li class="uk-active"><a href="#">My Profile</a></li>
							<li><a href="#">My Dashboard</a></li>
							<li><a href="#">Write a New Story</a></li>
							<li><a href="#">Edit Profile</a></li>
							<li class="uk-inline uk-display-block uk-hidden@m"><a href="#">Notifications <span class="uk-position-top-right uk-badge uk-float-right uk-margin-small-top"><small>10</small></span></a></li>
							<li class="uk-inline uk-display-block uk-hidden@m"><a href="#">Messages <span class="uk-position-top-right uk-badge uk-float-right uk-margin-small-top"><small>10</small></span></a></li>
							<li class="uk-inline uk-display-block uk-hidden@m"><a href="#">New Comments <span class="uk-position-top-right uk-badge uk-float-right uk-margin-small-top"><small>10</small></span></a></li>
							<li class="uk-nav-divider"></li>
							<li><a href="#">Log Out</a></li>
							<?php } else { ?>
							<li><a href="#">Login</a></li>
							<li><a href="#">Register</a></li>
							<?php } ?>


						</ul>
					</div>
				</li>
				<li class="uk-hidden@m toggle-menu uk-margin-small-left">
					<a uk-icon="icon: menu" class="uk-margin-small-right" href="#"></a>
					<div class="uk-navbar-dropdown">
						<ul class="uk-nav uk-navbar-dropdown-nav">
							<li><a href="#">Home</a></li>
							<li><a href="#">Stories</a></li>
							<li><a href="#">Authors</a></li>
							<li><a href="#">Informations</a></li>
							<li><a href="#">Wordies</a></li>

						</ul>
					</div>
				</li>
				<li class="uk-active uk-visible@m"><a href="#">Home</a></li>
				<li class="uk-visible@m">
					<a href="#">Stories <span uk-icon="icon: chevron-down;" class="uk-margin-small-left"></span></a>
					<div class="uk-navbar-dropdown uk-navbar-dropdown-width-4">
						<div class="uk-navbar-dropdown-grid uk-child-width-1-4" uk-grid>
							<div>
								<ul class="uk-nav uk-navbar-dropdown-nav">
									<li><a href="#">Newest Stories</a></li>
									<li><a href="#">Most Favorited Stories</a></li>
									<li><a href="#">Most Subscribed Stories</a></li>
									<li><a href="#">Most Commented</a></li>
									<li class="uk-nav-header">Type</li>
									<?php
										if(ISSET($types) && $types != null) {
											foreach ($types as $t) {
									?>
										<li><a href="#"><?php echo $t->category_name ?></a></li>
									<?php
											}
										}
									?>
								</ul>
							</div>
							<div>
								<ul class="uk-nav uk-navbar-dropdown-nav">
									<li class="uk-nav-header">Status</li>
									<li><a href="#">Completed</a></li>
									<li><a href="#">Not Completed</a></li>
									<li class="uk-nav-header">Rating</li>
									<?php
										if(ISSET($ratings) && $ratings != null) {
											foreach ($ratings as $r) {
									?>
										<li><a href="#"><?php echo $r->rating_name ?></a></li>
									<?php
											}
										}
									?>
								</ul>
							</div>
							<div>

								<ul class="uk-nav uk-navbar-dropdown-nav">
									<li class="uk-nav-header">Genre</li>
									<?php
										if(ISSET($genres) && $genres != null) {
											for($i = 0; $i < count($genres)/2; $i++) {
									?>
										<li><a href="#"><?php echo $genres[$i]->genre_name ?></a></li>
									<?php
											}
										}
									?>
								</ul>
							</div>
							<div>

								<ul class="uk-nav uk-navbar-dropdown-nav">
									<li class="uk-nav-header">Genre</li>
									<?php
										if(ISSET($genres) && $genres != null) {
											for($i = count($genres)/2; $i < count($genres); $i++) {
									?>
										<li><a href="#"><?php echo $genres[$i]->genre_name ?></a></li>
									<?php
											}
										}
									?>
								</ul>
							</div>
						</div>
					</div>
				</li>
				<li class="uk-visible@m">
					<a href="#">Authors <span uk-icon="icon: chevron-down;" class="uk-margin-small-left"></span></a>
					<div class="uk-navbar-dropdown">
						<ul class="uk-nav uk-navbar-dropdown-nav">
							<li><a href="#">By Alphabet</a></li>
							<li><a href="#">By Number of Stories</a></li>
							<li><a href="#">Most Followed</a></li>
							<li><a href="#">Most Favorited</a></li>
						</ul>
					</div>
				</li>
				<li class="uk-visible@l">
					<a href="#">Informations <span uk-icon="icon: chevron-down;" class="uk-margin-small-left"></span></a>
					<div class="uk-navbar-dropdown">
						<ul class="uk-nav uk-navbar-dropdown-nav">
							<li><a href="#">Genres</a></li>
							<li><a href="#">Ratings</a></li>
						</ul>
					</div>
				</li>
				<li class="uk-visible@l">
					<a href="#">Wordies <span uk-icon="icon: chevron-down;" class="uk-margin-small-left"></span></a>
					<div class="uk-navbar-dropdown">
						<ul class="uk-nav uk-navbar-dropdown-nav">
							<li><a href="#">About Wordies</a></li>
							<li><a href="#">Term of Use</a></li>
							<li><a href="#">Disclaimers</a></li>
							<li><a href="#">Report</a></li>
						</ul>
					</div>
				</li>
			</ul>

		</div>
		<div class="uk-navbar-right uk-margin-small-top">

			<ul class="uk-subnav uk-subnav-divider uk-margin-small-top">
				<li>

					<form class="uk-search uk-search-default">
						<a href="" class="uk-search-icon-flip" uk-search-icon></a>
						<input class="uk-search-input" type="search" placeholder="Search...">
					</form>
				</li>

				<?php if($logged_in == true) { ?>
				<li class="uk-visible@m">
					<span class="cmessage uk-hidden uk-position-top-right uk-badge uk-badge-custom"></span>
					<a href="#" uk-icon="icon: mail"></a>
					<div class="uk-navbar-dropdown uk-navbar-dropdown-width-2" uk-dropdown>
						<ul class="uk-nav uk-navbar-dropdown-nav">
							<li class="uk-active"><a href="#">Active</a></li>
							<li><a href="#">Item</a></li>
							<li class="uk-nav-header">Header</li>
							<li><a href="#">Item</a></li>
							<li><a href="#">Item</a></li>
							<li class="uk-nav-divider"></li>
							<li><a href="#">Item</a></li>
						</ul>
					</div>
				</li>
				<li class="uk-visible@m">
					<span class="ccomment uk-hidden uk-position-top-right uk-badge uk-badge-custom"></span>
					<a href="#" uk-icon="icon: comment"></a>
					<div class="uk-navbar-dropdown uk-navbar-dropdown-width-2" uk-dropdown>
						<ul class="uk-nav uk-navbar-dropdown-nav">
							<li class="uk-active"><a href="#">Active</a></li>
							<li><a href="#">Item</a></li>
							<li class="uk-nav-header">Header</li>
							<li><a href="#">Item</a></li>
							<li><a href="#">Item</a></li>
							<li class="uk-nav-divider"></li>
							<li><a href="#">Item</a></li>
						</ul>
					</div>
				</li>
				<li class="uk-visible@m">
					<span class="cnotif uk-hidden uk-position-top-right uk-badge uk-badge-custom">10</span>
					<a href="#" uk-icon="icon: bell"></a>
					<div class="uk-navbar-dropdown uk-navbar-dropdown-width-2" uk-dropdown>
						<ul class="uk-nav uk-navbar-dropdown-nav">
							<li class="uk-active"><a href="#">Active</a></li>
							<li><a href="#">Item</a></li>
							<li class="uk-nav-header">Header</li>
							<li><a href="#">Item</a></li>
							<li><a href="#">Item</a></li>
							<li class="uk-nav-divider"></li>
							<li><a href="#">Item</a></li>
						</ul>
					</div>
				</li>
				<?php } ?>
			</ul>

		</div>
	</nav>