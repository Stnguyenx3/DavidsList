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
						<p class="listing-price">Price</p>
						<div style="clear: both">
								
							<p class="listing-street-name">Street name</p>
							<p class="listing-city">City</p>
							<p class=listing-zipcode>Zipcode</p>
							<p class="listing-state">State</p>

							<p></p>

							<p class="listing-beds">Bed: #</p>
							<p class="listing-baths">Bath: #</p>
							<p class="listing-internet">Internet: ?</p>
							<p class="listing-pets">Pets: ?</p>
							<p class="listing-elevator">Elevator: ?</p>
							<p class="listing-furnished">Furnished: ?</p>
							<p class="listing-ac">A/C: ?</p>

							<p class="listing-desc">
								Description:<br>
								Duis luctus pulvinar eros vel volutpat. Morbi ultrices dapibus hendrerit. Sed consectetur nibh et e
								st mattis ullamcorper.
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