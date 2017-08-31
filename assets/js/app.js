jQuery(document).ready(function($) {

var API = 'http://localhost:8088/Wordies/API/';

	$("#chapters, #story-people").niceScroll({
		cursoropacitymin:0.4,
		autohidemode:'leave'
	});

	$.ajax({
      type: "POST",
      dataType: "json",
      url: API + "basic/notifications",
      success: function(data) {
        if(data.length > 0) {
        	if(data[0].message = 1) {
	        	if(data[0].notifications != 0) {
	        		$(".cnotif").removeClass("uk-hidden");
	        		$(".cnotif").text(data[0].notifications);
	        	}
	        	if(comments[0].notifications != 0) {
	        		$(".ccomment").removeClass("uk-hidden");
	        		$(".ccomment").text(data[0].comments);
	        	}
	        	if(data[0].messages != 0) {
	        		$(".cmessage").removeClass("uk-hidden");
	        		$(".cmessage").text(data[0].messages);
	        	}
	        }
        }
      }
    });
});