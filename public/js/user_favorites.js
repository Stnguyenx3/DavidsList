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

		if(numOfListings == 0){
			//Display no result message to user.
			var row = $("<div></div>").addClass("row search-result-listing-null").appendTo($("#favorites"));
			$("<div></div>").addClass("col-sm-3").appendTo($(row));
			var col = $("<div></div>").addClass("col-sm-6").appendTo($(row));
			var message = $("<p></p>").addClass("search-result-listing-null no-center").appendTo($(col));
			$(message).text("You currently have no favorites. Try adding favorites by pressing the 'Favorite' button while looking at a house. This will help you find back your favorite listings at a later time.");

		} else {
			for (var i = 0; i < numOfListings; i++){

				var row0 = $("<div></div>").addClass("row search-result-listing").appendTo($("#favorites"));

				//Add unique ID for each row (remove if not needed!)
				$(row0).attr("id", "user-favorite-" + event[i].listing.listingId);

				var col1 = $("<div></div>").addClass("col-sm-4").appendTo($(row0));
				var img = $("<img></img>").addClass("search-result-listing-img").appendTo($(col1));
				var col2 = $("<div></div>").addClass("col-sm-8").appendTo($(row0));
				var row2 = $("<div></div>").addClass("row").appendTo($(col2));
				var row3 = $("<div></div>").addClass("row").appendTo($(col2)); 
				var title = $("<p></p>").addClass("search-result-listing-title listing-title").appendTo($(row2));
				var price = $("<p></p>").addClass("search-result-listing-price listing-price").appendTo($(row2));
				var address = $("<p></p>").addClass("search-result-listing-address").appendTo($(row3));
				var basicInfo = $("<p></p>").addClass("search-result-listing-basic-info").appendTo($(row3));
				var description= $("<p></p>").addClass("search-result-listing-basic-info").appendTo($(row3));

				//var a1 = $("<a></a>").addClass("btn btn-primary user-favorite-remove-" + event[i].listing.listingId)
							//.click({listingId: event[i].listing.listingId}, onClickDeleteListing);

				var a2 = $("<a></a>").addClass("btn btn-primary user-favorite-go")
							.click({listingId: event[i].listing.listingId}, onClickGoToListing);

				$(a2).appendTo($(row3));
				//$(a1).appendTo($(row3));

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
				
				if (event[i].address.approximateAddress == 1){
						listingAddress = event[i].address.city + " " + event[i].address.state + ", " + event[i].address.zipcode;
				} 
				var distance = event[i].address.distance;
				var listingPrice = event[i].listing.price;
				var listingDescription = event[i].listing_detail.description;

				//Insert listing information into HTML elements.
				$(title).text(listingTitle);
				$(img).attr("src", listingImg);
				$(img).click({listingId: event[i].listing.listingId}, onClickGoToListing);
				$(price).text("$" + listingPrice);
				$(address).text(listingAddress);
				$(basicInfo).text("Bed: " + listingBed + " | " + "Bath: " + listingBath + " | " + "Furnished: " + furnished + " | Distance from campus: " + distance + " mi");
				// $(description).text("Description: "+ listingDescription);
				//$(a1).text("Remove");
				$(a2).text("Go to listing");

				var deleteButton = $("<button></button>").appendTo($(row3));
				$(deleteButton).attr("type", "button");
				$(deleteButton).attr("data-toggle", "modal");
				$(deleteButton).attr("data-target", "#confirmation-modal");
				$(deleteButton).attr("id", "delete-favorite-" + event[i].listing.listingId);
				$(deleteButton).addClass("btn btn-primary user-favorite-remove");
				$(deleteButton).text("Delete");

			}

			//Handle modal events
			$("#confirmation-modal").on('show.bs.modal', function(event) {
				var invoker = $(event.relatedTarget);
				var arr = $(invoker).attr('id').split("-");
				var listingIdToDelete = arr[2];

				console.log("clicked delete number " + listingIdToDelete);
				$("#delete-confirmed").off('click').on('click', function() {
					console.log("Deleting listing with id " + listingIdToDelete);
					deleteListing(listingIdToDelete);
				});
			});

		}
		
	});

}

function onClickDeleteListing(event) {
	var str = (window.location + '').split("/");
	var userId = str[str.length - 1];
	listingIDToDelete = event.data.listingId;
}

function onClickGoToListing(event) {
	window.location.replace(url + "listings/getlisting/" + event.data.listingId);
}

function deleteListing(id) {
	console.log("Making ajax to delete listing number " + id);
	$.ajax({
		type: 'POST',
		url: url + "favoritelistings/deletefavorite/",
		data: {
			listingId: id
		},
		success: function(e) {
			$("#user-favorite-"+id).fadeOut("slow");
			$.notify("Listing has been deleted from your favorites!", "success");
		},
		error: function(xhr, err, errThrown) {
			console.log("I failed");
			console.log(err);
			console.log(errThrown);
		}
	});
}