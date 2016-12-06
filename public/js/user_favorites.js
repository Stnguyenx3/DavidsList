$(document).ready(function () {

	var listingIDToDelete;

	//Get userid from url
	var str = (window.location + '').split("/");
	var userId = str[str.length - 1];

	console.log("userId = " + userId);

	var headerDiv = $("<div></div>").addClass("row").appendTo($("#favorites"));
	var header = $("<h2></h2>").addClass("centered-header").appendTo($("#favorites"));

	$(header).text("Your Favorite Listings");

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

			var row0 = $("<div></div>").addClass("row user-favorite linear-gradient-bg custom-border").appendTo($("#favorites"));

			//Add unique ID for each row (remove if not needed!)
			$(row0).attr("id", "user-favorite-" + event[i].listing.listingId);

			var col0 = $("<div></div>").addClass("col-sm-12").appendTo($(row0));
			var row1 = $("<div></div>").addClass("row").appendTo($(col0));
			var col1 = $("<div></div>").addClass("col-sm-3 user-favorite-img").appendTo($(row1));
			var img = $("<img></img>").appendTo($(col1));
			var col2 = $("<div></div>").addClass("col-sm-9").appendTo($(row1));
			var h3 = $("<h3></h3>").addClass("user-favorite-title").appendTo($(col2));
			var p0 = $("<p></p>").addClass("user-favorite-price").appendTo($(col2)); //Represents the price of listing
			var div = $("<div></div>").css("clear", "both").appendTo($(col2));
			var p1 = $("<p></p>").appendTo($(div));

			var a1 = $("<a></a>").addClass("btn btn-primary user-favorite-remove-" + event[i].listing.listingId)
						.click({listingId: event[i].listing.listingId}, onClickDeleteListing);

			var a2 = $("<a></a>").addClass("btn btn-primary user-favorite-go")
						.click({listingId: event[i].listing.listingId}, onClickGoToListing);

			$(a2).appendTo($(div));
			$(a1).appendTo($(div));

			//Store listing inforation into variables.
			var listingImg = "data:image/png;base64,"+event[i].listing_images;
			var listingTitle = event[i].address.streetName + " " + event[i].address.city + " " + event[i].address.state + ", " + event[i].address.zipcode;
			var listingPrice = event[i].listing.price;
			var listingDescription = event[i].listing_detail.description;

			//Insert listing information into HTML elements.
			$(h3).text(listingTitle);
			$(img).attr("src", listingImg).attr("width", "175").attr("height", "175");
			$(p0).text("Price: $" + listingPrice);
			$(p1).text("Description:"+ listingDescription);
			$(a1).text("Remove");
			$(a2).text("Go to listing");

		}
		
	});

}

function onClickDeleteListing(event) {
	var str = (window.location + '').split("/");
	var userId = str[str.length - 1];

	listingIDToDelete = event.data.listingId;

	$.notify({title: "Are you sure?", button: "Yes"}, {style: "remove-confirmation", position: "top center", autoHide: false});

}

function onClickGoToListing(event) {
	window.location.replace(url + "listings/getlisting/" + event.data.listingId);
}

$.notify.addStyle('remove-confirmation', {
	html: "<div>" +
      "<div class='clearfix'>" +
        "<div class='title' data-notify-html='title'/>" +
        "<div class='buttons'>" +
          "<button class='no'>No</button>" +
          "<button class='yes' data-notify-text='button'></button>" +
        "</div>" +
      "</div>" +
    "</div>"
});

//listen for click events from this style
$(document).on('click', '.notifyjs-remove-confirmation-base .no', function() {
  //programmatically trigger propogating hide event
  $(this).trigger('notify-hide');
});
$(document).on('click', '.notifyjs-remove-confirmation-base .yes', function() {
	$.ajax({
		type: 'POST',
		url: url + "favoritelistings/deletefavorite/",
		data: {
			listingId: listingIDToDelete
		},
		success: function(e) {
			$("#user-favorite-"+listingIDToDelete).remove();
			$.notify("Listing has been deleted from your favorites!", {position: "top center"});
		},
		error: function(xhr, err, errThrown) {
			console.log("I failed");
			console.log(err);
			console.log(errThrown);
		}
	});
  //hide notification
  $(this).trigger('notify-hide');
});