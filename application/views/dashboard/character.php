
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=65pj8yn21zggc1ysu5bfgkk2l45vne0mn4fj3tcgh1lr0a8n"></script>

<div class="uk-margin-xlarge-top uk-container uk-container-large">
	
<?php $this->load->view('dashboard/story_header');?>


	<div id="chapter" class="uk-container uk-container-small uk-margin-large">

		<a class="uk-button uk-button-secondary uk-margin-large-bottom" href="<?= base_url('dashboard/story/'.$story[0]->id) ?>"><span uk-icon="icon: arrow-left"></span> Back to Story</a>


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



		<div class="uk-margin-large-top uk-margin-large-bottom">
			<h1 class="uk-heading-divider">
				<span>Relationships</span>
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
							<a class="uk-icon-button" uk-icon="icon: file-edit; ratio: .7" title="Edit" href="<?= base_url('dashboard/relation/'.$relations[$i]->id) ?>"></a>
							<a class="btnDelete uk-icon-button" uk-icon="icon: trash; ratio: .7" title="Delete" uk-tooltip target="relation" target-id="<?php echo $relations[$i]->id ?>" uk-toggle="target: #delete"></a>
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
		<div class="uk-margin">
			<select class="uk-input characters" name="character" id="charid2">

			</select>
		</div>
		<div class="uk-margin">
			<textarea class="tinymce uk-textarea" rows="5" placeholder="Textarea" id="rel-desc" required placeholder="Description of the characters' relationship"></textarea>
		</div>
		<input type="hidden" name="id" id="charid1" value="<?php echo $id?>">
		<input type="submit" value="Add New Relation" class="uk-button uk-button-secondary" id="btnAddRelation">

	</div>
</div>

<div id="delete" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-text-center">
    <button class="uk-modal-close-default" type="button" uk-close></button>
    <p>Are you sure you want to delete this?</p>
    <a class="uk-button uk-button-secondary" id="btnDeleteFinal">Yes</a>
    <a class="uk-button uk-button-default uk-modal-close">No</a>
  </div>
</div>


<script>
	var iTotalWords;
	var id = $("#id").val();
	var story_id = $("#story_id").val();
  	var target = '';
  	var targetid = '';

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
			}
		});
	}


	window.setInterval(function(){
		autosave();
	}, 60000);


	$( "#btnSave" ).click(function() {
		autosave();
	});
	$( "#btnAddRelation" ).click(function() {
		var char2 = $("#charid2").val();
		var char1 = $("#charid1").val();
		var desc = $("#rel-desc").val();
		$.ajax({
			type: "POST",
			data: {
				"char2": char2,
				"char1": char1,
				"desc": desc
			},
			dataType: "json",
			async: false,
			url: getBaseURL() + "dashboard/new_relation",
			success: function(data) {
				location.reload();
			}
		});
	});

  $( ".btnDelete" ).click(function() {
    target = $(this).attr("target");
    targetid = $(this).attr("target-id");
  });


  $( "#btnDeleteFinal" ).click(function() {
    $.ajax({
      type: "POST",
      data: {
        "id": targetid
      },
      dataType: "json",
      async: false,
      url: getBaseURL() + "dashboard/delete_" + target,
      success: function(data) {
        alert("Delete success.");
        if(target == "character") location.href = getBaseURL() + "dashboard";
        else location.reload();
      }
    });
  });
</script>