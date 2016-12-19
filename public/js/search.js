function toggleBlockDisplay (blockID, on) {
	var selector = blockID;
	var status = $(selector).css("display");

	if(on) $(selector).css("display", "block");
	else{
		$(selector).css("display", "none");
		// console.log(selector);
	}
}


//Creates an AJAX request to search for apartments(More like search for addresses)
function onSearchClick() {

	var searchInput = $('#search-input').val();
	buildPage();

	if(searchInput !== "" && valid(searchInput)) {
		var searchQuery = {
		search: searchInput
		}
		// $('#search-input').val("");
		$.ajax({
			type:'POST',
			url: url+"/search/searchapartments/",
			data: searchQuery,
			beforeSend: function() {

				var loadingAnimation = $("<i class=\"fa fa-circle-o-notch fa-spin\" style=\"font-size:200px\"></i>");

				$("#loading-container").css("text-align", "center").append($(loadingAnimation));
			},
			success: formatResults,
			error: function(xhr, err, errThrown) {
				console.log("I failed");
				console.log(err);
				console.log(errThrown);
			},
		});
	}
}

function valid(input){
	var valid = true;
	var zipcode = Number(input);
	if (!isNaN(zipcode)){
		if (zipcode < 10000 || zipcode > 99999){
			console.log(zipcode);
			$(searchResultContent).find("#no-result-message").text("Please enter a valid zipcode"); // show no result message
			$(searchResultContent).find("#no-result").css("display", "block"); // show no result message
			valid = false;
		}
	}
	return valid;
}


function buildPage(){

	var resultsPerPage = 5; //MAX NUMBER OF RESULTS PER PAGINATION PAGE.

	var pageContent = $("<div></div>").addClass("row");
	$(".container.main").html(pageContent); //Append to classes "container main", since there can be multiple containers on one page.

	var filter = '<div class="listing-map" id="listing-map" style="visibility: hidden; position: absolute; top: -9999px;"></div>\
	<div class="col-sm-3">\
		<p class="search-title">Refine search</p>\
			<div class="search-filter">\
				<div class="form-group search-filter-price" id="filter-form">\
					<label>Price</label>\
					<br>\
					<label for="search-filter-price-range1">\
						<input type="checkbox" id="search-filter-price-range1" value="500"> Under $500\
					</label>\
					<br>\
					<label for="search-filter-price-range2">\
						<input type="checkbox" id="search-filter-price-range2" value="750"> $500 to $750\
					</label>\
					<br>\
					<label for="search-filter-price-range3">\
						<input type="checkbox" id="search-filter-price-range3" value="1000" >$750 to $1000\
					</label>\
					<br>\
					<label for="search-filter-price-range4">\
						<input type="checkbox" id="search-filter-price-range4" value="1000">$1000 or more\
					</label>\
					<div class="form-group">\
						<label>Rooms</label>\
						<br>\
						<label for="search-filter-bedroom-range1">\
							<input type="checkbox" id="search-filter-bedroom-range1" value="1" >1\
						</label>\
						<br>\
						<label for="search-filter-bedroom-range2">\
							<input type="checkbox" id="search-filter-bedroom-range2" value="2">2\
						</label>\
						<br>\
						<label for="search-filter-bedroom-range3">\
							<input type="checkbox" id="search-filter-bedroom-range3" value="3">3 or more\
						</label>\
					</div>\
					<div class="form-group">\
						<label>Distance from SFSU</label>\
						<br>\
						<label for="search-filter-distance-range1">\
							<input type="checkbox" id="search-filter-distance-range1" value="1">Under 1 mile\
						</label>\
						<br>\
						<label for="search-filter-distance-range2">\
							<input type="checkbox" id="search-filter-distance-range2" value="3">1-3 miles\
						</label>\
						<br>\
						<label for="search-filter-distance-range3">\
							<input type="checkbox" id="search-filter-distance-range3" value="3">3 miles or more\
						</label>\
					</div>\
				</div>\
			</div>\
		</div>'

	pageContent.append(filter);

	var searchResultContent = ($("<div></div>").addClass("col-sm-9"));
	$(searchResultContent).attr("id", "searchResultContent");

	$(searchResultContent).append($("<p>Results</p>").addClass("search-title"));
	$(searchResultContent).append($("<p></p>").attr("id", "loading-container"));

	// Add number of results displayed at top of page
	var row = $("<div></div>").addClass("row search-result-number").appendTo($(searchResultContent));
	var col = $("<div></div>").addClass("col-sm-12").appendTo($(row));
	var message = $("<p></p>").addClass("search-result-number-message").appendTo($(col));
	$(row).attr("id", "result-number");

	//Display no result message to user.
	var row = $("<div></div>").addClass("row search-result-listing-null").appendTo($(searchResultContent));
	var col = $("<div></div>").addClass("col-sm-12").appendTo($(row));
	var message = $("<p></p>").addClass("search-result-listing-null").appendTo($(col));
	$(message).text("No results! Try another search!");
	$(message).attr("id", "no-result-message");

	//No-result message is default not shown
	$(row).attr("id", "no-result");
	$(row).css("display", "none");

	pageContent.append(searchResultContent);

	//Result page layout.

	for (i = 0; i < resultsPerPage; i++) {
		var row = $("<div></div>").addClass("row search-result-listing").appendTo($(searchResultContent));
		var col1 = $("<div></div>").addClass("col-sm-4").appendTo($(row));
		var col2 = $("<div></div>").addClass("col-sm-8 search-listing-info").appendTo($(row));
		var row2 = $("<div></div>").addClass("row").appendTo($(col2));
		var row3 = $("<div></div>").addClass("row").appendTo($(col2));
		var resultThumbnail = $("<img></img>").addClass("search-result-listing-img").appendTo($(col1));
		var listingName = $("<p></p>").addClass("search-result-listing-title listing-title").appendTo($(row2));
		var listingPrice = $("<p></p>").addClass("search-result-listing-price listing-price").appendTo($(row2));
		$("</br>").appendTo($(col2));
		var listingAddress = $("<p></p>").addClass("search-result-listing-address").appendTo($(row3));
		var listingBasicInfo = $("<p></p>").addClass("search-result-listing-basic-info").appendTo($(row3));
		var rentButton = $("<a></a>").addClass("btn btn-primary search-result-listing-btn")
							.appendTo($(col2));

		var rowID = "search-result-listing-"+i;
		$(row).attr("id", rowID);

		$(row).css("display", "none");
	}

	pageContent.append(searchResultContent);

	// Pagination
	var paginationWrapper = $("<div></div>").addClass("result-pagination-wrapper");
	var pagination = $("<ul></ul>").addClass("result-pagination").appendTo($(paginationWrapper));

	pageContent.append($(paginationWrapper));

	$(".container.main").html(pageContent);

}




