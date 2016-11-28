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
						<li>Distance To SFSU: #TODO</li>
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
						<li>Distance To SFSU: #TODO</li>
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
						<li>Distance To SFSU: #TODO</li>
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
						<li>Distance To SFSU: #TODO</li>
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
						<li>Distance To SFSU: #TODO</li>
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
						<li>Distance To SFSU: #TODO</li>
					</ul>
				</div>

				<a href="<?php echo URL . "listings/getlisting/" . $newListings["listings"][5]->getListingId() ?>" class="btn btn-primary featured-listing-btn">Rent</a>


			</div>

		</div>

	</div>

</div>