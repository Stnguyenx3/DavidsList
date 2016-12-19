<div class="container main">
	<div class="row">
		<h1 class="centered-header">Welcome To DavidsList</h1>
		<hr/>
	</div>
	<div class="row">
		<h1 class="centered-header">Recently Added Listings</h1>
		<div class="col-md-4">

			<div class="featured-listing-container" style="overflow:hidden">

				<?php 
					$title = $newListings["listings"][$indexOne]->getTitle();
					// if (strlen($title) > 22){
					// 	$title = substr($title, 0, 22)."...";
					// }
				?>

				<h3 class="featured-listing-title"><?php echo $title ?></h3>
				<img class="featured-listing-img" src="<?php echo $newListingImages[$indexOne] ?>" alt="Image missing." style="width: 250px; height: 250px;" onclick= window.open("<?php echo URL . "listings/getlisting/" . $newListings["listings"][$indexOne]->getListingId() ?>")>


				<?php
					// check for approx address
					$address = "";
					if ($newListings["addresses"][$indexOne]->getApproximateAddress() == 0) {
						$address = $newListings["addresses"][$indexOne]->getStreetName(); 
					}
					else $address = $newListings["addresses"][$indexOne]->getZipcode().", ".$newListings["addresses"][$indexOne]->getCity();
				?>

				<div class="featured-info">
					<p class="listing-price">$<?php echo $newListings["listings"][$indexOne]->getPrice() ?></p>
					<ul class="listing-expanded-info">
						<li><p class="listing-subtitle">Bed</p> <?php echo $newListings["listing_details"][$indexOne]->getNumberOfBedrooms() ?></li>
						<li><p class="listing-subtitle">Bath</p> <?php echo $newListings["listing_details"][$indexOne]->getNumberOfBathrooms() ?></li>
						<li><span class="listing-subtitle">Address</span> <?php echo $address ?></li>
						<li><p class="listing-subtitle">Distance To SFSU</p> <?php echo $newListings["addresses"][$indexOne]->getDistance() ?> miles</li>
					</ul>
				</div>
			
				<button type="button" class="btn btn-primary featured-listing-btn" onclick= window.open("<?php echo URL . "listings/getlisting/" . $newListings["listings"][$indexOne]->getListingId() ?>")>More Info</button>

			</div>

		</div>

		<div class="col-md-4">

			<div class="featured-listing-container" style="overflow:hidden">

				<?php 
					$title = $newListings["listings"][$indexTwo]->getTitle();
					// if (strlen($title) > 22){
					// 	$title = substr($title, 0, 22)."...";
					// }
				?>

				<h3 class="featured-listing-title"><?php echo $title ?></h3>
				<img class="featured-listing-img" src="<?php echo $newListingImages[$indexTwo] ?>" alt="Image missing." style="width: 250px ; height: 250px;" onclick= window.open("<?php echo URL . "listings/getlisting/" . $newListings["listings"][$indexTwo]->getListingId() ?>")>

				<?php
					// check for approx address
					$address = "";
					if ($newListings["addresses"][$indexTwo]->getApproximateAddress() == 0) {
						$address = $newListings["addresses"][$indexTwo]->getStreetName(); 
					}
					else $address = $newListings["addresses"][$indexTwo]->getZipcode().", ".$newListings["addresses"][$indexTwo]->getCity();
				?>

				<div class="featured-info">
					<p class="listing-price">$<?php echo $newListings["listings"][$indexTwo]->getPrice() ?></p>
					<ul class="listing-expanded-info">
						<li><p class="listing-subtitle">Bed</p> <?php echo $newListings["listing_details"][$indexTwo]->getNumberOfBedrooms() ?></li>
						<li><p class="listing-subtitle">Bath</p> <?php echo $newListings["listing_details"][$indexTwo]->getNumberOfBathrooms() ?></li>
						<li><span class="listing-subtitle">Address</span> <?php echo $address ?></li>
						<li><p class="listing-subtitle">Distance To SFSU</p> <?php echo $newListings["addresses"][$indexTwo]->getDistance() ?> miles</li>
					</ul>
				</div>

				<button type="button" class="btn btn-primary featured-listing-btn" onclick= window.open("<?php echo URL . "listings/getlisting/" . $newListings["listings"][$indexTwo]->getListingId() ?>")>More Info</button>

			</div>

		</div>

		<div class="col-md-4">

			<div class="featured-listing-container" style="overflow:hidden">
			
				<?php 
					$title = $newListings["listings"][$indexThree]->getTitle();
					// if (strlen($title) > 22){
					// 	$title = substr($title, 0, 22)."...";
					// }
				?>

				<h3 class="featured-listing-title"><?php echo $title ?></h3>
				<img class="featured-listing-img" src="<?php echo $newListingImages[$indexThree] ?>" alt="Image missing." style="width: 250px ; height: 250px;" onclick= window.open("<?php echo URL . "listings/getlisting/" . $newListings["listings"][$indexThree]->getListingId() ?>")>

				<?php
					// check for approx address
					$address = "";
					if ($newListings["addresses"][$indexThree]->getApproximateAddress() == 0) {
						$address = $newListings["addresses"][$indexThree]->getStreetName(); 
					}
					else $address = $newListings["addresses"][$indexThree]->getZipcode().", ".$newListings["addresses"][$indexThree]->getCity();
				?>

				<div class="featured-info">
					<p class="listing-price"> $<?php echo $newListings["listings"][$indexThree]->getPrice() ?></p>
					<ul class="listing-expanded-info">
						<li><span class="listing-subtitle">Bed</span> <?php echo $newListings["listing_details"][$indexThree]->getNumberOfBedrooms() ?></li>
						<li><span class="listing-subtitle">Bath</span> <?php echo $newListings["listing_details"][$indexThree]->getNumberOfBathrooms() ?></li>
						<li><span class="listing-subtitle">Address</span> <?php echo $address ?></li>
						<li><span class="listing-subtitle">Distance To SFSU</span> <?php echo $newListings["addresses"][$indexThree]->getDistance() ?> miles</li>
					</ul>
				</div>

			<button type="button" class="btn btn-primary featured-listing-btn" onclick= window.open("<?php echo URL . "listings/getlisting/" . $newListings["listings"][$indexThree]->getListingId() ?>")>More Info</button>
			
			</div>

		</div>

	</div>

	<div class="row">

		<div class="col-md-4">

			<div class="featured-listing-container" style="overflow:hidden">
			
				<?php 
					$title = $newListings["listings"][$indexFour]->getTitle();
					// if (strlen($title) > 22){
					// 	$title = substr($title, 0, 22)."...";
					// }
				?>

				<h3 class="featured-listing-title"><?php echo $title ?></h3>
				<img class="featured-listing-img" src="<?php echo $newListingImages[$indexFour] ?>" alt="Image missing." style="width: 250px ; height: 250px;" onclick= window.open("<?php echo URL . "listings/getlisting/" . $newListings["listings"][$indexFour]->getListingId() ?>")>

				<?php
					// check for approx address
					$address = "";
					if ($newListings["addresses"][$indexFour]->getApproximateAddress() == 0) {
						$address = $newListings["addresses"][$indexFour]->getStreetName(); 
					}
					else $address = $newListings["addresses"][$indexFour]->getZipcode().", ".$newListings["addresses"][$indexFour]->getCity();
				?>

				<div class="featured-info">
					<p class="listing-price"> $<?php echo $newListings["listings"][$indexFour]->getPrice() ?></p>
					<ul class="listing-expanded-info">
						<li><p class="listing-subtitle">Bed</p> <?php echo $newListings["listing_details"][$indexFour]->getNumberOfBedrooms() ?></li>
						<li><p class="listing-subtitle">Bath</p> <?php echo $newListings["listing_details"][$indexFour]->getNumberOfBathrooms() ?></li>
						<li><span class="listing-subtitle">Address</span> <?php echo $address ?></li>
						<li><p class="listing-subtitle">Distance To SFSU</p> <?php echo $newListings["addresses"][$indexFour]->getDistance() ?> miles</li>
					</ul>
				</div>

				<button type="button" class="btn btn-primary featured-listing-btn" onclick= window.open("<?php echo URL . "listings/getlisting/" . $newListings["listings"][$indexFour]->getListingId() ?>")>More Info</button>

			</div>

		</div>

		<div class="col-md-4">

			<div class="featured-listing-container" style="overflow:hidden">

				<?php 
					$title = $newListings["listings"][$indexFive]->getTitle();
					// if (strlen($title) > 22){
					// 	$title = substr($title, 0, 22)."...";
					// }
				?>

				<h3 class="featured-listing-title"><?php echo $title ?></h3>
				<img class="featured-listing-img" src="<?php echo $newListingImages[$indexFive] ?>" alt="Image missing." style="width: 250px ; height: 250px;" onclick= window.open("<?php echo URL . "listings/getlisting/" . $newListings["listings"][$indexFive]->getListingId() ?>")>
				
				<?php
					// check for approx address
					$address = "";
					if ($newListings["addresses"][$indexFive]->getApproximateAddress() == 0) {
						$address = $newListings["addresses"][$indexFive]->getStreetName(); 
					}
					else $address = $newListings["addresses"][$indexFive]->getZipcode().", ".$newListings["addresses"][$indexFive]->getCity();
				?>

				<div class="featured-info">
					<p class="listing-price"> $<?php echo $newListings["listings"][$indexFive]->getPrice() ?></p>
					<ul class="listing-expanded-info">
						<li><p class="listing-subtitle">Bed</p> <?php echo $newListings["listing_details"][$indexFive]->getNumberOfBedrooms() ?></li>
						<li><p class="listing-subtitle">Bath</p> <?php echo $newListings["listing_details"][$indexFive]->getNumberOfBathrooms() ?></li>
						<li><span class="listing-subtitle">Address</span> <?php echo $address ?></li>
						<li><p class="listing-subtitle">Distance To SFSU</p> <?php echo $newListings["addresses"][$indexFive]->getDistance() ?> miles</li>
					</ul>
				</div>

				<button type="button" class="btn btn-primary featured-listing-btn" onclick= window.open("<?php echo URL . "listings/getlisting/" . $newListings["listings"][$indexFive]->getListingId() ?>")>More Info</button>

			</div>

		</div>

		<div class="col-md-4">

			<div class="featured-listing-container" style="overflow:hidden">

				<?php 
					$title = $newListings["listings"][$indexSix]->getTitle();
					// if (strlen($title) > 22){
					// 	$title = substr($title, 0, 22)."...";
					// }
				?>

				<h3 class="featured-listing-title"><?php echo $title ?></h3>
				<img class="featured-listing-img" src="<?php echo $newListingImages[$indexSix] ?>" alt="Image missing." style="width: 250px ; height: 250px;" onclick= window.open("<?php echo URL . "listings/getlisting/" . $newListings["listings"][$indexSix]->getListingId() ?>")>

				<?php
					// check for approx address
					$address = "";
					if ($newListings["addresses"][$indexSix]->getApproximateAddress() == 0) {
						$address = $newListings["addresses"][$indexSix]->getStreetName(); 
					}
					else $address = $newListings["addresses"][$indexSix]->getZipcode().", ".$newListings["addresses"][$indexSix]->getCity();
				?>

				<div class="featured-info">
					<p class="listing-price"> $<?php echo $newListings["listings"][$indexSix]->getPrice() ?></p>
					<ul class="listing-expanded-info">
						<li><p class="listing-subtitle">Bed</p> <?php echo $newListings["listing_details"][$indexSix]->getNumberOfBedrooms() ?></li>
						<li><p class="listing-subtitle">Bath</p> <?php echo $newListings["listing_details"][$indexSix]->getNumberOfBathrooms() ?></li>
						<li><span class="listing-subtitle">Address</span> <?php echo $address ?></li>
						<li><p class="listing-subtitle">Distance To SFSU</p> <?php echo $newListings["addresses"][$indexSix]->getDistance() ?> miles</li>
					</ul>
				</div>

				<button type="button" class="btn btn-primary featured-listing-btn" onclick= window.open("<?php echo URL . "listings/getlisting/" . $newListings["listings"][$indexSix]->getListingId() ?>")>More Info</button>

			</div>

		</div>

	</div>