function formatResults(event) {

	$("#loading-container").css("display", "none");

	var resultsPerPage = 5; //MAX NUMBER OF RESULTS PER PAGINATION PAGE.
	var result = JSON.parse(event);
	var numOfResults = result.length;
	var numOfPages = Math.ceil(numOfResults / resultsPerPage);

	// If no results, display message
	if (numOfResults == 0) {
		$(searchResultContent).find("#no-result").css("display", "block"); // show no result message
		toggleBlockDisplay("#result-pagination-wrapper", false);
		toggleBlockDisplay("#result-number", false); // stop showing number of results
		return; //quit rest of display
	}

	
	// couple the onSelectFilter function to all checkboxes
	var checkboxes = document.getElementById("filter-form").getElementsByTagName("input");
	for (var i = 0; i < checkboxes.length; i++) {
		checkboxes[i].onchange = function(event) {
			onSelectFilter(event, result);
		}
	}



	var resultIDs = writeListingID(result, numOfResults); // start with showing all listings
	var priceResultIDs = writeListingID(result, numOfResults);
	var roomResultIDs = writeListingID(result, numOfResults);
	var distResultIDs = writeListingID(result, numOfResults);
	updateSearchResults(resultsPerPage, result, resultIDs);

	var first = true, uncheckedPrice = true, uncheckedRooms = true, uncheckedDist = true;

	// filters when one of teh checkboxes is checked
	function onSelectFilter(event, result){

		// get all values needed form the event to filter
		var id = event.target.id;
		var subtype = parseInt(id.slice(-1));
		var type = id.substr(14);
		type = type.substr(0, type.length -7);

		var checked = event.target.checked;
		var compareValue = parseInt(event.target.value);

		if (first){
			resultIDs = [];
			first = false;
		}

		var foundFirstPrice = false;
		var foundFirstRooms = false;
		var foundFirstDist = false;

		// If everything is unchecked, reset list of ID's to everything
		if (type === "price" && checkCheckboxes("price", 4)){
			uncheckedPrice = true;
			priceResultIDs = writeListingID(result, numOfResults);
		} else if (type === "bedroom" && checkCheckboxes("bedroom", 3)){
			uncheckedRooms = true;
			roomResultIDs = writeListingID(result, numOfResults);
		} else if (type === "distance" && checkCheckboxes("distance", 3)){
			uncheckedDist = true;
			distResultIDs = writeListingID(result, numOfResults);
		} else {
			// start going through all results
			for (var i = 0; i < numOfResults; i++) {

				var id = result[i].listingId;
				var price = parseInt(result[i].price);
				var rooms = parseInt(result[i].numberOfBedrooms);
				var distance = result[i].distance;
				if (distance == null) distance = 500.1; // HOW ELSE TO HANDLE??
				else distance = parseFloat(distance);

				// check for price
				if (type === "price"){
					var index = priceResultIDs.indexOf(id);
					if ((subtype == 1 && price < compareValue) || (subtype == 4 && price >= compareValue) || (price <compareValue && price >= compareValue-250 && subtype != 4)){	
						if(!checked){
							if (index > -1) priceResultIDs.splice(index, 1);
						} else { 
							if (index == -1) priceResultIDs.push(result[i].listingId);
						}
					} else if (uncheckedPrice){ 
						priceResultIDs.splice(index, 1);
						foundFirstPrice = true;
					}
				} 
				// check for rooms
				else if (type === "bedroom"){
					var index = roomResultIDs.indexOf(id);
					if (rooms == compareValue || (rooms >=compareValue && subtype == 3)){
						if(!checked){
							if (index > -1) roomResultIDs.splice(index, 1);
						} else { 
							if (index == -1) roomResultIDs.push(result[i].listingId);
						}
					} else if (uncheckedRooms){
						roomResultIDs.splice(index, 1);
						foundFirstRooms = true;
					}
				}

				// check for distance
				if (type === "distance"){
					var index = distResultIDs.indexOf(id);
					if ((distance < compareValue && distance >= compareValue-2)||(distance >= compareValue && subtype==3)){
						if(!checked){
							if (index > -1) distResultIDs.splice(index, 1);
						} else { 
							if (index == -1) distResultIDs.push(result[i].listingId);
						}
					} else if (uncheckedDist){ 
						distResultIDs.splice(index, 1);
						foundFirstDist = true;
					}
				}	
			}
			if(foundFirstPrice) uncheckedPrice = false;
			if(foundFirstRooms) uncheckedRooms = false;
			if(foundFirstDist) uncheckedDist = false;
		}

		resultIDs = intersection(priceResultIDs, roomResultIDs, distResultIDs);
		console.log(priceResultIDs, roomResultIDs, distResultIDs);
		// console.log(resultIDs);
		// update live on page
		updateSearchResults(resultsPerPage, result, resultIDs);
	}

}

