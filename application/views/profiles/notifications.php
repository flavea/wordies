
<div class="uk-container uk-container-small">
	<h2><span>Notifications</span></h2>
	<a class="readAll uk-button uk-button-secondary" type="0">Mark All As Read</a>
	<?php
	if(ISSET($notifications) && $notifications != null) {
		for($i = 0; $i < count($notifications); $i++) {
			?>
			<a href="<?= base_url($notifications[$i]->url) ?>"><?php echo $notifications[$i]->message ?></a>
			<hr>
			<?php
		}
	} else {
		echo "<center>You don't have any new notifications.</center>";
	}
	?>

</div>