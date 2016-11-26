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
	console.log("I have saved");
	//Ajax
}