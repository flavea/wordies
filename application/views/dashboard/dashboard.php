<div id="dashboard" class="uk-margin-large-top uk-margin-large-bottom">

	<h2 class="category-title"><span>My Books</span></h2>

	<a class="uk-button uk-button-secondary uk-margin-medium-bottom" uk-toggle="target: #new-story"><span uk-icon="icon: plus-circle" class="uk-margin-small-right"></span> New Story</a>
	<a class="uk-button uk-button-secondary uk-margin-medium-bottom" href="#"><span uk-icon="icon: bolt" class="uk-margin-small-right"></span> Statistics</a>

	<div class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-3@l" uk-grid uk-height-match="target: > div > .uk-card">

		<?php for($i = 0; $i < 6; $i++) { ?>
		<div>
			<div class="uk-card uk-card-default">
				<div class="uk-card-header">
					<div class="uk-grid-small uk-flex-middle" uk-grid>
						<div class="uk-width-expand">
							<h3 class="uk-card-title uk-margin-remove-bottom"><a class="uk-link-reset" href="#">Title</a></h3>
							<p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">April 01, 2016</time></p>
						</div>
					</div>
				</div>
				<div class="uk-card-body">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
				</div>
				<div class="uk-card-footer">
				<a href="#" uk-icon="icon: file-edit"></a>
				<a href="#" uk-icon="icon: trash"></a>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>

	<h2 class="category-title"><span>Shared Books</span></h2>

	<div class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-3@l" uk-grid uk-height-match="target: > div > .uk-card">

		<?php for($i = 0; $i < 6; $i++) { ?>
		<div>
			<div class="uk-card uk-card-default">
				<div class="uk-card-header">
					<div class="uk-grid-small uk-flex-middle" uk-grid>
						<div class="uk-width-expand">
							<h3 class="uk-card-title uk-margin-remove-bottom"><a class="uk-link-reset" href="#">Title</a></h3>
							<p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">April 01, 2016</time></p>
						</div>
					</div>
				</div>
				<div class="uk-card-body">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
				</div>
				<div class="uk-card-footer">
				<a href="#" uk-icon="icon: file-edit"></a>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>

</div>

<div id="new-story" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title">New Story</h2>
        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="Title">
        </div>

        <div class="uk-margin">
            <select class="uk-select">
                <option>Private</option>
                <option>Public</option>
            </select>
        </div>

        <div class="uk-margin">
            <textarea class="uk-textarea" rows="5" placeholder="Textarea">Story Description Here</textarea>
        </div>

        <a class="uk-button uk-button-secondary" id="btnNewStory">Continue</a>

    </div>
</div>