</div>

<!-- <div class="listing-map" id="listing-map" style="visibility: hidden; position: absolute; top: -9999px;"></div> -->
<script>

	// //Highlight the current pages' navbar link.
	// $("#nav-link-0").css("background-color", "#23527c");

	// function initMap() {					
 //  		var bounds = new google.maps.LatLngBounds;
 //  		var markersArray = [];

 //  		var origin1 = "<?php echo $newListings["addresses"][$indexOne]->getStreetName() . ", " . $newListings["addresses"][$indexOne]->getCity() ?>";
 //  		var origin2 = "<?php echo $newListings["addresses"][$indexTwo]->getStreetName() . ", " . $newListings["addresses"][$indexTwo]->getCity() ?>";
 //  		var origin3 = "<?php echo $newListings["addresses"][$indexThree]->getStreetName() . ", " . $newListings["addresses"][$indexThree]->getCity() ?>";
 //  		var origin4 = "<?php echo $newListings["addresses"][$indexFour]->getStreetName() . ", " . $newListings["addresses"][$indexFour]->getCity() ?>";
 //  		var origin5 = "<?php echo $newListings["addresses"][$indexFive]->getStreetName() . ", " . $newListings["addresses"][$indexFive]->getCity() ?>";
 //  		var origin6 = "<?php echo $newListings["addresses"][$indexSix]->getStreetName() . ", " . $newListings["addresses"][$indexSix]->getCity() ?>";

 //  		var destination = '1600 Holloway Ave, San Francisco'; 

 //  		var destinationIcon = 'https://chart.googleapis.com/chart?' +
 //  	    	'chst=d_map_pin_letter&chld=D|FF0000|000000';
 //  		var originIcon = 'https://chart.googleapis.com/chart?' +
 //    		'chst=d_map_pin_letter&chld=O|FFFF00|000000';
 //    	var	map = new google.maps.Map(document.getElementById('listing-map'), {
	// 		center: {lat: 37.721178, lng: -122.476962},
	// 		zoom: 16
 //  		});

 //  		var geocoder = new google.maps.Geocoder;

 //  		var service = new google.maps.DistanceMatrixService;

 //  		service.getDistanceMatrix({
	//     	origins: [origin1, origin2, origin3, origin4, origin5, origin6],
	//     	destinations: [destination],
	//     	travelMode: google.maps.TravelMode.DRIVING,
	//     	unitSystem: google.maps.UnitSystem.IMPERIAL,
	//     	avoidHighways: false,
	//     	avoidTolls: false
 //  		}, 
 //  		//google.maps.UnitSystem.METRIC

 //  		function(response, status) {
 //    		if (status !== google.maps.DistanceMatrixStatus.OK) {
 //      			// alert('Error was: ' + status);
 //    		} else {
 //    			var originList = response.originAddresses;
 //      			var destinationList = response.destinationAddresses;

 //      			deleteMarkers(markersArray);

 //      			var showGeocodedAddressOnMap = function(asDestination) {
 //        			var icon = asDestination ? destinationIcon : originIcon;
 //        			return function(results, status) {
 //          				if (status === google.maps.GeocoderStatus.OK) {
 //            				map.fitBounds(bounds.extend(results[0].geometry.location));
 //            				markersArray.push(new google.maps.Marker({
 //              				map: map,
 //              				position: results[0].geometry.location,
 //              				icon: icon
 //            				}));
 //          				} else {
 //            				// alert('Geocode was not successful due to: ' + status);
 //          				}
 //        			};
 //      			};

 //      			for (var i = 0; i < originList.length; i++) {
 //        			var results = response.rows[i].elements;
 //        			geocoder.geocode({'address': originList[i]},
 //            		showGeocodedAddressOnMap(false));
 //        			for (var j = 0; j < results.length; j++) {
 //          				geocoder.geocode({'address': destinationList[j]},
 //              			showGeocodedAddressOnMap(true));
 //              			if (results[j].distance != null) {
 //          					$("#output-"+i).text("Distance To SFSU: "+results[j].distance.text);
 //          				} else {
 //          					$("#output-"+i).text("Distance To SFSU: Unavailable.");
 //          				}
 //        			}
 //      			}
 //    		}
 //  		});
	// }

	// function deleteMarkers(markersArray) {
 //  		for (var i = 0; i < markersArray.length; i++) {
 //    		markersArray[i].setMap(null);
 //  		}
 //  		markersArray = [];
	// }<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWtyDBXetSnDbisVRKmZ4AXzDBd1ohSyo&callback=initMap"
   //     async defer></script>
</script>


