<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=65pj8yn21zggc1ysu5bfgkk2l45vne0mn4fj3tcgh1lr0a8n"></script>
<div id="dashboard" class="uk-margin-large-top uk-padding-large">
<div id="chapter" class="uk-container uk-container-small uk-margin-large">
<h2 class="uk-modal-title">Update Relationship</h2>
<div class="uk-margin">
	<select class="uk-input characters" name="character" id="charid2">

	</select>
</div>
<div class="uk-margin">
	<textarea class="tinymce uk-textarea" rows="5" placeholder="Textarea" id="rel-desc" required><?php echo $relation[0]->desc ?></textarea>
</div>
<input type="hidden" name="id" id="id" value="<?php echo $id?>">
<input type="hidden" name="id" id="char1" value="<?php echo $relation[0]->char1 ?>">
<input type="hidden" name="id" id="char2" value="<?php echo $relation[0]->char2 ?>">
<input type="hidden" name="id" id="story_id" value="<?php echo $story[0]->id?>">
<input type="submit" value="Update Relationship" class="uk-button uk-button-secondary" id="btnUpdateRelation">
</div>
</div>


<script>
	var story_id = $("#story_id").val();
	var char1 = $("#char1").val();
	var char2 = $("#char2").val();

	tinymce.init({
		selector: '.tinymce',
		plugins: 'link paste contextmenu textpattern autolink wordcount autoresize paste',
		selection_toolbar: 'undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | h2 h3 blockquote'
	});


	$.ajax({
		type: "GET",
		dataType: "json",
		url: getBaseURL() + "dashboard/get_characters/" + story_id,
		success: function(data) {
			if(data.length > 0) {
				for(var i = 0; i < data.length; i++) {
					if((i+1) == char2) {
						var str = "<option value='" + data[i].id + "' selected>" + data[i].name + "</option>";
						$(".characters").append(str);
					}
					else if((i+1) != char1) {
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


	$( "#btnUpdateRelation" ).click(function() {
		tinyMCE.triggerSave();
		var id = $("#id").val();
		var char2 = $("#charid2").val();
		var desc = $("#rel-desc").val();
		$.ajax({
			type: "POST",
			data: {
				"id": id,
				"char2": char2,
				"desc": desc
			},
			dataType: "json",
			async: false,
			url: getBaseURL() + "dashboard/update_relation",
			success: function(data) {
				alert("Update success");
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