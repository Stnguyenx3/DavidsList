$('#rentout').submit(function (e) {
	e.preventDefault();
	var logo = $('#form-image')[0].files[0];
	var reader = new FileReader();
	reader.onload = function(data) {

		var type = '';

		if($("input[type='radio'][name='listingtype']").is(':checked')) {
    		var type = $("input[type='radio'][name='listingtype']:checked").val();
		}

	 	var listingInformation = {
			listing_price: $('#form-price').val(),
			listing_type: type,
			listing_status: 1,
			listing_detail: {
				listing_numBedrooms: $('#form-numofbeds').val(),
				listing_numBathrooms: $('#form-numofbaths').val(),
				listing_internet: $('#listing-internet').is(":checked") ? 1 : 0,
				listing_pet_policy: $('#listing-pets').is(":checked") ? "yes" : "no",
				listing_elevator_access: $('#listing-elevator').is(":checked") ? "yes" : "no",
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
				image: data.target.result
			}
		};
		
		$.ajax({
			type:'POST',
			url: url+"/listings/newlisting/",
			data: listingInformation,
			success: function(event){
				let splitString = event.split(" ");
				let listingId = splitString[11];
				listingId = listingId.replace(/\'/g, "");
				window.location.replace(url+"listings/getlisting/"+listingId);
			},
			error: function(xhr, err, errThrown) {
				console.log("I failed");
				console.log(err);
				console.log(errThrown);
			},
		});
	}
	reader.readAsDataURL(logo);
});

$('#edit').submit(function (e) {
	e.preventDefault();
	var logo = $('#form-image')[0].files[0];
	var reader = new FileReader();
	reader.onload = function(data) {
	 	onEditLoad(data);
	}
	if (logo instanceof Blob) {
		reader.readAsDataURL(logo);
	} else {
		onEditLoad();
	}
	return false;
});

function onEditLoad(data) {
	var type = '';

	if($("input[type='radio'][name='listingtype']").is(':checked')) {
		var type = $("input[type='radio'][name='listingtype']:checked").val();
	}

	var str = (window.location + '').split("/");
	var listingID = str[str.length - 1];

 	var listingInformation = {
 		listingId: listingID,
		listing_price: $('#form-price').val(),
		listing_type: type,
		listing_status: 1,
		listing_detail: {
			listing_numBedrooms: $('#form-numofbeds').val(),
			listing_numBathrooms: $('#form-numofbaths').val(),
			listing_internet: $('#listing-internet').is(":checked") ? 1 : 0,
			listing_pet_policy: $('#listing-pets').is(":checked") ? "yes" : "no",
			listing_elevator_access: $('#listing-elevator').is(":checked") ? "yes" : "no",
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
			image: data.target.result
		};
	}

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