$('#rentout').submit(function (e) {
	e.preventDefault();
	//Figure out how to get id
	//Figure out how to radio button
	var logo = $('#listing-image')[0].files[0];
	var reader = new FileReader();
	reader.onload = function(data) {
	 	var listingInformation = {
			listing_price: $('#price').val(),
			listing_type: $('#inputPassword').val(),
			listing_status: 1,
			listing_detail: {
				listing_numBedrooms: $('#bed').val(),
				listing_numBathrooms: $('#bath').val(),
				listing_internet: $('#inputEmail').val(),
				listing_pet_policy: $('#petpolicy').val(),
				listing_elevator_access: $('#inputPassword').val(),
				listing_furnishing: $('#inputEmail').val(),
				listing_air_conditioning: $('#inputPassword').val(),
				listing_description: $('#description').val(),
			},
			address: {
				approximateAddress: $('#inputEmail').val(),
				streetName: $('#streetname').val(),
				city: $('#city').val(),
				zipcode: $('#zipcode').val(),
				state: $('#state').val(),
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
				
			},
			error: function(xhr, err, errThrown) {
				console.log("I failed");
				console.log(err);
				console.log(errThrown);
			},
		});
	}
	reader.readAsDataURL(logo);
	return false;
});