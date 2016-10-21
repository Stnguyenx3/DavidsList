function onSearchClick() {
	var searchQuery = {
		query: $('test-input').val()
	}
	$('#search-button').onClick('click', function(){
		$.ajax({
			type:'POST',
			url: url+"/search/testsearch",
			data: query,
			dataType: 'json',
			success: function(event) {
				console.log("I succeeded");
			},
			error: function(xhr, err, errThrown){
				console.log("I failed");
			}
		)
	});
}