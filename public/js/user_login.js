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
				$("#inputPassword").notify("Invalid Username/Password combination!", {position: "right-middle"});
			} else if (event === "wrong") {
				$("#inputPassword").notify("Invalid Username/Password combination!", {position: "right-middle"});
			} else {
				window.location.replace(event);
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