$('#rentout').submit(function (e) {
	e.preventDefault();

	var fileUploadField = document.getElementById('form-image');
	var fileList = new Array();
	var blobList = new Array();

	var index = 0;

	$.each(fileUploadField.files, function(i, j) {
		var reader = new FileReader();
		reader.readAsDataURL(j);
		if(j.name.includes("jpg") || j.name.includes("jpeg") || j.name.includes("png")) {
			reader.onload = function(data) {
				index++;
				blobList.push(data.target.result);
				if(index === fileUploadField.files.length) {
					submitListing(blobList);
				}
			}
		} else {
			$.notify("We only accept jpg, jpeg, or png", {position: "top center", autoHideDelay: 5000});
		}
	});
});

function submitListing(blobList) {
	var type = '';

	if($("input[type='radio'][name='listingtype']").is(':checked')) {
		var type = $("input[type='radio'][name='listingtype']:checked").val();
	}

	if($('#form-title').val() === "") {
		return;
	}

 	var listingInformation = {
		listing_price: $('#form-price').val(),
		listing_type: type,
		listing_status: 1,
		listing_title: $('#form-title').val(),
		listing_detail: {
			listing_numBedrooms: $('#form-numofbeds option:selected').text() == "N/A" ? 0 : $('#form-numofbeds option:selected').text(),
			listing_numBathrooms: $('#form-numofbaths option:selected').text()  == "N/A" ? 0 : $('#form-numofbaths option:selected').text(),
			listing_internet: $('#listing-internet').is(":checked") ? 1 : 0,
			listing_pet_policy: $('#listing-pets').is(":checked") ? "Yes" : "No",
			listing_elevator_access: $('#listing-elevator').is(":checked") ? "Yes" : "No",
			listing_furnishing: $('#listing-furnished').is(":checked") ? 1 : 0,
			listing_air_conditioning: $('#listing-ac').is(":checked") ? 1 : 0,
			listing_description: $('#listing-description').val(),
		},
		address: {
			approximateAddress: $('#form-approx').is(":checked") ? 1 : 0,
			streetName: $('#form-address').val(),
			city: $('#form-city').val(),
			zipcode: $('#form-zipcode').val(),
			state: $('#form-state').val(),
		},
		listing_image: {
			image: blobList
		}
	};
	
	$("#submit-listing").prop("disabled", true);
	
	$.ajax({
		type:'POST',
		url: url+"/listings/newlisting/",
		data: listingInformation,
		success: function(event){
			if(event !== "Bad create") {
				let splitString = event.split(" ");
				let listingId = splitString[11];
				listingId = listingId.replace(/\'/g, "");
				window.location.replace(url+"listings/getlisting/"+listingId);
			}
		},
		error: function(xhr, err, errThrown) {
			console.log("I failed");
			console.log(err);
			console.log(errThrown);
		},
	});
}

$('#edit').submit(function (e) {
	e.preventDefault();

	var fileUploadField = document.getElementById('form-image');
	var fileList = new Array();
	var blobList = new Array();

	var index = 0;

	$.each(fileUploadField.files, function(i, j) {
		var reader = new FileReader();
		reader.readAsDataURL(j);
		console.log(j);
		reader.onload = function(data) {
			index++;
			blobList.push(data.target.result);

			if(index === fileUploadField.files.length) {
				onEditLoad(blobList);
			}
		}
	});

	if (fileUploadField.files.length === 0) {
		onEditLoad();
	} 
	return false;
});

function onEditLoad(data) {
	var type = '';

	if($("input[type='radio'][name='listingtype']").is(':checked')) {
		var type = $("input[type='radio'][name='listingtype']:checked").val();
	}

	if($('#form-title').val() === "") {
		return;
	}

	var str = (window.location + '').split("/");
	var listingID = str[str.length - 1];

 	var listingInformation = {
 		listingId: listingID,
		listing_price: $('#form-price').val(),
		listing_type: type,
		listing_title: $('#form-title').val(),
		listing_status: 1,
		listing_detail: {
			listing_numBedrooms: $('#form-numofbeds option:selected').text() == "N/A" ? 0 : $('#form-numofbeds option:selected').text(),
			listing_numBathrooms: $('#form-numofbaths option:selected').text()  == "N/A" ? 0 : $('#form-numofbaths option:selected').text(),
			listing_internet: $('#listing-internet').is(":checked") ? 1 : 0,
			listing_pet_policy: $('#listing-pets').is(":checked") ? "Yes" : "No",
			listing_elevator_access: $('#listing-elevator').is(":checked") ? "Yes" : "No",
			listing_furnishing: $('#listing-furnished').is(":checked") ? 1 : 0,
			listing_air_conditioning: $('#listing-ac').is(":checked") ? 1 : 0,
			listing_description: $('#listing-description').val(),
		},
		address: {
			approximateAddress: $('#form-approx').is(":checked") ? 1 : 0,
			streetName: $('#form-address').val(),
			city: $('#form-city').val(),
			zipcode: $('#form-zipcode').val(),
			state: $('#form-state').val(),
		}
	};
	
	if(data != null) {
		listingInformation["listing_image"] = {
			image: data
		};
	}

	$("#submit-listing").prop("disabled", true);

	$.ajax({
		type:'POST',
		url: url+"/listings/editlisting/",
		data: listingInformation,
		success: function(event){
			window.location.replace(url+"listings/getlisting/"+listingID);
		},
		error: function(xhr, err, errThrown) {
			console.log("I failed");
			console.log(err);
			console.log(errThrown);
		},
	});
}

function onFavoriteClick() {
	var str = (window.location + '').split("/");
	var listingID = str[str.length - 1];

	favoriteInformation = {
		listingId: listingID
	};

	$.ajax({
		type:'POST',
		url: url+"favoritelistings/addfavorite/",
		data: favoriteInformation,
		success: function(event) {

			if(event == 1) {
				$.notify("Listing added to favorites!", "success");
			} else if (event === "You are not logged in") {
				window.location.replace(url+"home/login/");
			} else {
				$.notify(event, "error");
			}
		},
		error: function(xhr, err, errThrown) {
			console.log("I failed");
			console.log(err);
			console.log(errThrown);
		}
	});
}