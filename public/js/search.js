function toggleBlockDisplay (blockID) {
	var selector = "#" + blockID;
	var status = $(selector).css("display");

	$(selector).css("display", "block");


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
	//console.log(event);
	var result = JSON.parse(event);
	var numOfResults = result.length;

	console.log(result[5]);

	var pageContent = $("<div></div>").addClass("row");
	var filter = '<div class="col-sm-3">\
		<p class="search-title">Refine search</p>\
			<div class="search-filter linear-gradient-bg">\
				<div class="form-group search-filter-price">\
					<label>Price</label>\
					<br>\
					<label for="search-filter-price-range1">\
						<input type="checkbox" id="search-filter-price-range1" value="">Under $500\
					</label>\
					<br>\
					<label for="search-filter-price-range2">\
						<input type="checkbox" id="search-filter-price-range2" value="">$500 to $750\
					</label>\
					<br>\
					<label for="search-filter-price-range3">\
						<input type="checkbox" id="search-filter-price-range3" value="">$750 to $1000\
					</label>\
					<br>\
					<label for="search-filter-price-range4">\
						<input type="checkbox" id="search-filter-price-range4" value="">$1000 &amp; Above\
					</label>\
					<div class="form-group">\
						<label>Rooms</label>\
						<br>\
						<label for="search-filter-bedroom-range1">\
							<input type="checkbox" id="search-filter-bedroom-range1" value="">1\
						</label>\
						<br>\
						<label for="search-filter-bedroom-range2">\
							<input type="checkbox" id="search-filter-bedroom-range2" value="">2\
						</label>\
						<br>\
						<label for="search-filter-bedroom-range3">\
							<input type="checkbox" id="search-filter-bedroom-range3" value="">3+\
						</label>\
					</div>\
					<div class="form-group">\
						<label>Distance from SFSU</label>\
						<br>\
						<label for="search-filter-distance-range1">\
							<input type="checkbox" id="search-filter-distance-range1" value="">Under 1 mile\
						</label>\
						<br>\
						<label for="search-filter-distance-range2">\
							<input type="checkbox" id="search-filter-distance-range2" value="">2-3 miles\
						</label>\
						<br>\
						<label for="search-filter-distance-range3">\
							<input type="checkbox" id="search-filter-distance-range3" value="">4 miles &amp; Above\
						</label>\
					</div>\
				</div>\
			</div>\
		</div>'

		pageContent.append(filter);

		var searchResultContent = ($("<div></div>").addClass("col-sm-9"));

		$(searchResultContent).append($("<p>Results</p>").addClass("search-title"));

		//Check for no results.

		if (result.length == 0) {
			//Disable search filters...


			//Display message to user.
			var row = $("<div></div>").addClass("row search-result-listing").appendTo($(searchResultContent));
			var col = $("<div></div>").addClass("col-sm-12").appendTo($(row));
			var message = $("<p></p>").addClass("search-result-listing-null").appendTo($(col));

			$(message).text("No results! Try another search!");

			pageContent.append(searchResultContent);

		}

	var resultsPerPage = 5; //MAX NUMBER OF RESULTS PER PAGINATION PAGE.

	var numOfPages = Math.ceil(numOfResults / resultsPerPage);

	//console.log("There will be " + numOfPages + " pages." + " results = " + numOfResults);

	//Result page layout.

	for (i = 0; i < resultsPerPage; i++) {
		var row = $("<div></div>").addClass("row search-result-listing linear-gradient-bg").appendTo($(searchResultContent));
		var col1 = $("<div></div>").addClass("col-sm-3").appendTo($(row));
		var col2 = $("<div></div>").addClass("col-sm-9").appendTo($(row));
		var resultThumbnail = $("<img></img>").addClass("search-result-listing-img").appendTo($(col1));
		var listingName = $("<p></p>").addClass("search-result-listing-title").appendTo($(col2));
		var listingPrice = $("<p></p>").addClass("search-result-listing-price").appendTo($(col2));
		var listingBasicInfo = $("<p></p>").addClass("search-result-listing-basic-info").appendTo($(col2));
		var rentButton = $("<a></a>").addClass("btn btn-primary search-result-listing-btn").appendTo($(col2));

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
		toggleBlockDisplay("result-pagination-wrapper");
	}

	$(".container.main").html(pageContent);


	// Handle Pagination events

	$(".result-pagination").twbsPagination({
	        totalPages: numOfPages,
	        visiblePages: 10,
	        onPageClick: function (event, page) {
	            //Populate HTML divs with results.

	            console.log("page " + page + " clicked.");

	            for (var r = ((page - 1) * resultsPerPage); r < (page * resultsPerPage); r++) {

	            	var resultIndex = r % resultsPerPage;

					var resultDiv = $(searchResultContent).find("#search-result-listing-" + resultIndex);

					var furnished;

					if (result[r].furnishing == 1) {
						furnished = "Yes";
					} else {
						furnished = "No";
					}

					$(resultDiv).find(".search-result-listing-img").attr("src", "data:image/png;base64," + result[r].imageThumbnail);
					$(resultDiv).find(".search-result-listing-title").text(result[r].streetName + ", " + result[r].city + " " + result[r].state + ", " + result[r].zipcode);
					$(resultDiv).find(".search-result-listing-price").text("$" + result[r].price);
					$(resultDiv).find(".search-result-listing-basic-info").text("Bed: " + result[r].numberOfBedrooms + " | " + "Bath: " + result[r].numberOfBathrooms + " | " + "Furnished: " + furnished);
					$(resultDiv).find(".search-result-listing-btn").text("Rent");


					toggleBlockDisplay("search-result-listing-" + r);

					

	            }
			}
	});
}

//Handles ENTER keypress in search field.
function enterPressed(event) {

	if (event.which == 13 || event.keyCode == 13) {
		
		onSearchClick();

		return true;
	}

}

function updateSearchResults(currentPage) {

}