function checkCheckboxes(type, ranges){
	var checkboxes = document.getElementById("filter-form").getElementsByTagName("input");
	var currentBox;
	var allUnchecked = true;
	for (var i = 1; i <= ranges; i++) {
		currentBox = document.getElementById("search-filter-" + type+ "-range" + i);
		if(currentBox.checked == true){
			allUnchecked = false;
			break;
		}
	}
	return allUnchecked;
}

function intersection(list1, list2, list3){
	var intersection = [];
	// var lenght1 = list1.length, lenght2 = list2.length, lenght3 = list3.length;

	intersetion = list1.filter(function (elem) {
        if (list2.indexOf(elem) !== -1) return true;
    });
	return intersetion.filter(function (elem) {
        if (list3.indexOf(elem) !== -1) return true;
    });
}


//Handles ENTER keypress in search field.
function enterPressed(event) {

	if (event.which == 13 || event.keyCode == 13) {
		
		onSearchClick();

		return true;
	}

}

function onClickToListings(event) {
	window.open(url+"listings/getlisting/"+event.data.listingId);
}

// Collect all listing ids
function writeListingID(result, numOfResults){
	var listingIDs = [];

	for(var i = 0; i < numOfResults; i++){
		listingIDs.push(result[i].listingId);
	}
	return listingIDs;
}

