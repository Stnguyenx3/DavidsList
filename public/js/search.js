function toggleBlockDisplay (blockID, on) {
	var selector = "#" + blockID;
	var status = $(selector).css("display");

	if(on) $(selector).css("display", "block");
	else{
		$(selector).css("display", "none");
		console.log(selector);
	}
}

//Allowing pressing the enter key to search
$(document).keypress(function(event){
    if(event.keyCode === 13) {
        onSearchClick();
    }
});

//Creates an AJAX request to search for apartments(More like search for addresses)
function onSearchClick() {

	if($('#search-input').val() !== "") {
		var searchQuery = {
		city: $('#search-input').val()
		}
		$('#search-input').val("");
		$.ajax({
			type:'POST',
			url: url+"/search/searchapartments/",
			data: searchQuery,
			success: formatResults,
			error: function(xhr, err, errThrown) {
				console.log("I failed");
				console.log(err);
				console.log(errThrown);
			},
		});
	}
}

function formatResults(event) {

	var result = JSON.parse(event);
	var numOfResults = result.length;
	var resultsPerPage = 5; //MAX NUMBER OF RESULTS PER PAGINATION PAGE.
	var numOfPages = Math.ceil(numOfResults / resultsPerPage);

	var pageContent = $("<div></div>").addClass("row");
	var filter = '<div class="listing-map" id="listing-map" style="visibility: hidden; position: absolute; top: -9999px;"></div>\
	<div class="col-sm-3">\
		<p class="search-title">Refine search</p>\
			<div class="search-filter linear-gradient-bg">\
				<div class="form-group search-filter-price" id="filter-form">\
					<label>Price</label>\
					<br>\
					<label for="search-filter-price-range1">\
						<input type="checkbox" id="search-filter-price-range1" value="500" checked=true>Under $500\
					</label>\
					<br>\
					<label for="search-filter-price-range2">\
						<input type="checkbox" id="search-filter-price-range2" value="750" onChange="onSelectFilter(event)" checked=true>$500 to $750\
					</label>\
					<br>\
					<label for="search-filter-price-range3">\
						<input type="checkbox" id="search-filter-price-range3" value="1000" onChange="onSelectFilter(event)" checked=true>$750 to $1000\
					</label>\
					<br>\
					<label for="search-filter-price-range4">\
						<input type="checkbox" id="search-filter-price-range4" value="1000" onChange="onSelectFilter(event)" checked=true>$1000 &amp; Above\
					</label>\
					<div class="form-group">\
						<label>Rooms</label>\
						<br>\
						<label for="search-filter-bedroom-range1">\
							<input type="checkbox" id="search-filter-bedroom-range1" value="1" onChange="onSelectFilter(event)" checked=true>1\
						</label>\
						<br>\
						<label for="search-filter-bedroom-range2">\
							<input type="checkbox" id="search-filter-bedroom-range2" value="2" onChange="onSelectFilter(event)" checked=true>2\
						</label>\
						<br>\
						<label for="search-filter-bedroom-range3">\
							<input type="checkbox" id="search-filter-bedroom-range3" value="3" onChange="onSelectFilter(event)" checked=true>3+\
						</label>\
					</div>\
					<div class="form-group">\
						<label>Distance from SFSU</label>\
						<br>\
						<label for="search-filter-distance-range1">\
							<input type="checkbox" id="search-filter-distance-range1" value="1" onChange="onSelectFilter(event)" checked=true>Under 1 mile\
						</label>\
						<br>\
						<label for="search-filter-distance-range2">\
							<input type="checkbox" id="search-filter-distance-range2" value="3" onChange="onSelectFilter(event)" checked=true>1-3 miles\
						</label>\
						<br>\
						<label for="search-filter-distance-range3">\
							<input type="checkbox" id="search-filter-distance-range3" value="3" onChange="onSelectFilter(event)" checked=true>3 miles &amp; Above\
						</label>\
					</div>\
				</div>\
			</div>\
		</div>'

	pageContent.append(filter);

	var searchResultContent = ($("<div></div>").addClass("col-sm-9"));
	$(searchResultContent).attr("id", "searchResultContent");

	$(searchResultContent).append($("<p>Results</p>").addClass("search-title"));

	//Check for no results.

	if (result.length == 0) {
		//Disable search filters...

		//Display message to user.
		var row = $("<div></div>").addClass("row search-result-listing linear-gradient-bg").appendTo($(searchResultContent));
		var col = $("<div></div>").addClass("col-sm-12").appendTo($(row));
		var message = $("<p></p>").addClass("search-result-listing-null").appendTo($(col));

		$(message).text("No results! Try another search!");

		pageContent.append(searchResultContent);

	}

	//Result page layout.

	for (i = 0; i < resultsPerPage; i++) {
		var row = $("<div></div>").addClass("row search-result-listing linear-gradient-bg").appendTo($(searchResultContent));
		var col1 = $("<div></div>").addClass("col-sm-3").appendTo($(row));
		var col2 = $("<div></div>").addClass("col-sm-9").appendTo($(row));
		var resultThumbnail = $("<img></img>").addClass("search-result-listing-img").appendTo($(col1));
		var listingName = $("<p></p>").addClass("search-result-listing-title").appendTo($(col2));
		var listingPrice = $("<p></p>").addClass("search-result-listing-price").appendTo($(col2));
		var listingBasicInfo = $("<p></p>").addClass("search-result-listing-basic-info").appendTo($(col2));
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

	if (numOfResults == 0) {
		toggleBlockDisplay("result-pagination-wrapper", true);
	}

	$(".container.main").html(pageContent);

	// couple the onSelectFilter function to all checkboxes
	var checkboxes = document.getElementById("filter-form").getElementsByTagName("input");
	for (var i = 0; i < checkboxes.length; i++) {
		checkboxes[i].onchange = function(event) {
			onSelectFilter(event, result);
		}
	}

	var resultIDs = writeListingID(result, numOfResults); // start with showing everything
	updateSearchResults(resultsPerPage, result, resultIDs);

	// filters when one of teh checkboxes is checked
	function onSelectFilter(event, result){

		// get all values needed form the event to filter
		var id = event.target.id;
		var subtype = parseInt(id.slice(-1));
		var type = id.substr(14);
		type = type.substr(0, type.length -7);

		var checked = event.target.checked;
		var compareValue = parseInt(event.target.value);

		// start going through all results
		for (var i = 0; i < numOfResults; i++) {

			var price = parseInt(result[i].price);
			var rooms = parseInt(result[i].numberOfBedrooms);
			var distance = result[i].distance;
			if (distance === undefined) distance = 500; // HOW ELSE TO HANDLE??
			else distance = parseFloat(distance);

			// check for price
			if (type === "price"){
				if ((subtype == 1 && price < compareValue) || (subtype == 4 && price >= compareValue) || (price <compareValue && price >= compareValue-250 && subtype != 4)){
					var index = resultIDs.indexOf(result[i].listingId);
					if(!checked){
						if (index > -1) resultIDs.splice(index, 1);
					} else { 
						if (index == -1) resultIDs.push(result[i].listingId);
					}
				}
			} 
			// check for rooms
			else if (type === "bedroom"){
				if (rooms == compareValue || (rooms >=compareValue && subtype == 3)){
					// console.log(rooms, compareValue);	
					var index = resultIDs.indexOf(result[i].listingId);
					if(!checked){
						if (index > -1) resultIDs.splice(index, 1);
					} else { 
						if (index == -1) resultIDs.push(result[i].listingId);
					}
				}
			}

			// check for distance
			if (type === "distance"){
				if ((distance < compareValue && distance >= compareValue-1)||(distance >= compareValue && subtype==3)){
					
					var index = resultIDs.indexOf(result[i].listingId);
					if(!checked){
						if (index > -1) resultIDs.splice(index, 1);
					} else { 
						if (index == -1) resultIDs.push(result[i].listingId);
					}
				}
			}	
		}
		// update live on page
		updateSearchResults(resultsPerPage, result, resultIDs);
	}

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

    // Repopulate
	$(".result-pagination").twbsPagination({
	        totalPages: numOfPages,
	        visiblePages: 10,
	        onPageClick: function (event, page) {
	        	var rememberDiv, rememberResult,rememberFurnished;
	            //Populate HTML divs with results.

	            for (var r = ((page - 1) * resultsPerPage); r < (page * resultsPerPage); r++) {

	            	var resultIndex = r % resultsPerPage;
					var resultDiv = $(searchResultContent).find("#search-result-listing-" + resultIndex);
					var furnished;

					if (result[r] == undefined){
							toggleBlockDisplay("search-result-listing-" + resultIndex, false);
					} else {

						// fix for missing distances
						var distance = result[r].distance;
						if (distance == undefined){ // if this happens more than once on a page it breaks
							// remember the result that failed
							rememberDiv = resultDiv;
							rememberResult = result[r];
							rememberFurnished = furnished;
							callAPI(rememberResult, function(distanceFound){
								// replace distance with found distance through API
								$(rememberDiv).find(".search-result-listing-basic-info").text("Bed: " + rememberResult.numberOfBedrooms + " | " + "Bath: " + rememberResult.numberOfBathrooms + " | " + "Furnished: " + furnished + " | Distance from campus: " + distanceFound);
							});
							distance = "";
						}

						// get furnishings
						if (result[r].furnishing == 1) {
							furnished = "Yes";
						} else {
							furnished = "No";
						}

						// put in divs on page
						$(resultDiv).find(".search-result-listing-img").attr("src", "data:image/png;base64," + result[r].imageThumbnail);
						$(resultDiv).find(".search-result-listing-img").click({listingId: result[r].listingId}, onClickToListings);
						$(resultDiv).find(".search-result-listing-title").text(result[r].streetName + ", " + result[r].city + " " + result[r].state + ", " + result[r].zipcode);
						$(resultDiv).find(".search-result-listing-price").text("$" + result[r].price);
						$(resultDiv).find(".search-result-listing-basic-info").text("Bed: " + result[r].numberOfBedrooms + " | " + "Bath: " + result[r].numberOfBathrooms + " | " + "Furnished: " + furnished + " | Distance from campus: " + result[r].distance);
						$(resultDiv).find(".search-result-listing-btn").click({listingId: result[r].listingId}, onClickToListings).text("Rent");

						toggleBlockDisplay("search-result-listing-" + resultIndex, true);

					}
	            }
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

