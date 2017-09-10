
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