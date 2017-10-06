
<div class="uk-inline uk-position-top-right uk-margin-small-top uk-margin-small-right" style="position: fixed!important;z-index:999;">
	<a class="uk-background-default uk-padding-small" uk-icon="icon:menu;ratio:1" href=""></a>
	<div uk-dropdown>
		<ul class="uk-nav uk-navbar-dropdown-nav">
			<li><a href="<?= base_url()?>">Home</a></li>
			<li><a href="<?= base_url('stories')?>">Stories</a></li>
			<li><a href="<?= base_url('authors')?>">Authors</a></li>
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
</div>


<div class="uk-inline uk-position-top-left uk-margin-small-top uk-margin-small-left" style="position: fixed!important;z-index:999;">
	<a class="uk-background-default uk-padding-small uk-visible@m" uk-icon="icon:arrow-left;ratio:2"></a>
	<a class="uk-background-default uk-padding-small uk-hidden@m" uk-icon="icon:arrow-left;ratio:1"></a>
</div>