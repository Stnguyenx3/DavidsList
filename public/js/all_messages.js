$(document).ready(function () {

	var str = (window.location + '').split("/");
	var listingId = str[str.length - 1];

	$.ajax({
		type:'GET',
		url: url+"messages/getallmessages/" + userID,
		dataType: "json",
		beforeSend: function () {
			
		},
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

		var details = event.listing_details;
		var messages = event.messages;
		var users = event.users;

		for (var i = 0; i < messages.length; i++){

			var row0 = $("<div></div>").addClass("row user-listing").appendTo($("#allListingMessages"));

			//Add unique ID for each row (remove if not needed!)
			$(row0).attr("id", "message-thread-" + i);

			var col0 = $("<div></div>").addClass("col-sm-12").appendTo($(row0));
			var row1 = $("<div></div>").addClass("row").appendTo($(col0));
			var col1 = $("<div></div>").addClass("col-sm-3 user-listing-img").appendTo($(row1));
			var img = $("<img></img>").appendTo($(col1));
			var col2 = $("<div></div>").addClass("col-sm-9").appendTo($(row1));
			var h0 = $("<h3></h3>").appendTo($(col2));
			var p0 = $("<p></p>").addClass("message-thread-message").appendTo($(col2));
			var div = $("<div></div>").css("clear", "both").appendTo($(col2));
			var a0 = $("<a></a>").addClass("btn btn-primary go-to-message")
						.click({listingId: messages[i].listingId, clientId: messages[i].clientId}, onClickGoToThread)
						.appendTo($(div));

			$(a0).css("float", "right");

			var message = messages[i].message;
			var dateTime = messages[i].dateTime;

			//Get sender and receiver usernames from userid.
			var senderUserID = messages[i].senderUserId;
			var receiverUserID = messages[i].receiverUserID;
			var senderUsername;
			var receiverUsername;

			//Determine username based on userid.
			for (var j = 0; j < users.length; j++){
				for (var k = 0; k < users[j].length; k++){
					if (users[j][k].userid == senderUserID) {
						senderUsername = users[j][k].username;
					}
					if(users[j][k].userid == receiverUserID) {
						receiverUsername = users[j][k].username;
					}
				}
			}

			//Insert listing information into HTML elements.
			$(h0).text("Listing Title");
			$(p0).text(senderUsername + ": " + message);
			$(a0).text("Reply");
			$(img).attr("src", "http://placehold.it/150x150");

		}
		
	});
}

function onClickGoToThread(event) {
	window.location.replace(url+"messages/conversation/"+event.data.listingId+"/"+event.data.clientId);
}