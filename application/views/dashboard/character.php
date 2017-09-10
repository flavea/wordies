
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

<div class="uk-margin-xlarge-top uk-container uk-container-large">
	<div id="dashboard-header" class="uk-dark uk-background-muted uk-padding">

		<?php if($story[0]->cover != null) { ?>
		<img class="uk-align-left" src="<?php echo $story[0]->cover ?>" alt="" width="150">
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
		<label class="uk-margin-small-top uk-display-block">Name</label>
		<input class="uk-input uk-form-large" type="text" placeholder="Character Name Name" value="<?php echo $character[0]->name ?>" name="name" id="name">

		<label class="uk-margin-small-top uk-display-block">Age</label>
		<input class="uk-input" type="number" name="age" value="<?php echo $character[0]->age ?>" placeholder="Age of Your Character" id="age">

		<label class="uk-margin-small-top uk-display-block">Gender</label>
		<select class="uk-select" name="gender" id="gender">
			<option value="M">Male</option>
			<option value="F">Female</option>
			<option value="0">Others</option>
		</select>

		<label class="uk-margin-small-top uk-display-block">Image</label>
		<input class="uk-input" type="text" name="face" value="<?php echo $character[0]->face ?>" placeholder="URL to an image of your character" id="face">

		<label class="uk-margin-small-top uk-display-block">Personality</label>
		<div id="personality" class="tinymce uk-form-blank uk-padding-small uk-placeholder uk-margin-remove">
			<?php if($character[0]->personality == null) { ?>
			<p>Describe Your Character's Personality Here</p>
			<?php } else {
				echo $character[0]->personality;
			} ?>
		</div>


		<label class="uk-margin-small-top uk-display-block">Physical Traits</label>
		<div id="physical" class="tinymce uk-form-blank uk-padding-small uk-placeholder uk-margin-remove">
			<?php if($character[0]->physical == null) { ?>
			<p>Describe Your Character's Physical Traits Here</p>
			<?php } else {
				echo $character[0]->physical;
			} ?>
		</div>

		<label class="uk-margin-small-top uk-display-block">Background</label>
		<div id="background" class="tinymce uk-form-blank uk-padding-small uk-placeholder uk-margin-remove">
			<?php if($character[0]->background == null) { ?>
			<p>Describe Your Character's Background Here</p>
			<?php } else {
				echo $character[0]->background;
			} ?>
		</div>

		<label class="uk-margin-small-top uk-display-block">Other Information</label>
		<div id="other" class="tinymce uk-form-blank uk-padding-small uk-placeholder uk-margin-remove">
			<?php if($character[0]->other == null) { ?>
			<p>Describe Your Character's Other Informations</p>
			<?php } else {
				echo $character[0]->other;
			} ?>
		</div>
		<div class="uk-margin">
			<input type="hidden" name="id" id="id" value="<?php echo $id?>">
			<input type="hidden" name="story_id" id="story_id" value="<?php echo $story[0]->id?>">
		</div>
		<a class="uk-button uk-button-default" id="btnSave">Save</a>
		<a class="uk-button uk-button-default" id="btnDelete">Delete</a>



		<div class="uk-margin-medium-top">
			<h1 class="uk-heading-divider">
				<span>Sections</span>
				<a class="uk-icon-button uk-float-right uk-background-secondary uk-light uk-margin-medium-top" uk-icon="icon: plus; ratio: .7" title="Add Sections" uk-tooltip uk-toggle="target: #new-relation"></a>
			</h1>

			<?php if(isset($relations) && $relations != null) {
				for($i = 0; $i < count($relations); $i++) { 
					?>
					<div class="uk-inline uk-display-block">
						<h3 class="uk-text-uppercase">
							<?php echo $relations[$i]->name ?>
						</h3>
						<div class="uk-position-right uk-margin-medium-right">
							<a class="uk-icon-button" uk-icon="icon: file-edit; ratio: .7" title="Edit" href="<?= base_url('dashboard/section/'.$relations[$i]->id) ?>"></a>
							<a class="uk-icon-button" uk-icon="icon: trash; ratio: .7" title="Delete" uk-tooltip chid="<?php echo $relations[$i]->id ?>"></a>
						</div>
						
						<?php echo $relations[$i]->desc ?>
					</div>
					<?php 
				}
			} else {
				echo 'There is no relationships yet.';
			}
			?>

		</div>
	</div>
</div>



<div id="new-relation" uk-modal>
	<div class="uk-modal-dialog uk-modal-body">
		<button class="uk-modal-close-default" type="button" uk-close></button>
		<h2 class="uk-modal-title">New Relationship</h2>
		<?php echo form_open("dashboard/new_relation");?>
		<div class="uk-margin">
			<select class="uk-input characters" name="character" required>

			</select>
		</div>
		<div class="uk-margin">
			<textarea class="uk-textarea" rows="5" placeholder="Textarea" name="desc" required placeholder="Description of the characters' relationship"></textarea>
		</div>
		<input type="hidden" name="id" id="id" value="<?php echo $id?>">
		<input type="submit" value="Add New Relation" class="uk-button uk-button-secondary">
		<?php echo form_close();?>

	</div>
</div>


<script>
	var iTotalWords;
	var id = $("#id").val();
	var story_id = $("#story_id").val();

	var dt = new Date();
	var availableTags = [];
	tinymce.init({
		selector: 'div.tinymce',
		theme: 'inlite',
		plugins: 'link paste contextmenu textpattern autolink wordcount autoresize paste',
		selection_toolbar: 'undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | h2 h3 blockquote',
		inline: true
	});


	$.ajax({
		type: "GET",
		dataType: "json",
		url: getBaseURL() + "dashboard/get_characters/" + story_id,
		success: function(data) {
			if(data.length > 0) {
				for(var i = 0; i < data.length; i++) {
					if((i+1) != id) {
						var str = "<option value='" + data[i].id + "'>" + data[i].name + "</option>";
						$(".characters").append(str);
					}
				}
			} else {
				var str = "You have to add other characters first.";
				$(".characters").append(str);
			}
		}
	});

	function autosave() {

		var name = $("#name").val();
		var age = $("#age").val();
		var gender = $("#gender").val();
		var physical = $("#physical").html();
		var personality = $("#personality").html();
		var background = $("#background").html();
		var face = $("#face").val();
		var other = $("#other").html();
		$.ajax({
			type: "POST",
			data: {
				"id": id,
				"name": name,
				"age": age,
				"gender": gender,
				"physical": physical,
				"personality": personality,
				"background": background,
				"face": face,
				"other": other
			},
			dataType: "json",
			url: getBaseURL() + "dashboard/save_character",
			success: function(data) {
				UIkit.notification({
					message: 'Saved',
					pos: 'top-right',
					timeout: 5000
				});

				$('.save').html("Last Autosaved on " + dt.toLocaleString());
			}
		});
	}


	window.setInterval(function(){
		autosave();
	}, 60000);


	$( "#btnSave" ).click(function() {
		autosave();
	});
</script>