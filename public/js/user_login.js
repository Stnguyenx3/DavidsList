$('#login-form').submit(function (e) {
	e.preventDefault();
 	var loginCredential = {
		email: $('#inputEmail').val(),
		password: $('#inputPassword').val()
	};
	
	$.ajax({
		type:'POST',
		url: url+"/users/login/",
		data: loginCredential,
		success: function(event){
			if(event === "null") {
				$.notify("Invalid Username/Password combination!", {position: "top center"});
			} else if (event === "wrong") {
				$.notify("Invalid Username/Password combination!", {position: "top center"});
			} else {
				window.location.replace(url);
			}
		},
		error: function(xhr, err, errThrown) {
			console.log("I failed");
			console.log(err);
			console.log(errThrown);
		},
	});
 	return false;
});