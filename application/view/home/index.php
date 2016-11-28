<div class="container main">
	<div class="row">
		<div class="col-md-12">
			<h1 class="centered-header">Welcome To DavidsList! Rent A Room and Stay A While</h1>
			<p style="padding-left: 100px; padding-right: 100px; font-size: 16px;">
				DavidsList is an apartment rental website created by SFSU students for SFSU students. We believe that
				students are more willing to rent from other students because they share something in common, going to
				 an awesome school such as SFSU. Although we do not guarantee that your experience will be 100% safe,
				it is much more safer than searching for an apartment posted by a complete stranger! We hope that you
				will find a place to rent and have an awesome academic career!
			</p>
		</div>
	</div>

	<div class="row">

		<div class="col-md-4">

			<div class="featured-listing-container custom-border linear-gradient-bg" style="overflow:hidden">
			
				<img class="featured-listing-img" src="<?php echo $newListingImages[0] ?>" alt="Image missing." style="width: 250px; height: 250px;">

				<h3 class="featured-listing-title"><?php echo $newListings["addresses"][0]->getStreetName() ?></h3>

				<p class="featured-listing-price">Price: $<?php echo $newListings["listings"][0]->getPrice() ?></p>

				<div>
					<ul class="featured-listing-info">
						<li>Bed: <?php echo $newListings["listing_details"][0]->getNumberOfBedrooms() ?></li>
						<li>Bath: <?php echo $newListings["listing_details"][0]->getNumberOfBathrooms() ?></li>
						<li>Distance To SFSU:</li>
						<li id="output"></li>
					</ul>
				</div>

				<a href="<?php echo URL . "listings/getlisting/" . $newListings["listings"][0]->getListingId() ?>" class="btn btn-primary featured-listing-btn">Rent</a>

			</div>

		</div>

		<div class="col-md-4">

			<div class="featured-listing-container custom-border linear-gradient-bg" style="overflow:hidden">
			
				<img class="featured-listing-img" src="<?php echo $newListingImages[1] ?>" alt="Image missing." style="width: 250px ; height: 250px;">

				<h3 class="featured-listing-title"><?php echo $newListings["addresses"][1]->getStreetName() ?></h3>

				<p class="featured-listing-price">Price: $<?php echo $newListings["listings"][1]->getPrice() ?></p>

				<div>
					<ul class="featured-listing-info">
						<li>Bed: <?php echo $newListings["listing_details"][1]->getNumberOfBedrooms() ?></li>
						<li>Bath: <?php echo $newListings["listing_details"][1]->getNumberOfBathrooms() ?></li>
						<li>Distance To SFSU:</li>
						<li id="output"></li>
					</ul>
				</div>

				<a href="<?php echo URL . "listings/getlisting/" . $newListings["listings"][1]->getListingId() ?>" class="btn btn-primary featured-listing-btn">Rent</a>

			</div>

		</div>

		<div class="col-md-4">

			<div class="featured-listing-container custom-border linear-gradient-bg" style="overflow:hidden">
			
				<img class="featured-listing-img" src="<?php echo $newListingImages[2] ?>" alt="Image missing." style="width: 250px ; height: 250px;">

				<h3 class="featured-listing-title"><?php echo $newListings["addresses"][2]->getStreetName() ?></h3>

				<p class="featured-listing-price">Price: $<?php echo $newListings["listings"][2]->getPrice() ?></p>

				<div>
					<ul class="featured-listing-info">
						<li>Bed: <?php echo $newListings["listing_details"][2]->getNumberOfBedrooms() ?></li>
						<li>Bath: <?php echo $newListings["listing_details"][2]->getNumberOfBathrooms() ?></li>
						<li>Distance To SFSU:</li>
						<li id="output"></li>
					</ul>
				</div>

				<a href="<?php echo URL . "listings/getlisting/" . $newListings["listings"][2]->getListingId() ?>" class="btn btn-primary featured-listing-btn">Rent</a>

			</div>

		</div>

	</div>

	<div class="row">

		<div class="col-md-4">

			<div class="featured-listing-container custom-border linear-gradient-bg" style="overflow:hidden">
			
				<img class="featured-listing-img" src="<?php echo $newListingImages[3] ?>" alt="Image missing." style="width: 250px ; height: 250px;">

				<h3 class="featured-listing-title"><?php echo $newListings["addresses"][3]->getStreetName() ?></h3>

				<p class="featured-listing-price">Price: $<?php echo $newListings["listings"][3]->getPrice() ?></p>

				<div>
					<ul class="featured-listing-info">
						<li>Bed: <?php echo $newListings["listing_details"][3]->getNumberOfBedrooms() ?></li>
						<li>Bath: <?php echo $newListings["listing_details"][3]->getNumberOfBathrooms() ?></li>
						<li>Distance To SFSU:</li>
						<li id="output"></li>
					</ul>
				</div>

				<a href="<?php echo URL . "listings/getlisting/" . $newListings["listings"][3]->getListingId() ?>" class="btn btn-primary featured-listing-btn">Rent</a>


			</div>

		</div>

		<div class="col-md-4">

			<div class="featured-listing-container custom-border linear-gradient-bg" style="overflow:hidden">
			
				<img class="featured-listing-img" src="<?php echo $newListingImages[4] ?>" alt="Image missing." style="width: 250px ; height: 250px;">

				<h3 class="featured-listing-title"><?php echo $newListings["addresses"][4]->getStreetName() ?></h3>

				<p class="featured-listing-price">Price: $<?php echo $newListings["listings"][4]->getPrice() ?></p>

				<div>
					<ul class="featured-listing-info">
						<li>Bed: <?php echo $newListings["listing_details"][4]->getNumberOfBedrooms() ?></li>
						<li>Bath: <?php echo $newListings["listing_details"][4]->getNumberOfBathrooms() ?></li>
						<li>Distance To SFSU:</li>
						<li id="output"></li>
					</ul>
				</div>

				<a href="<?php echo URL . "listings/getlisting/" . $newListings["listings"][4]->getListingId() ?>" class="btn btn-primary featured-listing-btn">Rent</a>


			</div>

		</div>

		<div class="col-md-4">

			<div class="featured-listing-container custom-border linear-gradient-bg" style="overflow:hidden">
			
				<img class="featured-listing-img" src="<?php echo $newListingImages[5] ?>" alt="Image missing." style="width: 250px ; height: 250px;">

				<h3 class="featured-listing-title"><?php echo $newListings["addresses"][5]->getStreetName() ?></h3>

				<p class="featured-listing-price">Price: $<?php echo $newListings["listings"][5]->getPrice() ?></p>

				<div>
					<ul class="featured-listing-info">
						<li>Bed: <?php echo $newListings["listing_details"][5]->getNumberOfBedrooms() ?></li>
						<li>Bath: <?php echo $newListings["listing_details"][5]->getNumberOfBathrooms() ?></li>
						<li>Distance To SFSU:</li>
						<li id="output"></li>
					</ul>
				</div>

				<a href="<?php echo URL . "listings/getlisting/" . $newListings["listings"][5]->getListingId() ?>" class="btn btn-primary featured-listing-btn">Rent</a>


			</div>

		</div>

	</div>