// updates search results on search page,
// refills all divs
function updateSearchResults(resultsPerPage, result, resultIDs) {
	var numOfResultIDs = resultIDs.length;
	var numOfResults = result.length;
	var numOfPages = Math.ceil(numOfResultIDs / resultsPerPage);
	var resultCombined = [];

	for(var i = 0; i < numOfResultIDs; i++){
		ID = resultIDs[i];
		for(var j = 0; j <numOfResults;j++){
			if(result[j].listingId == ID){
				resultCombined.push(result[j]);
				break;
			}
		}
	}
	result = resultCombined;

	// Handle Pagination events

	// Destroy if data already present
	if($('.result-pagination').data("twbs-pagination")){
    	$('.result-pagination').twbsPagination('destroy');
    }

    // handle no results
    if (numOfResultIDs == 0) {
    	$(searchResultContent).find("#no-result-message").text("No results for these restrictions. Please use the filters."); // show no result message
		$(searchResultContent).find("#no-result").css("display", "block"); // show no result message
		toggleBlockDisplay("#result-number", false); // stop showing number of results
		toggleBlockDisplay("#result-pagination-wrapper", false); // stop showing scroll bar 
		for(var i = 0; i<resultsPerPage; i++){
			toggleBlockDisplay("#search-result-listing-" + i, false); // stop showing listing divs
		}
		return;
	} else {
		$(searchResultContent).find("#no-result").css("display", "none"); // stop showing no result mess
		toggleBlockDisplay("#result-number", true); // start showing number of results
		toggleBlockDisplay("#result-pagination-wrapper", true); // start showing scroll bar 
	}

    // Repopulate
	$(".result-pagination").twbsPagination({
	        totalPages: numOfPages,
	        visiblePages: 10,
	        onPageClick: function (event, page) {
	        	var notShown = [false, false, false, false];

	            //Populate HTML divs with results.
	            for (var r = ((page - 1) * resultsPerPage); r < (page * resultsPerPage); r++) {

	            	var resultIndex = r % resultsPerPage;
					var resultDiv = $(searchResultContent).find("#search-result-listing-" + resultIndex);
					var furnished;
					var address;

					// Handle last page with possibly not 5 items
					if (result[r] == undefined){
							toggleBlockDisplay("#search-result-listing-" + resultIndex, false);
							notShown[r-((page - 1) * resultsPerPage)-1] = true;
					} else {

						if (result[r].approximateAddress == 0){
							address = result[r].streetName + ", " + result[r].city + " " + result[r].state + ", " + result[r].zipcode;
						} else {
							address = result[r].city + " " + result[r].state + ", " + result[r].zipcode;
						}
						// fix for missing distances
						var distance = result[r].distance;
						if (distance == null){ // if this happens more than once on a page it breaks
							distance = "Unknown";
							// callAPI(result[r], function(distanceFound){
							// 	// replace distance with found distance through API
							// 	$(resultDiv).find(".search-result-listing-basic-info").text("Bed: " + result[r].numberOfBedrooms + " | " + "Bath: " + result[r].numberOfBathrooms + " | " + "Furnished: " + furnished + " | Distance from campus: " + distanceFound);
							// });		
						} else distance += " miles"

						// get furnishings
						if (result[r].furnishing == 1) {
							furnished = "Yes";
						} else {
							furnished = "No";
						}

						// put in divs on page
						$(resultDiv).find(".search-result-listing-img").attr("src", "data:image/png;base64," + result[r].imageThumbnail);
						$(resultDiv).find(".search-result-listing-img").unbind('click').click({listingId: result[r].listingId}, onClickToListings);
						$(resultDiv).find(".search-result-listing-address").text(address);
						$(resultDiv).find(".search-result-listing-price").text("$" + result[r].price);
						$(resultDiv).find(".search-result-listing-title").text(result[r].title);
						$(resultDiv).find(".search-result-listing-basic-info").text("Bed: " + result[r].numberOfBedrooms + " | " + "Bath: " + result[r].numberOfBathrooms + " | " + "Furnished: " + furnished + " | Distance To SFSU: " + distance);
						$(resultDiv).find(".search-result-listing-btn").unbind('click').click({listingId: result[r].listingId}, onClickToListings).text("More Info");

						toggleBlockDisplay("#search-result-listing-" + resultIndex, true);

					}
	            }

	            // Determine last shown listing
	            var lastShown = (page * resultsPerPage);
	            for (var i = 0; i < resultsPerPage; i++) {
	            	if (notShown[i]){
	            		lastShown = i + ((page - 1) * resultsPerPage + 1);
	            		break;
	            	}
	            };

	            // Update results shown in number-of-results bar
	            $(searchResultContent).find(".search-result-number-message").text("Showing results " + ((page - 1) * resultsPerPage + 1) + "-" + lastShown + " of " + numOfResultIDs);
			}
	});
}

// Calls google API and returns distance between address and sfsu via callback
function callAPI(result, callback){
	// reload google maps API if not present
	if (!(typeof google === 'object' && typeof google.maps === 'object')) {
		$.getScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyAWtyDBXetSnDbisVRKmZ4AXzDBd1ohSyo&callback=initMap", function(){
   			alert("Reloaded google maps.");
		});
	}

	var destination = '1600 Holloway Ave, San Francisco'; 
	var service = new google.maps.DistanceMatrixService;
	var address = result.streetName + ", " + result.city;
	var distances = [];

	service.getDistanceMatrix({
    	origins: [address],
    	destinations: [destination],
    	travelMode: google.maps.TravelMode.DRIVING,
    	unitSystem: google.maps.UnitSystem.IMPERIAL,
    	avoidHighways: false,
    	avoidTolls: false
		},
		function(response, status) {
			if (status !== google.maps.DistanceMatrixStatus.OK) {
	  			// alert('Error was: ' + status);
			} else {		
				var originList = response.originAddresses;
	  			var destinationList = response.destinationAddresses;

	  			for (var i = 0; i < originList.length; i++) {
	    			var results = response.rows[i].elements;

	    			if (results[0].distance === undefined) distances.push("unknown");
	    			else  distances.push(results[0].distance.text);
  				}
			}
		callback(distances);
	});
}

