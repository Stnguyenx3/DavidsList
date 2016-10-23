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

function onSearchClick() {
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