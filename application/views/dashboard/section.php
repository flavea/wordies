 
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector: 'div.tinymce',
		theme: 'inlite',
		plugins: 'link paste contextmenu textpattern autolink wordcount autoresize',
		selection_toolbar: 'undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | h2 h3 blockquote',
		inline: true
	});

	$(function() {
		var wordCounts = {};
		$("div.tinymce").keyup(function() {
			var iTotalWords = $("div.tinymce").text().split(' ').length;
			$(".words").html(iTotalWords + " Words");
		}).keyup();
	});
</script>

<div class="uk-margin-xlarge-top uk-container uk-container-large">
<div id="dashboard-header" class="uk-margin-large-top uk-dark uk-background-muted uk-padding uk-text-center@s">
		<h2 class="uk-margin-remove uk-margin-small-top">
			Chapter 01
		</h2>

		<p class="uk-margin-small-top uk-text-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Orci a scelerisque purus semper eget duis. Lorem donec massa sapien faucibus et. Non tellus orci ac auctor augue mauris. Suspendisse faucibus interdum posuere lorem ipsum dolor sit.</p>
	</div>


	<div id="chapter" class="uk-container uk-container-small uk-margin-large">

		<a class="uk-button uk-button-default">Save</a>
		<a class="uk-button uk-button-default">Delete</a>

		<div class="uk-margin">
			<input class="uk-input uk-form-large uk-form-blank" type="text" placeholder="Short Description">
		</div>


		<div class="uk-margin">
			<input class="uk-input uk-form-blank" type="text" placeholder="Characters Involved">
		</div>

		<div class="uk-margin">
			<div class="tinymce uk-input uk-form-blank">
				<p>Write your content section here.</p>
			</div>
			<div class="uk-text-right uk-text-small">
				<span class="words"></span>
			</div>
		</div>

		<a class="uk-button uk-button-default">Save</a>
		<a class="uk-button uk-button-default">Delete</a>
	</div>
</div>