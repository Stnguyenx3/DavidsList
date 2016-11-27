$(document).ready(function () {
	var str = (window.location + '').split("/");
	var userId = str[str.length - 1];
	var listingId = str[str.length - 2];
	$.ajax({
		type:'GET',
		url: url+"messages/getconversation/"+userId+"/"+listingId,
		dataType: "json",
		success: formatConversation,
		error: function(xhr, err, errThrown) {
			console.log("I failed");
			console.log(err);
			console.log(errThrown);
		}
	});

});

function formatConversation(event) {
	console.log(event);

	$(document).ready(function() {
		for (var i in event){
			var row0 = $("<div></div>").addClass("row user-listing linear-gradient-bg custom-border").appendTo($("#allListingMessages"));

		}
	});
}

function onClickSend() {

}