
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
	var iTotalWords;
	tinymce.init({
		selector: 'div.tinymce',
		theme: 'inlite',
		plugins: 'link paste contextmenu textpattern autolink wordcount autoresize paste',
		selection_toolbar: 'undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | h2 h3 blockquote',
		inline: true
	});

	var API = 'http://localhost:8088/Wordies/Dashboard/';
	var dt = new Date();

	function autosave() {

		var id = <?php echo $id; ?>;
		var content = $(".tinymce").html();
		var desc = $("#desc").val();
		var characters = $("#characters").val();
		$.ajax({
			type: "POST",
			data: 
				"id": id,
				"content": content,
				"desc": desc,
				"characters": characters,
				"word_count": iTotalWords
			},
			dataType: "json",
			url: API + "save_character",
			success: function(data) {
				UIkit.notification({
					message: 'Saved',
					status: 'primary',
					pos: 'top-right',
					timeout: 5000
				});

				$('.save').html("Last Autosaved on " + dt.toLocaleString());
			}
		});
	}

	$( "#btnSave" ).click(function() {
		autosave();
	});

	window.setInterval(function(){
		autosave();
	}, 60000);

</script>
<div class="uk-margin-xlarge-top uk-container uk-container-large">
	<div id="dashboard-header" class="uk-dark uk-background-muted uk-padding">

		<?php if($story[0]->cover != null) { ?>
		<img class="uk-align-left" src="<?php echo $story[0]->cover ?>" alt="">
		<?php } else { ?>
		<img class="uk-align-left" src="https://placehold.it/150x220" alt="">
		<?php } ?>

		<h2 class="uk-margin-remove uk-margin-small-top">
			<?php echo $story[0]->title ?>
		</h2>

		<p class="uk-margin-small-top uk-width-xlarge uk-text-small"><?php echo $story[0]->desc ?></p>

		<a class="uk-button uk-button-secondary uk-margin-small-top">Edit Info</a>
		<a class="uk-button uk-button-secondary uk-margin-small-top">Add Tags</a>
		<a class="uk-button uk-button-secondary uk-margin-small-top" uk-toggle="target: #share">Share</a>
		<a class="uk-button uk-button-secondary uk-margin-small-top">Delete</a>
		<a class="uk-button uk-button-secondary uk-margin-small-top">PDF</a>

		<div class="uk-position-right uk-margin-large-right uk-flex uk-flex-middle uk-visible@l">
			<div class="uk-padding-small uk-text-uppercase"><h1 class="uk-margin-remove">2</h1>Chapters</div>
			<div class="uk-padding-small uk-text-uppercase"><h1 class="uk-margin-remove">2</h1>Characters</div>
			<div class="uk-padding-small uk-text-uppercase"><h1 class="uk-margin-remove">2</h1>Comments</div>
		</div>

	</div>




	<div id="chapter" class="uk-container uk-container-small uk-margin-large">
		<a class="uk-button uk-button-default" id="btnSave">Save</a>
		<a class="uk-button uk-button-default" id="btnDelete">Delete</a>
		<label class="uk-margin-small-top uk-display-block">Name</label>
		<input class="uk-input uk-form-large" type="text" placeholder="Character Name Name" value="<?php echo $character[0]->name ?>" name="name">

		<label class="uk-margin-small-top uk-display-block">Age</label>
		<input class="uk-input" type="number" name="age" value="<?php echo $character[0]->age ?>" placeholder="Age of Your Character">

		<label class="uk-margin-small-top uk-display-block">Gender</label>
		<select class="uk-select" name="gender">
			<option>Male</option>
			<option>Female</option>
			<option>Others</option>
		</select>

		<label class="uk-margin-small-top uk-display-block">Image</label>
		<input class="uk-input" type="text" name="face" value="<?php echo $character[0]->face ?>" placeholder="URL to an image of your character">

		<label class="uk-margin-small-top uk-display-block">Personality</label>
		<div id="personality" class="tinymce uk-form-blank uk-padding-small uk-placeholder uk-margin-remove">
			<?php if($character[0]->personality == null) { ?>
			<p>Describe Your Character's Personality Here</p>
			<?php } else {
				echo $section[0]->personality;
			} ?>
		</div>


		<label class="uk-margin-small-top uk-display-block">Physical Traits</label>
		<div id="physical" class="tinymce uk-form-blank uk-padding-small uk-placeholder uk-margin-remove">
			<?php if($character[0]->physical == null) { ?>
			<p>Describe Your Character's Physical Traits Here</p>
			<?php } else {
				echo $section[0]->physical;
			} ?>
		</div>

		<label class="uk-margin-small-top uk-display-block">Background</label>
		<div id="background" class="tinymce uk-form-blank uk-padding-small uk-placeholder uk-margin-remove">
			<?php if($character[0]->background == null) { ?>
			<p>Describe Your Character's Background Here</p>
			<?php } else {
				echo $section[0]->background;
			} ?>
		</div>
		<a class="uk-button uk-button-default" id="btnSave">Save</a>
		<a class="uk-button uk-button-default" id="btnDelete">Delete</a>


	</div>
</div>