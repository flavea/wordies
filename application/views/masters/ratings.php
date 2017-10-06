
 <div class="uk-container uk-container-small uk-margin-xlarge">
<h1 class="uk-margin-large-top">Ratings</h1>
<dl class="uk-description-list">
<?php foreach ($ratings as $rating) {
	?>
    <dt><?= $rating->rating_name; ?></dt>
    <dd><?= $rating->rating_explanation; ?></dd>
<?php
}
?>
</dl>
</div>