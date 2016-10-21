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
