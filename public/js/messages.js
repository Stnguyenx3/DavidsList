$(document).ready(function () {
	var str = (window.location + '').split("/");
	var userId = str[str.length - 1];
	var listingId = str[str.length - 2];
	$.ajax({
		type:'GET',
		url: url+"messages/getconversation/"+listingId+"/"+userId,
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

			var row0 = $("<div></div>").addClass("row messages-single").appendTo($("#all-conversation"));

			$(row0).attr("id", "message-thread-" + i);
			var p0 = $("<p></p>").addClass("message").appendTo($(row0)); 

			$(p0).text(event[i].senderUserId+" "+event[i].message);
		}
	});
}

function onClickSend() {
	console.log("I have sent");

	var str = (window.location + '').split("/");
	var userID = str[str.length - 1];
	var listingID = str[str.length - 2];

	let message = {
		message: $("#message-box").val(),
		listingId: listingID,
		userId: userID
	};

	$.ajax({
		type:'POST',
		url: url+"messages/createmessage/",
		data: message,
		success: function(event) {
			console.log(event);
		},
		error: function(xhr, err, errThrown) {
			console.log("I failed");
			console.log(err);
			console.log(errThrown);
		}
	});
}