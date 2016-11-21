$(document).ready(function () {

	//Get userid from url
	var str = (window.location + '').split("/");
	
	var userId = str[str.length - 1];

	console.log("userId = " + userId);



	$.ajax({
		type:'GET',
		url: url+"/users/getalluserlistings/" + userId,
		dataType: "json",
		success: formatUserListings,
		error: function(xhr, err, errThrown) {
			console.log("I failed");
			console.log(err);
			console.log(errThrown);
		}
	});

});

function formatUserListings(event) {
	console.log("Ajax completed.");

	console.log(event);

	var listings = JSON.parse(event);

	console.log("You have " + listings.length + " listings.");
}