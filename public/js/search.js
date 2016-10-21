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

		// var img = $('<img id="new-image">');
		// img.attr('src', data.target.result);
		// img.appendTo('#image-container');
		// console.log(img);

	}
	reader.readAsDataURL(logo);
}