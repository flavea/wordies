
<nav id="main-menu" class="uk-navbar-container" uk-navbar>
	<div class="uk-navbar-left">

		<ul class="uk-navbar-nav">
			
			<li class="separator uk-padding-remove">

				<a href="#">
					<div class="uk-inline small-icon uk-margin-small-right uk-border-circle">
						<span class="ctotal uk-position-top-right uk-badge uk-badge-custom uk-hidden@m"></span>
						<img src="<?php echo $img ?>" class="uk-margin-remove uk-border-circle">
					</div>
					<span class="uk-visible@m"><?php echo $username ?></span> <span uk-icon="icon: chevron-down;" class="uk-margin-small-left@m"></span></a>
					<div class="uk-navbar-dropdown">
						<ul class="uk-nav uk-navbar-dropdown-nav">
							<?php if($logged_in == true) { ?>
							<li><a href="<?= base_url('author/'.$user_id)?>">My Profile</a></li>
							<li><a href="<?= base_url('dashboard/')?>">My Dashboard</a></li>
							<li><a href="<?= base_url('auth/edit_profile')?>">Edit Profile</a></li>
							<li class="uk-inline uk-display-block uk-hidden@m"><a href="<?= base_url('notifications')?>">Notifications <span class="cnotif uk-position-top-right uk-badge uk-float-right uk-margin-small-top uk-hidden"></span></a></li>
							<li class="uk-inline uk-display-block uk-hidden@m"><a href="<?= base_url('messages')?>">Messages <span class="cmessage uk-position-top-right uk-badge uk-float-right uk-margin-small-top uk-hidden"></span></a></li>
							<li class="uk-inline uk-display-block uk-hidden@m"><a href="<?= base_url('dashboard/comments')?>">New Comments <span class="ccomment uk-position-top-right uk-badge uk-float-right uk-margin-small-top uk-hidden"></span></a></li>
							<li class="uk-nav-divider"></li>
							<li><a href="<?=base_url('auth/logout')?>">Log Out</a></li>
							<?php } else { ?>
							<li><a href="<?= base_url('auth/login')?>">Login</a></li>
							<li><a href="<?= base_url('auth/register')?>">Register</a></li>
							<?php } ?>


						</ul>
					</div>
				</li>
				<li class="uk-hidden@m toggle-menu uk-margin-small-left">
					<a uk-icon="icon: menu" class="uk-margin-small-right" href="#"></a>
					<div class="uk-navbar-dropdown">
						<ul class="uk-nav uk-navbar-dropdown-nav">
							<li><a href="<?= base_url()?>">Home</a></li>
							<li><a href="<?= base_url('stories')?>">Stories</a></li>
							<li><a href="<?= base_url('authors')?>">Authors</a></li>
							<li><a href="<?= base_url('informations')?>">Informations</a></li>
							<li><a href="<?= base_url('wordies')?>">Wordies</a></li>

						</ul>
					</div>
				</li>
				<li class="uk-active uk-visible@m"><a href="<?= base_url()?>">Home</a></li>
				<li class="uk-visible@m">
					<a href="#">Stories <span uk-icon="icon: chevron-down;" class="uk-margin-small-left"></span></a>
					<div class="uk-navbar-dropdown uk-navbar-dropdown-width-3">
						<div class="uk-navbar-dropdown-grid uk-child-width-1-3" uk-grid>
							<div>
								<ul class="uk-nav uk-navbar-dropdown-nav">
									<li><a href="<?= base_url('stories')?>">All Stories</a></li>
									<li class="uk-nav-header">Type</li>
									<?php
										if(ISSET($types) && $types != null) {
											foreach ($types as $t) {
									?>
										<li><a href="<?= base_url('stories/index/0/'.$t->category_id) ?>"><?php echo $t->category_name ?></a></li>
									<?php
											}
										}
									?>
									<li class="uk-nav-header">Rating</li>
									<?php
										if(ISSET($ratings) && $ratings != null) {
											foreach ($ratings as $r) {
									?>
										<li><a href="<?= base_url('stories/index/0/0/'.$r->rating_id) ?>"><?php echo $r->rating_name ?></a></li>
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
										<li><a href="<?= base_url('stories/index/0/0/0/'.$genres[$i]->genre_id) ?>"><?php echo $genres[$i]->genre_name ?></a></li>
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
										<li><a href="<?= base_url('stories/index/0/0/0/'.$genres[$i]->genre_id) ?>"><?php echo $genres[$i]->genre_name ?></a></li>
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
					<a href="<?= base_url('authors') ?>">Authors <span uk-icon="icon: chevron-down;" class="uk-margin-small-left"></span></a>
				</li>
				<li class="uk-visible@l">
					<a href="#">Informations <span uk-icon="icon: chevron-down;" class="uk-margin-small-left"></span></a>
					<div class="uk-navbar-dropdown">
						<ul class="uk-nav uk-navbar-dropdown-nav">
							<li><a href="<?= base_url('types')?>">Story Types</a></li>
							<li><a href="<?= base_url('genres')?>">Genres</a></li>
							<li><a href="<?= base_url('ratings')?>">Ratings</a></li>
						</ul>
					</div>
				</li>
				<!--
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
				-->
			</ul>

		</div>
		<div class="uk-navbar-right uk-margin-small-top">

			<ul class="uk-subnav uk-subnav-divider uk-margin-small-top">
				<li>

					<form class="uk-search uk-search-default">
						<a class="uk-search-icon-flip" id="search-button" uk-search-icon></a>
						<input class="uk-search-input" type="search" id="search-input" placeholder="Search...">
					</form>
				</li>

				<?php if($logged_in == true) { ?>
				<li class="uk-visible@m">
					<span class="cmessage uk-hidden uk-position-top-right uk-badge uk-badge-custom"></span>
					<a href="#" uk-icon="icon: mail"></a>
					<div class="uk-navbar-dropdown uk-navbar-dropdown-width-2" uk-dropdown>
						<ul class="uk-nav uk-navbar-dropdown-nav">
							<?php
								if(ISSET($messages) && $messages != null) {
									for($i = 0; $i < count($messages); $i++) {
								?>
									<li><a href="<?= base_url($messages[$i]->url) ?>"><?php echo $messages[$i]->message ?></a></li>
								<?php
									}
								} else {
									echo "<center>You don't have any new messsages.</center>";
								}
							?>
						</ul>
					</div>
				</li>
				<li class="uk-visible@m">
					<span class="ccomment uk-hidden uk-position-top-right uk-badge uk-badge-custom"></span>
					<a href="#" uk-icon="icon: world"></a>
					<div class="uk-navbar-dropdown uk-navbar-dropdown-width-2" uk-dropdown>
						<ul class="uk-nav uk-navbar-dropdown-nav">
							<?php
								if(ISSET($notifications2) && $notifications2 != null) {
									for($i = 0; $i < count($notifications2); $i++) {
								?>
									<li><a href="<?= base_url($notifications2[$i]->url) ?>"><?php echo $notifications2[$i]->message ?></a></li>
								<?php
									}
								} else {
									echo "<center>You don't have any new updates.</center>";
								}
							?>
						</ul>
					</div>
				</li>
				<li class="uk-visible@m">
					<span class="cnotif uk-hidden uk-position-top-right uk-badge uk-badge-custom"></span>
					<a href="#" uk-icon="icon: bell"></a>
					<div class="uk-navbar-dropdown uk-navbar-dropdown-width-2" uk-dropdown>
						<ul class="uk-nav uk-navbar-dropdown-nav">
							<?php
								if(ISSET($notifications) && $notifications != null) {
									for($i = 0; $i < count($notifications); $i++) {
								?>
									<li><a href="<?= base_url($notifications[$i]->url) ?>"><?php echo $notifications[$i]->message ?></a></li>
								<?php
									}
								} else {
									echo "<center>You don't have any new notifications.</center>";
								}
							?>
						</ul>
					</div>
				</li>
				<?php } ?>
			</ul>

		</div>
	</nav>