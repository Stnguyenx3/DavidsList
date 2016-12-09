<?php
	//Remove this after page is complete.
	//echo "count is " . count($listingResponse["listing_images"]);
 ?>

<div class="container main">

	<div class="row">
		<div class="col-sm-5"></div>
		<div class="col-sm-3">
			<label><h1>Listing Detail</h1></label>
		</div>
		<div class="col-sm-4"></div>
	</div>

	<div class="row">

		<div class="col-sm-4">

			<div id="listingCarousel" class="col-sm-8 carousel slide" style="width: 100%; height: 100%" data-ride="carousel" data-interval="false">

				<ol class="carousel-indicators">
					<li data-target="#listingCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#listingCarousel" data-slide-to="1"></li>
					<li data-target="#listingCarousel" data-slide-to="2"></li>
				</ol>

				<div class="carousel-inner" role="listbox">
					<div class="item active" style="width: 350px; height: 350px">
						<img src= "<?php echo 'data:text/html;base64,' . base64_encode($listingResponse["listing_images"][0]->getImage()) ?>"" alt="placeholder img." style="width: 350px; height: 350px">
					</div>
					<div class="item">
						<img src="<?php echo count($listingResponse["listing_images"]) > 1 ? 'data:text/html;base64,' . base64_encode($listingResponse["listing_images"][1]->getImage()) : 'http://placehold.it/700x700' ?>" alt="placeholder img." style="width: 350px; height: 340px">
					</div>
					<div class="item">
						<img src="<?php echo count($listingResponse["listing_images"]) > 2 ? 'data:text/html;base64,' . base64_encode($listingResponse["listing_images"][2]->getImage()) : 'http://placehold.it/700x700' ?>"  alt="placeholder img." style="width: 350px; height: 340px">
					</div>
				</div>

				<a class="left carousel-control" href="#listingCarousel" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				</a>

				<a class="right carousel-control" href="#listingCarousel" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				</a>

			</div>	

		</div>


		<div class="col-sm-8">

			<div class="listing-map" id="listing-map"></div>

		</div>

	</div>

	<div class="row">

		<div class="col-sm-8">

			<div class="listing-details">

				<div class="row">
					<div class="col-sm-12">

						<div>
							<p class="listing-title">Listing Name</p>
							<p class="listing-price"> $<?php echo $listingResponse["listing"]->getPrice() ?></p>
						</div>
						<div style="clear: both">
								
							<p class="listing-street-name"><?php echo $listingResponse["address"]->getStreetName() ?></p>
							<p class="listing-city"><?php echo $listingResponse["address"]->getCity() ?></p>
							<p class="listing-state"><?php echo $listingResponse["address"]->getState() ?></p>
							<p class=listing-zipcode><?php echo $listingResponse["address"]->getZipcode() ?></p>

							<br>

							<ul class="listing-basic-info">
								<li>Bed: <?php echo $listingResponse["listing_detail"]->getNumberOfBedrooms() ?></li>
								<li>Bath: <?php echo $listingResponse["listing_detail"]->getNumberOfBathrooms() ?></li>
								<li>Distance:</li>
								<li id="output"> </li>
							</ul>

							<ul class="listing-expanded-info">
								<li><p class="listing-subtitle">Internet</p> <?php echo $listingResponse["listing_detail"]->getInternet() ? "Yes" : "No" ?></li>
								<li><p class="listing-subtitle">Pets</p> <?php echo $listingResponse["listing_detail"]->getPetPolicy() ?></li>
								<li><p class="listing-subtitle">Elevator</p> <?php echo $listingResponse["listing_detail"]->getElevatorAccess() ?></li>
								<li><p class="listing-subtitle">Furnished</p> <?php echo $listingResponse["listing_detail"]->getFurnishing() ? "Yes" : "No" ?></li>
								<li><p class="listing-subtitle">A/C</p> <?php echo $listingResponse["listing_detail"]->getAirConditioning() ? "Yes" : "No" ?></li>
							</ul>

							<ul class="listing-desc">
								<li> <p class="listing-subtitle"> Description </p></br> </li>
								<li> <?php echo $listingResponse["listing_detail"]->getDescription() ?></li>
							</ul>
							
						</div>


					</div>
				</div>

			</div>

		</div>

		<div class="col-sm-4">
			<div class="row buttons">
				<div><button type="button" class="btn btn-primary rent-button" onclick="onContactClick()">Rent</button></div>

				<div><button type="button" rel="popover" id="listing-favorite-btn" class="btn btn-primary listing-favorite-btn" onclick="onFavoriteClick()">
						<span class="glyphicon glyphicon-heart"></span> Favorite
				</button></div>
			</div>

			<div class="row owner-info">
				<p style="font-size:24px; font-weight: bold">Landlord</p>
				<?php  
					$verifiedCss = "";
					if($userResponse->getVerified() == 1) {
						$verifiedCss = "<span style=\"color: #FFA500\"> verified </span>";
					}
				?>
				<p class="owner-username">Name: <?php echo $verifiedCss ?> <?php echo $userResponse->getUsername(); ?></p>
				<p class="owner-email">Email: <?php echo $userResponse->getEmail(); ?></p>

			</div>

		</div>

	</div>

</div>



<script>

	function onContactClick() {
		var str = (window.location + '').split("/");
		var listingID = str[str.length - 1];
		var ownerID = "<?php echo $listingResponse["listing"]->getId() ?>"
		// window.location.replace(url+"messages/conversation/" + listingID + "/" + clientUserID);
		$.ajax({
			type:'GET',
			url: url+"messages/goToMessage/"+listingID,
			success: function(event) {
				window.location.replace(event);
			},
			error: function(xhr, err, errThrown) {
				console.log("I failed");
				console.log(err);
				console.log(errThrown);
			}
		});
	}

	function initMap() {					
  		var bounds = new google.maps.LatLngBounds;
  		var markersArray = [];

  		var origin = "<?php echo $listingResponse["address"]->getStreetName() . $listingResponse["address"]->getCity() ?>";
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
	    	origins: [origin],
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

      			var results = response.rows[0].elements;
      			geocoder.geocode({'address' : originList[0]},
      				showGeocodedAddressOnMap(false));
      			geocoder.geocode({'address' : destinationList[0]},
      				showGeocodedAddressOnMap(true));
           		    outputDiv.innerHTML += results[0].distance.text
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
