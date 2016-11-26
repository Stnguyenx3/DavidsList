$(document).ready(function () {

	//Get userid from url
	var str = (window.location + '').split("/");
	var userId = str[str.length - 1];

	console.log("userId = " + userId);

	$.ajax({
		type:'GET',
		url: url+"users/getalluserfavorites/" + userId, 
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

	console.log(event);

	$(document).ready(function() {

		var numOfListings = event.length;

		for (var i = 0; i < numOfListings; i++){

			var row0 = $("<div></div>").addClass("row user-favorite linear-gradient-bg custom-border").appendTo($("#favorites"));;

			//Add unique ID for each row (remove if not needed!)
			$(row0).attr("id", "user-favorite-" + i);

			var col0 = $("<div></div>").addClass("col-sm-12").appendTo($(row0));
			var row1 = $("<div></div>").addClass("row").appendTo($(col0));
			var col1 = $("<div></div>").addClass("col-sm-3 user-favorite-img").appendTo($(row1));
			var img = $("<img></img>").appendTo($(col1));
			var col2 = $("<div></div>").addClass("col-sm-9").appendTo($(row1));
			var h3 = $("<h3></h3>").addClass("user-favorite-title").appendTo($(col2));
			var p0 = $("<p></p>").addClass("user-favorite-price").appendTo($(col2)); //Represents the price of listing
			var div = $("<div></div>").css("clear", "both").appendTo($(col2));
			var p1 = $("<p></p>").appendTo($(div));

			var a1 = $("<a></a>").addClass("btn btn-primary user-favorite-remove")
						.click({listingId: event[i].listing.listingId}, onClickDeleteListing)
						.appendTo($(div));

			//Store listing inforation into variables.
			var listingImg = "data:image/png;base64,"+event[i].listing_images;// TODO get img from db.
			var listingTitle = event[i].address.streetName + " " + event[i].address.city + " " + event[i].address.state + ", " + event[i].address.zipcode;
			var listingPrice = event[i].listing.price;
			var listingDescription = event[i].listing_detail.description;

			//Insert listing information into HTML elements.
			$(h3).text(listingTitle);
			$(img).attr("src", listingImg).attr("width", "175").attr("height", "175");
			$(p0).text("Price: $" + listingPrice);
			$(p1).text("Description:"+ listingDescription);
			$(a1).text("Remove");

		}
		
	});

}

function onClickDeleteListing(event) {
	var str = (window.location + '').split("/");
	var userId = str[str.length - 1];

	$.ajax({
		type: 'POST',
		url: url + "favoritelistings/deletefavorite/",
		data: {
			listingId: event.data.listingId
		},
		success: function(e) {
			console.log(e);
		},
		error: function(xhr, err, errThrown) {
			console.log("I failed");
			console.log(err);
			console.log(errThrown);
		}
	});
}