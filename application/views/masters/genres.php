
 <div class="uk-container uk-container-small uk-margin-xlarge">
<h1 class="uk-margin-large-top">Ratings</h1>
<dl class="uk-description-list">
<?php foreach ($genres as $genre) {
	?>
    <dt><?= $genre->genre_name; ?></dt>
    <dd><?= $genre->genre_exp; ?></dd>
<?php
}
?>
</dl>
</div>