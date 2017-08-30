 <div class="uk-margin-xlarge-top uk-container uk-container-large">
 <div id="dashboard-header" class="uk-dark uk-background-muted uk-padding">
 	<img class="uk-align-left" src="https://placehold.it/150x220" alt="">
 	<h2 class="uk-margin-remove uk-margin-small-top">
 		When The Cold Wind Blows
 	</h2>

 	<p class="uk-margin-small-top uk-width-xlarge uk-text-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Orci a scelerisque purus semper eget duis. Lorem donec massa sapien faucibus et. Non tellus orci ac auctor augue mauris. Suspendisse faucibus interdum posuere lorem ipsum dolor sit.</p>

 	<a class="uk-button uk-button-secondary uk-margin-small-top">Edit Info</a>
 	<a class="uk-button uk-button-secondary uk-margin-small-top">Share</a>
 	<a class="uk-button uk-button-secondary uk-margin-small-top">Delete</a>
 	<a class="uk-button uk-button-secondary uk-margin-small-top">PDF</a>

 	<div class="uk-position-right uk-margin-large-right uk-flex uk-flex-middle uk-visible@l">
 		<div class="uk-padding-small uk-text-uppercase"><h1 class="uk-margin-remove">2</h1>Chapters</div>
 		<div class="uk-padding-small uk-text-uppercase"><h1 class="uk-margin-remove">2</h1>Characters</div>
 		<div class="uk-padding-small uk-text-uppercase"><h1 class="uk-margin-remove">2</h1>Comments</div>
 	</div>
 	
 </div>

 <div id="chapter" class="uk-margin-large-top uk-container uk-container-small uk-padding-large">
 	<div class="uk-margin">
 		<input class="uk-input uk-form-large" type="text" placeholder="Chapter Name">
 	</div>

 	<div class="uk-margin">
 		<textarea class="uk-textarea" rows="5" placeholder="Textarea">Write Your Chapter Description Here</textarea>
 	</div>

 	<a class="uk-button uk-button-secondary">Save Chapter</a>

 	<a class="uk-button uk-button-secondary">Delete Chapter</a>


 	<div class="uk-margin-medium-top">
 		<h1 class="uk-heading-divider">
 			<span>Sections</span>
 			<a class="uk-icon-button uk-float-right uk-background-secondary uk-light uk-margin-medium-top" uk-icon="icon: plus; ratio: .7" title="Add Sections" uk-tooltip uk-toggle="target: #new-section"></a>
 		</h1>


 		<div class="uk-inline uk-display-block">
 			<h3 class="uk-text-uppercase">
 				<span class="uk-margin-large-right">01.</span> Prolog
 			</h3>
 			<div class="uk-position-right uk-margin-medium-right">
 				<a class="uk-icon-button" uk-icon="icon: file-edit; ratio: .7" title="Edit" uk-tooltip></a>
 				<a class="uk-icon-button" uk-icon="icon: trash; ratio: .7" title="Delete" uk-tooltip></a>
 			</div>
 		</div>
 		<div class="uk-inline uk-display-block">
 			<h3 class="uk-text-uppercase">
 				<span class="uk-margin-large-right">01.</span> Prolog
 			</h3>
 			<div class="uk-position-right uk-margin-medium-right">
 				<a class="uk-icon-button" uk-icon="icon: file-edit; ratio: .7" title="Edit" uk-tooltip></a>
 				<a class="uk-icon-button" uk-icon="icon: trash; ratio: .7" title="Delete" uk-tooltip></a>
 			</div>
 		</div>
 		<div class="uk-inline uk-display-block">
 			<h3 class="uk-text-uppercase">
 				<span class="uk-margin-large-right">01.</span> Prolog
 			</h3>
 			<div class="uk-position-right uk-margin-medium-right">
 				<a class="uk-icon-button" uk-icon="icon: file-edit; ratio: .7" title="Edit" uk-tooltip></a>
 				<a class="uk-icon-button" uk-icon="icon: trash; ratio: .7" title="Delete" uk-tooltip></a>
 			</div>
 		</div>

 	</div>
 </div>

 <div id="new-section" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title">New Section</h2>
        <div class="uk-margin">
            <textarea class="uk-textarea" rows="5" placeholder="Textarea">Section Description Here</textarea>
        </div>

        <a class="uk-button uk-button-secondary" id="btnNewSection">Continue</a>

    </div>
</div>
