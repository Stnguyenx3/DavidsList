$(document).ready(function () {

	var listingIDToDelete;

	//Get userid from url
	var str = (window.location + '').split("/");
	var userId = str[str.length - 1];

	console.log("userId = " + userId);

	var headerDiv = $("<div></div>").addClass("row").appendTo($("#listings"));
	var header = $("<h2></h2>").addClass("centered-header").appendTo($("#listings"));

	$(header).text("Your listings");

	$.ajax({
		type:'GET',
		url: url+"users/getalluserlistings/" + userId,
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

		if(numOfListings == 0){
			//Display no result message to user.
			var row = $("<div></div>").addClass("row search-result-listing-null").appendTo($("#listings"));
			$("<div></div>").addClass("col-sm-3").appendTo($(row));
			var col = $("<div></div>").addClass("col-sm-6").appendTo($(row));
			var message = $("<p></p>").addClass("search-result-listing-null no-center").appendTo($(col));
			$(message).text("You currently have no listing posted. If you want to create a listing on DavidsList, please click the 'Create New' button.");

		} else {
			for (var i = 0; i < numOfListings; i++){

				

				var row0 = $("<div></div>").addClass("row search-result-listing").appendTo($("#listings"));

				//Add unique ID for each row (remove if not needed!)
				$(row0).attr("id", "user-favorite-" + event[i].listing.listingId);

				var col1 = $("<div></div>").addClass("col-sm-4").appendTo($(row0));
				var img = $("<img></img>").addClass("search-result-listing-img").appendTo($(col1));
				var col2 = $("<div></div>").addClass("col-sm-8").appendTo($(row0));
				var row2 = $("<div></div>").addClass("row").appendTo($(col2));
				var row3 = $("<div></div>").addClass("row").appendTo($(col2)); 
				var row4 = $("<div></div>").addClass("row").appendTo($(col2)); 
				var title = $("<p></p>").addClass("search-result-listing-title listing-title").appendTo($(row2));
				var price = $("<p></p>").addClass("search-result-listing-price listing-price").appendTo($(row2));
				var address = $("<p></p>").addClass("search-result-listing-address").appendTo($(row3));
				var basicInfo = $("<p></p>").addClass("search-result-listing-basic-info").appendTo($(row3));
				var description= $("<p></p>").addClass("search-result-listing-basic-info").appendTo($(row3));
				var a0 = $("<a></a>").addClass("btn btn-primary user-listings-edit")
							.click({listingId: event[i].listing.listingId}, onClickEditListing)
							.appendTo($(row4));
				var a1 = $("<a></a>").addClass("btn btn-primary user-listings-remove")
							.click({listingId: event[i].listing.listingId}, onClickDeleteListing)
							.appendTo($(row4));
				var a2 = $("<a></a>").addClass("btn btn-primary user-messages")
							.click({listingId: event[i].listing.listingId}, onClickMessages)
							.appendTo($(row4));

				//Store listing inforation into variables.
				var listingTitle = event[i].listing.title;
				var listingImg = "data:image/png;base64,"+event[i].listing_images;
				var listingAddress = event[i].address.streetName + " " + event[i].address.city + " " + event[i].address.state + ", " + event[i].address.zipcode;
				var listingBed = event[i].listing_detail.numberOfBedrooms;
				var listingBath = event[i].listing_detail.numberOfBathrooms;
				var furnished;
				if (event[i].listing_detail.furnishing == 1) {
					furnished = "Yes";
				} else {
					furnished = "No";
				}
				var distance = event[i].address.distance;
				var listingPrice = event[i].listing.price;
				var listingDescription = event[i].listing_detail.description;

				//Insert listing information into HTML elements.
				$(title).text(listingTitle);
				$(img).attr("src", listingImg);
				$(price).text("$" + listingPrice);
				$(address).text(listingAddress);
				$(basicInfo).text("Bed: " + listingBed + " | " + "Bath: " + listingBath + " | " + "Furnished: " + furnished + " | Distance from campus: " + distance + " mi");
				// $(description).text("Description: "+ listingDescription);
				$(a0).text("Edit");
				$(a1).text("Remove");
				$(a2).text("Messages");


			}
		}
	});

}

function onClickDeleteListing(event) {
	var str = (window.location + '').split("/");
	var userId = str[str.length - 1];

	listingIDToDelete = event.data.listingId;

	$.notify({title: "Are you sure?", button: "Yes"}, {style: "remove-confirmation", position: "top center", autoHide: false});

}

//Maybe edit this so that it sends the user id as well?
//That way, no other user can try to edit the page
function onClickEditListing(event) {
	var str = (window.location + '').split("/");
	var userId = str[str.length - 1];
	window.location.replace(url+"listings/edit/"+event.data.listingId);
}

function onClickMessages(event) {
	window.location.replace(url+"messages/allmessages/"+event.data.listingId);
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
		url: url + "listings/deletelisting/",
		data: {
			listingId: listingIDToDelete
		},
		success: function(e) {
			$("#user-listing-"+listingIDToDelete).remove();
			$.notify("Listing has been deleted!", {position: "top center"});
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