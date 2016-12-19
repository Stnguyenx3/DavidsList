$(document).ready(function () {

	var str = (window.location + '').split("/");
	var listingId = str[str.length - 1];

	//Highlight the current pages' navbar link.
	$("#nav-link-2").css("color", "#6de3b0");

	$.ajax({
		type:'GET',
		url: url+"messages/getallmessages/" + userID,
		dataType: "json",
		beforeSend: function () {
			
		},
		success: handleEvent,
		error: function(xhr, err, errThrown) {
			console.log("I failed");
			console.log(err);
			console.log(errThrown);
		}
	});

});

function handleEvent(event) {
	if(event === "You are not logged in") {
		console.log("GG son");
	} else {
		formatAllListingMessages(event);
	}
}

function formatAllListingMessages(event) {

	console.log(event);

	$(document).ready(function() {

		var details = event.listing_details;
		var basic = event.listing;
		var messages = event.messages;
		var users = event.users;
		// var images = event.img;

		var noMessagePrompt = $("<p></p>").addClass("no-message-prompt").appendTo($("#allListingMessages"));
		$(noMessagePrompt).text("You have not sent or received any messages!");

		for (var i = 0; i < messages.length; i++){

			//Hacky front-end fix to only display messages that a user is a part of.
			if (userID == messages[i].recipientUserId || userID == messages[i].senderUserId) {

				//Hide no message prompt.
				$(noMessagePrompt).css("display", "none");


				var row0 = $("<div></div>").addClass("row user-listing").appendTo($("#allListingMessages"));

				//Add unique ID for each row (remove if not needed!)
				$(row0).attr("id", "message-thread-" + messages[i].listingId);

				var col0 = $("<div></div>").addClass("col-sm-12").appendTo($(row0));
				var row1 = $("<div></div>").addClass("row").appendTo($(col0));
				var col1 = $("<div></div>").addClass("col-sm-4 vertical-divider").appendTo($(row1));
				// var img = $("<img></img>").appendTo($(col1));
				var h0 = $("<h3></h3>").appendTo($(col1));
				var info = $("<p></p>").appendTo($(col1));
				var col2 = $("<div></div>").addClass("col-sm-8").appendTo($(row1));
				var p0 = $("<p></p>").addClass("message-thread-message").appendTo($(col2));
				var div = $("<div></div>").css("clear", "both").appendTo($(col2));
				var a0 = $("<a></a>").addClass("btn btn-primary go-to-message")
							.click({listingId: messages[i].listingId, clientId: messages[i].clientId}, onClickGoToThread)
							.appendTo($(div));
				var a1 = $("<a></a>").addClass("btn btn-primary go-to-listing")
							.click({listingId: messages[i].listingId}, onClickGoToListing)
 							.appendTo($(div));

				$(a0).css("float", "right");
				$(a1).css("float", "right");

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

				if (basic[i].length > 0) {
					$(h0).text(basic[i][0].title);
					$(info).text("$" + basic[i][0].price);
					var styledUsername = $("<p></p>").css({"font-weight": "700", "display": "inline"});
					$(styledUsername).text(senderUsername);
					//$(p0).text(senderUsername + ": " + message);
					$(p0).append(styledUsername);
					$(p0).append(": " + message);
					$(a0).text("Reply");
					$(a1).text("Go To Listing");
					// $(img).attr("src", "http://placehold.it/150x150"); //"data:image/png;base64," + images[i].imageThumbnail
				} else {
					//Remove the message containers for undefined messages (when user deletes a listing).
					$(row0).hide();
				}
			}
		}
		
	});
}

function onClickGoToThread(event) {
	window.location.replace(url+"messages/conversation/"+event.data.listingId+"/"+event.data.clientId);
}

function onClickGoToListing(event) {
 	window.location.replace(url+"listings/getlisting/"+event.data.listingId);
}