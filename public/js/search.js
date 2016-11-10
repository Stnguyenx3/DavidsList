function onGetClick() {
	$.ajax({
		type:'GET',
		url: url+"/search/testget/"+$('#test-input').val(),
		success: function(event) {
			console.log("I succeeded");
			console.log(event);
		},
		error: function(xhr, err, errThrown) {
			console.log("I failed");
			console.log(err);
			console.log(errThrown);
		}
	});
}

function onPostClick() {
	var searchQuery = {
		query: $('#test-input').val()
	}
	$.ajax({
		type:'POST',
		url: url+"/search/testpost/",
		data: searchQuery,
		success: function(event) {
			console.log("I succeeded");
			console.log(event);
		},
		error: function(xhr, err, errThrown) {
			console.log("I failed");
			console.log(err);
			console.log(errThrown);
		}
	});
}

function onGetJsonClick() {
	var searchQuery = {
		query: $('#test-input').val()
	}
	$.ajax({
		type:'POST',
		url: url+"/search/sendjson/",
		data: searchQuery,
		success: function(event) {
			console.log("I succeeded");
			console.log(event);
		},
		error: function(xhr, err, errThrown) {
			console.log("I failed");
			console.log(err);
			console.log(errThrown);
		}
	});
}

function uploadImage() {
	var logo = $('#test-image')[0].files[0];
	// var logo = document.getElementById("test-image").files[0]; 
	var reader = new FileReader();
	reader.onload = function(data) {

		var imageQuery = {
			name:"test.jpg",
			imageData: data.target.result
		};

		$.ajax({
			type:'POST',
			url: url+"/search/testimage/",
			data: imageQuery,
			success: function(event) {
				
			},
			error: function(xhr, err, errThrown) {

			}
		});

		var img = $('<img id="new-image">');
		img.attr('src', data.target.result);
		img.appendTo('#image-container');
		console.log(img);

	}
	reader.readAsDataURL(logo);
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

//Function to capture the results of the AJAX call and format the page
//based on the results
function formatResults(event) {
	console.log("I succeeded");
	console.log(event);
	var test = JSON.parse(event);

	var table = $('<table></table>').addClass('search');
	var tablehead = $('<thead></thead>');
	tablehead.append($('<tr></tr>')
						.append($('<td></td>').text("ListingId"))
						.append($('<td></td>').text("Street Name"))
						.append($('<td></td>').text("City"))
						.append($('<td></td>').text("Zipcode"))
						.append($('<td></td>').text("State"))
						.append($('<td></td>').text("ImageThumbnail")));
	table.append(tablehead);
	var tablebody = $('<tbody></tbody>');

	for(i=0; i<test.length; i++){
    	var row = $('<tr></tr>')
    			.append($("<td></td>").text(test[i]["listingId"]))
    			.append($("<td></td>").text(test[i]["streetName"]))
    			.append($("<td></td>").text(test[i]["city"]))
    			.append($("<td></td>").text(test[i]["zipcode"]))
    			.append($("<td></td>").text(test[i]["state"]))
    			.append($("<td></td>")
    				.append(
    					$("<img></img>")
    						.attr('src', "data:image/png;base64,"+test[i]["imageThumbnail"])));
    	tablebody.append(row);
	}
	table.append(tablebody);
	$('#search-result-container').html(table);
}

function onTestListingClick(){
	var jsonData = {
		"listing_price": 500, 
		"listing_type": "Apartement",
		"listing_numBedrooms": 5,
		"listing_numBathrooms": 2,
		"listing_internet": 1,
		"listing_pet_policy": "No Cats",
		"listing_elevator_access": "One on the first floor",
		"listing_furnishing": 1,
		"listing_air_conditioning": 1,
		"listing_description": "It's a nice place. I swear",
		"listing_street_name": "5th Street",
		"listing_city_name": "San Francisco",
		"listing_zip_code": "94135",
		"listing_state": "CA"

	};
	$.ajax({
		type:"POST",
		url: url+"/listings/editlisting/1",
		data: jsonData,
		success: function(e) {
			console.log("SUCCESS");
			console.log(e);

		},
		error: function(xhr, err, errThrown) {
			console.log("I failed");
			console.log(err);
			console.log(errThrown);

		}
	});
}