</div>

<div class="listing-map" id="listing-map" style="visibility: hidden;"></div>
<script>                                    
	function initMap() {					
  		var bounds = new google.maps.LatLngBounds;
  		var markersArray = [];

  		var origin1 = "<?php echo $newListings["addresses"][0]->getStreetName() . $newListings["addresses"][0]->getCity() ?>";
  		var origin2 = "<?php echo $newListings["addresses"][1]->getStreetName() . $newListings["addresses"][1]->getCity() ?>";
  		var origin3 = "<?php echo $newListings["addresses"][2]->getStreetName() . $newListings["addresses"][2]->getCity() ?>";
  		var origin4 = "<?php echo $newListings["addresses"][3]->getStreetName() . $newListings["addresses"][3]->getCity() ?>";
  		var origin5 = "<?php echo $newListings["addresses"][4]->getStreetName() . $newListings["addresses"][4]->getCity() ?>";
  		var origin6 = "<?php echo $newListings["addresses"][5]->getStreetName() . $newListings["addresses"][5]->getCity() ?>";

  		var destination = '1600 Holloway Ave, San Francisco'; 

  		var destinationIcon = 'https://chart.googleapis.com/chart?' +
  	    	'chst=d_map_pin_letter&chld=D|FF0000|000000';
  		var originIcon = 'https://chart.googleapis.com/chart?' +
    		'chst=d_map_pin_letter&chld=O|FFFF00|000000';
    	var	map = new google.maps.Map(document.getElementById('listing-map'), {
			center: {lat: 37.721178, lng: -122.476962},
			zoom: 16
  		});

  		var geocoder = new google.maps.Geocoder;

  		var service = new google.maps.DistanceMatrixService;

  		service.getDistanceMatrix({
    	origins: [origin1, origin2, origin3, origin4, origin5, origin6],
    	destinations: [destination],
    	travelMode: google.maps.TravelMode.DRIVING,
    	unitSystem: google.maps.UnitSystem.METRIC,
    	avoidHighways: false,
    	avoidTolls: false
  		}, 

  		function(response, status) {
    		if (status !== google.maps.DistanceMatrixStatus.OK) {
      			alert('Error was: ' + status);
    		} else {
    			var originList = response.originAddresses;
      			var destinationList = response.destinationAddresses;
      			var outputDiv = document.getElementById('output');

      			outputDiv.innerHTML = '';
      			deleteMarkers(markersArray);

      			var showGeocodedAddressOnMap = function(asDestination) {
        			var icon = asDestination ? destinationIcon : originIcon;
        			return function(results, status) {
          				if (status === google.maps.GeocoderStatus.OK) {
            				map.fitBounds(bounds.extend(results[0].geometry.location));
            				markersArray.push(new google.maps.Marker({
              				map: map,
              				position: results[0].geometry.location,
              				icon: icon
            				}));
          				} else {
            				alert('Geocode was not successful due to: ' + status);
          				}
        			};
      			};

      			for (var i = 0; i < originList.length; i++) {
        			var results = response.rows[i].elements;
        			geocoder.geocode({'address': originList[i]},
            		showGeocodedAddressOnMap(false));
        			for (var j = 0; j < results.length; j++) {
          				geocoder.geocode({'address': destinationList[j]},
              			showGeocodedAddressOnMap(true));
          				outputDiv.innerHTML += results[j].distance.text 
        			}
      			}
    		}
  		});
	}

	function deleteMarkers(markersArray) {
  		for (var i = 0; i < markersArray.length; i++) {
    		markersArray[i].setMap(null);
  		}
  		markersArray = [];
	}
</script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUYeLz1DKD4PUAg_uef7OP986wXFlkN78&callback=initMap"
        async defer></script>