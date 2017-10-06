
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php if(isset($story) && $story != null) {?>

<div class="uk-margin-xlarge-top uk-container uk-container-large">
  <?php $this->load->view('dashboard/story_header');?>

  <div id="dashboard" class="uk-margin-large-top uk-padding-large">


    <div class="uk-child-width-1-1@s uk-child-width-1-2@l" uk-grid>
     <div class="uk-inline">
      <h1 class="uk-heading-divider">
       <span>Chapters</span>
       <?php if($permission > 2) { ?>
       <a class="uk-icon-button uk-float-right uk-background-secondary uk-light uk-margin-medium-top" uk-icon="icon: plus; ratio: .7" title="Add Chapter" uk-tooltip uk-toggle="target: #new-chapter"></a>
       <?php } ?>
     </h1>

     <?php if(isset($chapters) && $chapters != null) {
      for($i = 0; $i < count($chapters); $i++) {
        ?>
        <div class="uk-inline uk-display-block">
         <h3 class="uk-text-uppercase">
          <span class="uk-margin-large-right">
            <?php if ($i < 10) echo "0".($i+1).".";
            else echo ($i+1)."."; ?>
          </span> 
          <?php echo $chapters[$i]->title ?>
        </h3>
        <div class="uk-position-right uk-margin-medium-right">
          <a class="uk-icon-button" uk-icon="icon: file-edit; ratio: .7" title="Edit" href="<?= base_url('chapter/'.$chapters[$i]->id) ?>"></a>
          <?php if($permission > 3) { ?>
          <a class="btnDelete uk-icon-button" uk-icon="icon: trash; ratio: .7" title="Delete" uk-tooltip  target="chapter" target-id="<?php echo $chapters[$i]->id ?>" uk-toggle="target: #delete"></a>
          <?php } ?>
        </div>
      </div>
      <?php 
    }
  } else {
    echo "<br>There is no chapters yet.";
  } 
  ?>

</div>
<div>
  <h1 class="uk-heading-divider">
   <span>Characters</span>
   <?php if($permission > 2) { ?>
   <a class="uk-icon-button uk-float-right uk-background-secondary uk-light uk-margin-medium-top" uk-icon="icon: plus; ratio: .7" title="Add Character" uk-tooltip uk-toggle="target: #new-character"></a>
   <?php } ?>
 </h1>


 <?php if(isset($characters) && $characters != null) {
  foreach ($characters as $char) {
    ?>
    <div class="uk-inline uk-display-block">
     <h3 class="uk-text-uppercase">
       <?php echo $char->name ?>
     </h3>
     <div class="uk-position-right uk-margin-medium-right">
      <a class="uk-icon-button" uk-icon="icon: file-edit; ratio: .7" title="Edit" uk-tooltip href="<?= base_url('character/'.$char->id) ?>"></a>      
      <?php if($permission > 3) { ?>
      <a class="btnDelete uk-icon-button" uk-icon="icon: trash; ratio: .7" title="Delete" uk-tooltip  target="character" target-id="<?php echo $char->id ?>" uk-toggle="target: #delete"></a>
      <?php } ?>
    </div>
  </div>

  <?php 
}
} else {
  echo "<br>There is no characters yet.";
} 
?>
</center>
</div>
</div>

<div class="uk-margin-medium-top">
 <h1 class="uk-heading-divider">
  <span>Resources</span>   
  <?php if($permission > 2) { ?>
  <a class="uk-icon-button uk-float-right uk-background-secondary uk-light uk-margin-medium-top" uk-icon="icon: plus; ratio: .7" title="Add Resource" uk-tooltip uk-toggle="target: #new-resources"></a>
  <?php } ?>
</h1>



<div class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-3@l" uk-grid uk-height-match="target: > div > .uk-card">

 <?php if(isset($resources) && $resources != null) {
  foreach ($resources as $res) {
    ?>
    <div>
     <div class="uk-card uk-card-default uk-display-block" href="">
      <div class="uk-card-header" uk-lightbox>
       <h3 class="uk-card-title uk-margin-remove-bottom"><a class="uk-link-reset" href="<?php echo $res->link ?>"><?php echo $res->name ?></a></h3>
     </div>
     <div class="uk-card-body">
       <p><?php echo $res->description ?></p>
     </div>
     <div class="uk-card-footer">
       <a class="uk-icon-button" href="<?= base_url('resource/'.$res->id) ?>" uk-icon="icon: file-edit"></a>
       <?php if($permission > 3) { ?>
       <a class="btnDelete uk-icon-button" uk-icon="icon: trash; ratio: .7" title="Delete" uk-tooltip  target="resource" target-id="<?php echo $res->id ?>" uk-toggle="target: #delete"></a>
       <?php } ?>
     </div>
   </div>
 </div>

 <?php 
}
} else {
  echo "<br><center>There is no resources yet.</center>";
} 
?>
</div>


</div>
</div>

<?php if($permission > 2) { ?>
<div id="new-chapter" uk-modal>
  <div class="uk-modal-dialog uk-modal-body">
    <button class="uk-modal-close-default" type="button" uk-close></button>
    <h2 class="uk-modal-title">New Chapter</h2>

    <?php echo form_open("dashboard/new_chapter");?>
    <div class="uk-margin">
      <input class="uk-input" type="text" placeholder="Chapter Name" name="title">
    </div>

    <div class="uk-margin">
      <select class="uk-select" name="status">
        <option value="0">Private</option>
        <option value="1">Public</option>
      </select>
    </div>

    <div class="uk-margin">
      <textarea class="uk-textarea" rows="5" placeholder="Textarea" name="desc">Chapter Description Here</textarea>
    </div>

    <input type="hidden" name="story_id" value="<?php echo $id; ?>">
    <input type="submit" value="Create New Chapter" class="uk-button uk-button-secondary">
    <?php echo form_close();?>

  </div>
</div>

<div id="new-character" uk-modal>
  <div class="uk-modal-dialog uk-modal-body">
    <button class="uk-modal-close-default" type="button" uk-close></button>
    <h2 class="uk-modal-title">New Character</h2>
    <?php echo form_open("dashboard/new_character");?>
    <div class="uk-margin">
      <input class="uk-input" type="text" placeholder="Character Name" name="name">
    </div>

    <input type="hidden" name="story_id" value="<?php echo $id; ?>">
    <input type="submit" value="Create New Character" class="uk-button uk-button-secondary">
    <?php echo form_close();?>

  </div>
</div>

  <div id="new-resources" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
      <button class="uk-modal-close-default" type="button" uk-close></button>
      <h2 class="uk-modal-title">New Resource</h2>
      <?php echo form_open("dashboard/new_resource");?>
      <div class="uk-margin">
        <input class="uk-input" type="text" placeholder="Title" name="title" required>
      </div>

      <div class="uk-margin">
        <input class="uk-input" type="text" placeholder="Link" name="link">
      </div>

      <div class="uk-margin">
        <textarea class="uk-textarea" rows="5" placeholder="Textarea" name="desc">Description</textarea>
      </div>

      <input type="hidden" name="story_id" value="<?php echo $id; ?>">
      <input type="submit" value="Create New Resource" class="uk-button uk-button-secondary">
      <?php echo form_close();?>

    </div>
  </div>

<div id="tags" uk-modal>
  <div class="uk-modal-dialog uk-modal-body">
    <button class="uk-modal-close-default" type="button" uk-close></button>
    <h2 class="uk-modal-title">Manage Tags</h2>
    <div id="tags-list">
      <?php if(isset($tags) && $tags != null) {
        foreach($tags as $tag) {
          ?>
          <span class='uk-label' id='tag<?=$tag->id?>'><?=$tag->tag?><a class='deleteTag' tagID='<?=$tag->id?>' uk-close></a></span>
          <?php   
        }}?>
      </div>
      <div class="uk-margin">
        <input class="uk-input" type="text" placeholder="Tags" id="tag-name">
      </div>

      <input type="hidden" id="story_id" value="<?php echo $id; ?>">
      <input type="submit" value="Add Tag" id="btnAddTag" class="uk-button uk-button-secondary">
      <?php echo form_close();?>

    </div>
  </div>


<?php if($permission > 4) { ?>
  <div id="share" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
      <button class="uk-modal-close-default" type="button" uk-close></button>
      <h2 class="uk-modal-title">Share Story</h2>
      <div id="shares-list">

        <?php if(isset($shares) && $shares != null) {
          foreach($shares as $s) {
            ?>
            <span class='uk-label uk-display-block uk-margin-small-bottom uk-padding-small' id='share<?=$s->id?>'><?=$s->username?> 
              <?php 
              if($s->permission == 1) echo "(View Only)";
              if($s->permission == 2) echo "(View and Edit Only)";
              if($s->permission == 3) echo "(View, Add, and Edit Only)";
              if($s->permission == 4) echo "(View, Add, Edit, and Delete)";
              ?>
              <a class='deleteShare uk-float-right' shareID='<?=$s->id?>' uk-close></a></span>
              <?php   
            }}?>
          </div>
          <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="User's Username" id="usernames">
          </div>

          <div class="uk-margin">
            <select id="permission" class="uk-select">
              <option value="1">View Only</option>
              <option value="2">View and Edit</option>
              <option value="3">View, Add, and Edit</option>
              <option value="4">View, Add, Edit, and Delete</option>
            </select>
          </div>
          <input type="hidden" name="story_id" value="<?php echo $id; ?>">
          <a class="uk-button uk-button-secondary" id="btnShare">Share</a>

        </div>
      </div>
 <?php } ?>

      <div id="delete" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-text-center">
          <button class="uk-modal-close-default" type="button" uk-close></button>
          <p>Are you sure you want to delete this?</p>
          <a class="uk-button uk-button-secondary" id="btnDeleteFinal">Yes</a>
          <a class="uk-button uk-button-default uk-modal-close">No</a>
        </div>
      </div>
<?php } ?>
      <?php } ?>

      <script type="text/javascript">
        var target = '';
        var targetid = '';
        var availableTags = [];
        var users = [];

        $.ajax({
          type: "GET",
          dataType: "json",
          url: getBaseURL() + "dashboard/get_tags/",
          success: function(data) {
            if(data.length > 0) {
              for(var i = 0; i < data.length; i++) {
                availableTags.push(data[i].tag);
              }
            }
          }
        });
        $.ajax({
          type: "GET",
          dataType: "json",
          url: getBaseURL() + "dashboard/get_authors/",
          success: function(data) {
            if(data.length > 0) {
              for(var i = 0; i < data.length; i++) {
                users.push(data[i].username);
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

        $( "#tag-name" )
        .on( "keydown", function( event ) {
          if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
            event.preventDefault();
        }
      })
        .autocomplete({
          minLength: 0,
          source: function( request, response ) {
            response( $.ui.autocomplete.filter(
              availableTags, extractLast( request.term ) ) );
          },
          focus: function() {
            return false;
          },
          select: function( event, ui ) {
            this.value = ui.item.value;
            UIkit.modal("#tags").hide();
            UIkit.modal("#tags").show();
          }
        });
        $( "#usernames" )
        .on( "keydown", function( event ) {
          if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
            event.preventDefault();
        }
      })
        .autocomplete({
          minLength: 0,
          source: function( request, response ) {
            response( $.ui.autocomplete.filter(
              users, extractLast( request.term ) ) );
          },
          focus: function() {
            return false;
          },
          select: function( event, ui ) {
            this.value = ui.item.value;
            UIkit.modal("#share").hide();
            UIkit.modal("#share").show();
          }
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
              if(target == "story") location.href = getBaseURL() + "dashboard";
              else location.reload();
            }
          });
        });

        $( "#btnAddTag" ).click(function() {
          $.ajax({
            type: "POST",
            data: {
              "tag": $("#tag-name").val(),
              "story_id": $("#story_id").val()
            },
            dataType: "json",
            async: false,
            url: getBaseURL() + "dashboard/add_tag",
            success: function(data) {
              $("#tags-list").append("<span class='uk-label' id='tag" + data.tagID +  "'>" + $("#tag-name").val() + "<a class='deleteTag' tagID='" + data.tagID + "' uk-close></a></span>");
              $("#tag-name").val("");

              $( ".deleteTag" ).click(function() {
                $tag = $(this).attr('tagID');
                $.ajax({
                  type: "POST",
                  data: {
                    "tag": $tag,
                    "story_id": $("#story_id").val()
                  },
                  dataType: "json",
                  async: false,
                  url: getBaseURL() + "dashboard/remove_tag",
                  success: function(data) {
                    $("#tag" + $tag).hide();
                  }
                });
              });
            }
          });
        });
        $( "#btnShare" ).click(function() {
          var username = $("#usernames").val();
          var permission = $("#permission").val();
          $.ajax({
            type: "POST",
            data: {
              "username": username,
              "permission": permission,
              "story_id": $("#story_id").val()
            },
            dataType: "json",
            async: false,
            url: getBaseURL() + "dashboard/share",
            success: function(data) {
              var p;
              if(permission == 1) {
                p = "(view only";
              }
              if(permission == 2) {
                p = "(view and edit only";
              }
              if(permission == 3) {
                p = "(view, add, and edit only";
              }
              if(permission == 4) {
                p = "(view, add, edit, and delete";
              }
              $("#shares-list").append("<span class='uk-label uk-display-block uk-margin-small-bottom uk-padding-small' id='share" + data.shareID +  "'>" + username + " (" + p + ") <a class='deleteShare uk-float-right' shareID='" + data.shareID + "' uk-close></a></span>");
              $("#usernames").val("");

              $( ".deleteShare" ).click(function() {
                $tag = $(this).attr('shareID');
                $.ajax({
                  type: "POST",
                  data: {
                    "id": $tag,
                  },
                  dataType: "json",
                  async: false,
                  url: getBaseURL() + "dashboard/remove_share",
                  success: function(data) {
                    $("#share" + $tag).removeClass("uk-display-block");
                    $("#share" + $tag).hide();
                  }
                });
              });
            }
          });
        });


        $( ".deleteTag" ).click(function() {
          $tag = $(this).attr('tagID');
          $.ajax({
            type: "POST",
            data: {
              "tag": $tag,
              "story_id": $("#story_id").val()
            },
            dataType: "json",
            async: false,
            url: getBaseURL() + "dashboard/remove_tag",
            success: function(data) {
              $("#tag" + $tag).hide();
            }
          });
        });
        $( ".deleteShare" ).click(function() {
          $tag = $(this).attr('shareID');
          $.ajax({
            type: "POST",
            data: {
              "id": $tag,
            },
            dataType: "json",
            async: false,
            url: getBaseURL() + "dashboard/remove_share",
            success: function(data) {
              $("#share" + $tag).removeClass("uk-display-block");
              $("#share" + $tag).hide();
            }
          });
        });
      </script>