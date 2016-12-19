$('#accountoverview').submit(function(e) {
	e.preventDefault();
});

$('#information').submit(function(e) {
	e.preventDefault();
});

function onEditClick() {
	if($("#form-bio").is('[readonly]')) {
		$("#form-bio").prop("readonly", false);
		$("#form-address").prop("readonly", false);
		$("#form-city").prop("readonly", false);
		$("#form-state").prop("readonly", false);
		$("#form-phone").prop("readonly", false);
	} else {
		$("#form-bio").prop("readonly", true);
		$("#form-address").prop("readonly", true);
		$("#form-city").prop("readonly", true);
		$("#form-state").prop("readonly", true);
		$("#form-phone").prop("readonly", true);
	}
}

function onSaveClick() {
	var logo = $('#account-image')[0].files[0];
	var reader = new FileReader();
	reader.onload = function(data) {
	 	onSaveLoad(data);
	}

	if(!logo.name.includes("jpg") && !logo.name.includes("jpeg") && !logo.name.includes("png")) {
		$.notify("We only accept jpg, jpeg, or png", {position: "top center", autoHideDelay: 5000});
		return;
	}

	if (logo instanceof Blob) {
			reader.readAsDataURL(logo);
	} else {
		onSaveLoad();
	}
}

function onSaveLoad(data) {
	var str = (window.location + '').split("/");
	var userID = str[str.length - 1];

 	var userInformation = {
 		email: "",
 		username: "",
 		firstname: "",
 		lastname: "",
 		studentID: "",
 		phone: $("#form-phone").val(),
 		bio: $("#form-bio").val(),
 		password: "",
 		address: $("#form-address").val(),
 		city: $("#form-city").val(),
 		state: $("#form-state").val()
	};
	
	if(data != null) {
		userInformation["user_image"] = {
			image: data.target.result
		};
	}

	$.ajax({
		type:'POST',
		url: url+"users/edituser/"+userID,
		data: userInformation,
		success: function(event){
			//Display change successful
			$.notify("User profile is saved!", "success");
			console.log(event);
			$("#user-image").attr("src", data.target.result);
		},
		error: function(xhr, err, errThrown) {
			console.log("I failed");
			console.log(err);
			console.log(errThrown);
		},
	});
}