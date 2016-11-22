<div class="container main">
	<div class="row">
		<div class="col-sm-12">
			<h1>Welcome To DavidsList! Rent A Room and Stay A While</h1>
			<p style="padding-left: 50px; padding-right: 50px; font-size: 16px;">
				DavidsList is an apartment rental website created by SFSU students for SFSU students. We believe that
				students are more willing to rent from other students because they share something in common, going to
				 an awesome school such as SFSU. Although we do not guarantee that your experience will be 100% safe,
				it is much more safer than searching for an apartment posted by a complete stranger! We hope that you
				will find a place to rent and have an awesome academic career!
			</p>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<h1>Featured Listings</h1>
			<div class="row featured-listing linear-gradient-bg">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-3 featured-listing-img">
							<img src= "<?php echo $newListingImages[0] ?>" alt="placeholder img." width="175" height="175">
						</div>
						<div class="col-sm-9">
							<h3 class="featured-listing-title"><?php echo $newListings["addresses"][0]->getStreetName() ?></h3>
							<p class="featured-listing-price"><?php echo $newListings["listings"][0]->getPrice() ?></p>
							<div style="clear: both">
									<ul class="listing-basic-info">
										<li>Bed: <?php echo $newListings["listing_details"][0]->getNumberOfBedrooms() ?></li>
										<li>Bath: <?php echo $newListings["listing_details"][0]->getNumberOfBathrooms() ?></li>
										<li>Distance: #TODO</li>
									</ul>
									<a href="<?php echo URL . "listings/getlisting/" . $newListings["listings"][0]->getListingId() ?>" class="btn btn-primary featured-listing-btn">Rent</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row featured-listing linear-gradient-bg">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-3 featured-listing-img">
							<img src="<?php echo $newListingImages[1] ?>" alt="placeholder img."  width="175" height="175">
						</div>
						<div class="col-sm-9">
							<h3 class="featured-listing-title"><?php echo $newListings["addresses"][1]->getStreetName() ?></h3>
							<p class="featured-listing-price"><?php echo $newListings["listings"][1]->getPrice() ?></p>
							<div style="clear: both">
									<ul class="listing-basic-info">
										<li>Bed: <?php echo $newListings["listing_details"][1]->getNumberOfBedrooms() ?></li>
										<li>Bath: <?php echo $newListings["listing_details"][1]->getNumberOfBathrooms() ?></li>
										<li>Distance: #TODO</li>
									</ul>
									<a href="<?php echo URL . "listings/getlisting/" . $newListings["listings"][1]->getListingId() ?>" class="btn btn-primary featured-listing-btn">Rent</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row featured-listing linear-gradient-bg">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-3 featured-listing-img">
							<img src= "<?php echo $newListingImages[2] ?>" alt="placeholder img." width="175" height="175">
						</div>
						<div class="col-sm-9">
							<h3 class="featured-listing-title"><?php echo $newListings["addresses"][2]->getStreetName() ?></h3>
							<p class="featured-listing-price"><?php echo $newListings["listings"][2]->getPrice() ?></p>
							<div style="clear: both">
									<ul class="listing-basic-info">
										<li>Bed: <?php echo $newListings["listing_details"][2]->getNumberOfBedrooms() ?></li>
										<li>Bath: <?php echo $newListings["listing_details"][2]->getNumberOfBathrooms() ?></li>
										<li>Distance: #TODO</li>
									</ul>
									<a href="<?php echo URL . "listings/getlisting/" . $newListings["listings"][2]->getListingId() ?>" class="btn btn-primary featured-listing-btn">Rent</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-1"></div>
	</div>
</div>
