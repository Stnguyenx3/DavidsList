$(document).ready(function () {
	var str = (window.location + '').split("/");
	var listingId = str[str.length - 1];
	$.ajax({
		type:'GET',
		url: url+"messages/getmessagesthread/"+listingId,
		dataType: "json",
		success: formatAllListingMessages,
		error: function(xhr, err, errThrown) {
			console.log("I failed");
			console.log(err);
			console.log(errThrown);
		}
	});

});

function formatAllListingMessages(event) {

	console.log(event);

	$(document).ready(function() {

		for (var i in event){

			var row0 = $("<div></div>").addClass("row user-listing linear-gradient-bg custom-border").appendTo($("#allListingMessages"));

			//Add unique ID for each row (remove if not needed!)
			$(row0).attr("id", "message-thread-" + i);

			var col0 = $("<div></div>").addClass("col-sm-12").appendTo($(row0));
			var row1 = $("<div></div>").addClass("row").appendTo($(col0));
			var col1 = $("<div></div>").addClass("col-sm-3 user-listing-img").appendTo($(row1));
			var img = $("<img></img>").appendTo($(col1));
			var col2 = $("<div></div>").addClass("col-sm-9").appendTo($(row1));
			var p0 = $("<p></p>").addClass("message-thread-message").appendTo($(col2)); 
			var div = $("<div></div>").css("clear", "both").appendTo($(col2));
			var a0 = $("<a></a>").addClass("btn btn-primary go-to-message")
						.click({listingId: event[i].listingId, clientId: event[i].clientId}, onClickGoToThread)
						.appendTo($(div));

			var message = event[i].message;
			var dateTime = event[i].dateTime;

			//Insert listing information into HTML elements.
			// $(h3).text(listingTitle);
			$(p0).text("Message:"+ message);
			$(a0).text("Conversate");

			$(img).attr("src", "http://placehold.it/150x150");

		}
		
	});
}

function onClickGoToThread(event) {
	window.location.replace(url+"messages/conversation/"+event.data.listingId+"/"+event.data.clientId);
}