
function getBaseURL () {
	var API;
	var host = location.hostname;
	if(host.toLowerCase().indexOf("localhost") >= 0) {
		API = location.protocol + "//" + location.hostname + (location.port && ":" + location.port) + "/wordies/";
	} else {
		API = location.protocol + "//" + location.hostname + (location.port && ":" + location.port) + "/";
	}
	return API;
}


jQuery(document).ready(function($) {

	$("#chapters, #story-people").niceScroll({
		cursoropacitymin:0.4,
		autohidemode:'leave'
	});

	$.ajax({
		type: "POST",
		dataType: "json",
		url: getBaseURL() + "API/basic/notifications",
		success: function(data) {
			console.log(data);
			if(data.notifications != 0) {
				$(".cnotif").removeClass("uk-hidden");
				$(".cnotif").text(data.notifications);
			}
			if(data.comments != 0) {
				$(".ccomment").removeClass("uk-hidden");
				$(".ccomment").text(data.comments);
			}
			if(data.messages != 0) {
				$(".cmessage").removeClass("uk-hidden");
				$(".cmessage").text(data.messages);
			}
			if(data.total != 0) {
				$(".ctotal").removeClass("uk-hidden");
				$(".ctotal").text(data.messages);

			}
		}
	});


	$( ".readAll" ).click(function() {
		var type = $(this).attr("type");
		$.ajax({
			type: "POST",
			dataType: "json",
			url: getBaseURL() + "master/read_all/" + type,
			success: function(data) {
				location.reload();
			}
		});
	  });

	$( "#search-button" ).click(function() {
	    location.href= getBaseURL() + 'stories/index/1/0/0/0/0/' + $("#search-input").val();
  });
});