
 <div class="uk-container uk-container-small uk-margin-xlarge">
<h1 class="uk-margin-large-top">Fiction Types</h1>
<dl class="uk-description-list">
<?php foreach ($types as $type) {
	?>
    <dt><?= $type->category_name; ?></dt>
    <dd><?= $type->category_desc; ?></dd>
<?php
}
?>
</dl>
</div>