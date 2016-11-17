<div class="container">

	<div class="row">

		<!--Apartment listing image and details -->
		<div class="col-sm-8">

			<div id="listingCarousel" class="col-sm-8 carousel slide" style="width: 700px; height: 700px" data-ride="carousel">

				<ol class="carousel-indicators">
					<li data-target="#listingCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#listingCarousel" data-slide-to="1"></li>
					<li data-target="#listingCarousel" data-slide-to="2"></li>
				</ol>

				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="http://placehold.it/700x700" alt="placeholder img.">
					</div>
					<div class="item">
						<img src="http://placehold.it/700x700" alt="placeholder img.">
					</div>
					<div class="item">
						<img src="http://placehold.it/700x700" alt="placeholder img.">
					</div>
				</div>

				<a class="left carousel-control" href="#listingCarousel" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				</a>

				<a class="right carousel-control" href="#listingCarousel" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				</a>

			</div>	

			<div class="listing-details">

				<div class="row">
					<div class="col-sm-12">


						<h3 class="listing-title">Listing Name</h3>
						<p class="listing-price"><?php echo $listingResponse["listing"]->getPrice() ?></p>
						<div style="clear: both">
								
							<p class="listing-street-name"><?php echo $listingResponse["address"]->getStreetName() ?></p>
							<p class="listing-city"><?php echo $listingResponse["address"]->getCity() ?></p>
							<p class=listing-zipcode><?php echo $listingResponse["address"]->getZipcode() ?></p>
							<p class="listing-state"><?php echo $listingResponse["address"]->getState() ?></p>

							<p></p>

							<p class="listing-beds">Bed: <?php echo $listingResponse["listing_detail"]->getNumberOfBedrooms() ?></p>
							<p class="listing-baths">Bath: <?php echo $listingResponse["listing_detail"]->getNumberOfBathrooms() ?></p>
							<p class="listing-internet">Internet: <?php echo $listingResponse["listing_detail"]->getInternet() ? "Yes" : "No" ?></p>
							<p class="listing-pets">Pets: <?php echo $listingResponse["listing_detail"]->getPetPolicy() ?></p>
							<p class="listing-elevator">Elevator: <?php echo $listingResponse["listing_detail"]->getElevatorAccess() ?></p>
							<p class="listing-furnished">Furnished: <?php echo $listingResponse["listing_detail"]->getFurnishing() ? "Yes" : "No" ?></p>
							<p class="listing-ac">A/C: <?php echo $listingResponse["listing_detail"]->getAirConditioning() ? "Yes" : "No" ?></p>

							<p class="listing-desc">
								Description:<br>
								<?php echo $listingResponse["listing_detail"]->getDescription() ?>
							</p>

							<a href="#" class="btn btn-primary listing-favorite-btn">Favorite</a>
						</div>


					</div>
				</div>

			</div>

		</div>

		<!--Google maps and Owner information -->
		<div class="col-sm-4">

			<div class="listing-map">
				<p>Google maps.</p>
			</div>

			<div class="owner-info">
				<p style="font-weight: bold">Landlord</p>

				<p class="owner-username">Name: Bob</p>
				<p class="owner-email">EMail: Bob@example.com</p>

				<button type="button" class="btn btn-primary rent-button">Rent</button>

			</div>

		</div>

	</div>

</div>