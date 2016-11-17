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

function onEditClick(){
	var jsonData = 
	{
		"user_id":$('#test-userid').val(),
		"listing_price": $('#test-price').val(),
		"listing_type": $('#test-type').val(),
		"listing_status": $('#test-status').val(),
		"listing_detail": {
			"listing_numBedrooms": $('#test-bed').val(),
			"listing_numBathrooms": $('#test-bath').val(),
			"listing_internet": $('#test-internet').val(),
			"listing_pet_policy": $('#test-pet').val(),
			"listing_elevator_access": $('#test-elevator').val(),
			"listing_furnishing": $('#test-furnishing').val(),
			"listing_air_conditioning": $('#test-air').val(),
			"listing_description": $('#test-description').val()
		},
		"address": {
			"approximateAddress": $('#test-approximate').val(),
			"streetName": $('#test-street').val(),
			"city": $('#test-city').val(),
			"zipcode": $('#test-zipcode').val(),
			"state": $('#test-state').val()
		}
	};
	$.ajax({
		type:"POST",
		url: url+"/listings/editlisting/"+6,
		data: jsonData,
		success: function(e){
			console.log("Success created details of a listing.");
			console.log(e);
		},
		error: function(xhr, err, errThrown){
			console.log("I failed");
			console.log(err);
			console.log(errThrown);
		}
	});
}

function onNewClick(){

	var logo = $('#test-listimage')[0].files[0];
	// var logo = document.getElementById("test-image").files[0]; 
	var reader = new FileReader();
	reader.onload = function(data) {
		var jsonData = 
		{
			"user_id":$('#test-userid').val(),
			"listing_price": $('#test-price').val(),
			"listing_type": $('#test-type').val(),
			"listing_status": $('#test-status').val(),
			"listing_detail": {
				"listing_numBedrooms": $('#test-bed').val(),
				"listing_numBathrooms": $('#test-bath').val(),
				"listing_internet": $('#test-internet').val(),
				"listing_pet_policy": $('#test-pet').val(),
				"listing_elevator_access": $('#test-elevator').val(),
				"listing_furnishing": $('#test-furnishing').val(),
				"listing_air_conditioning": $('#test-air').val(),
				"listing_description": $('#test-description').val()
			},
			"address": {
				"approximateAddress": $('#test-approximate').val(),
				"streetName": $('#test-street').val(),
				"city": $('#test-city').val(),
				"zipcode": $('#test-zipcode').val(),
				"state": $('#test-state').val()
			},
			"listing_image": {
				"image": data.target.result
			}
		};
		$.ajax({
			type:"POST",
			url: url+"/listings/newlisting",
			data: jsonData,
			success: function(e){
				console.log("Success created details of a listing.");
				console.log(e);
			},
			error: function(xhr, err, errThrown){
				console.log("I failed");
				console.log(err);
				console.log(errThrown);
			}
		});
	}
	reader.readAsDataURL(logo);
}
