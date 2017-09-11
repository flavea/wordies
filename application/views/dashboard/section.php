 
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=65pj8yn21zggc1ysu5bfgkk2l45vne0mn4fj3tcgh1lr0a8n"></script>

<div class="uk-margin-large-top uk-container uk-container-large">
	<div id="dashboard-header" class="uk-margin-large-top uk-dark uk-background-muted uk-padding uk-text-center@s">
		<h2 class="uk-margin-remove uk-margin-small-top">
			<?php echo $chapter[0]->title ?>
		</h2>

		<p class="uk-margin-small-top uk-text-small"><?php echo $chapter[0]->content ?></p>
	</div>


	<div id="chapter" class="uk-container uk-container-small uk-margin-large">

		
		<a class="uk-button uk-button-default btnSave" id="btnSave">Save</a>
		<a class="uk-button uk-button-default" id="btnDelete">Delete</a>

		<div class="uk-margin-small-top">
			<input class="uk-input uk-form-large uk-form-blank uk-placeholder" type="text" placeholder="Short Description" id="desc" value="<?php echo $section[0]->desc ?>">
		</div>


		<div class="uk-margin-small-top">
			<input class="uk-input uk-form-blank uk-placeholder" type="text" id="characters" placeholder="Characters Involved" value="<?php echo $section[0]->characters ?>">
		</div>

		<div class="uk-margin-small-top">
			<div class="tinymce uk-form-blank uk-padding-small uk-placeholder">
				<?php if($section[0]->content == null) { ?>
				<p>Write your content section here.</p>
				<?php } else {
					echo $section[0]->content;
				} ?>
			</div>
			<div class="uk-float-left uk-text-small">
				<span class="save"></span>
			</div>
			<div class="uk-text-right uk-text-small">
				<span class="words"></span>
			</div>
			<input type="hidden" id="id" value="<?php echo $id ?>">

			<input type="hidden" id="story_id" value="<?php echo $story[0]->id ?>">
		</div>
		<br>
		<a class="uk-button uk-button-default btnSave" id="btnSave">Save</a>
		<a class="uk-button uk-button-default" id="btnDelete">Delete</a>
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

	$(function() {
		var wordCounts = {};
		$("div.tinymce").keyup(function() {
			iTotalWords = $("div.tinymce").text().split(' ').length;
			$(".words").html(iTotalWords + " Words");
		}).keyup();
	});
	$( function() {
		$.ajax({
			type: "GET",
			dataType: "json",
			url: getBaseURL() + "dashboard/get_characters/" + story_id,
			success: function(data) {
				if(data.length > 0) {
					console.log(data);
					for(var i = 0; i < data.length; i++) {
						availableTags.push(data[i].name);
					}
				}
			}
		});
		function split( val ) {
			return val.split( /,\s*/ );
		}
		function extractLast( term ) {
			return split( term ).pop();
		}

		$( "#characters" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
      	if ( event.keyCode === $.ui.keyCode.TAB &&
      		$( this ).autocomplete( "instance" ).menu.active ) {
      		event.preventDefault();
      }
  })
      .autocomplete({
      	minLength: 0,
      	source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
          	availableTags, extractLast( request.term ) ) );
      },
      focus: function() {
          // prevent value inserted on focus
          return false;
      },
      select: function( event, ui ) {
      	var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
      }
  });


      function autosave() {

      	var content = $(".tinymce").html();
      	var desc = $("#desc").val();
      	var characters = $("#characters").val();
      	$.ajax({
      		type: "POST",
      		data: {
      			"id": id,
      			"content": content,
      			"desc": desc,
      			"characters": characters,
      			"word_count": iTotalWords
      		},
      		dataType: "json",
      		url: getBaseURL() + "dashboard/save_section",
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


      window.setInterval(function(){
      	autosave();
      }, 60000);


      $( ".btnSave" ).click(function() {
      	autosave();
      });
  });
</script>