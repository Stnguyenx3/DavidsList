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

	var pageContent = $("<div></div>").addClass("row");
	var filter = '<div class="col-sm-3">\
		<p class="search-title">Refine search</p>\
			<div class="search-filter">\
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

		for (i = 0; i < result.length; i++) {
			var row = $("<div></div>").addClass("row search-result-listing").appendTo($(searchResultContent));
			var col1 = $("<div></div>").addClass("col-sm-3").appendTo($(row));
			var col2 = $("<div></div>").addClass("col-sm-9").appendTo($(row));
			var resultThumbnail = $("<img></img>").addClass("search-result-listing-img").appendTo($(col1));
			var listingName = $("<p></p>").addClass("search-result-listing-title").appendTo($(col2));
			var listingPrice = $("<p></p>").addClass("search-result-listing-price").appendTo($(col2));

			$(resultThumbnail).attr("src", "data:image/png;base64," + result[i].imageThumbnail);
			$(listingName).text(result[i].streetName + ", " + result[i].city + " " + result[i].state + ", " + result[i].zipcode);
			$(listingPrice).text("$9,999");

			pageContent.append(searchResultContent);

		}

	$(".container.main").html(pageContent);

}

//Handles ENTER keypress in search field.
function enterPressed(event) {

	if (event.which == 13 || event.keyCode == 13) {
		
		onSearchClick();

		return true;
	}

}