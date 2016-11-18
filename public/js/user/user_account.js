function registerOnClick() {
	var userInformation = {
		email: $('#form-email').val(),
		username: $('#form-username').val(),
		password: $('#form-password').val(),
		firstname: $('#form-first-name').val(),
		lastname: $('#form-last-name').val()
	};

	$.ajax({
		type: "POST",
		url: url+"/users/newuser/",
		data: userInformation,
		success: function(e) {

		},
		error: function(xhr, err, errThrown) {

		}
	});
}