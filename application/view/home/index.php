<body id="content">
	<div class="container">
		<div class="row">
			<!--div class="col-sm-1"></div-->
			<div class="col-sm-12">
				<h1>Welcome</h1>
				<p>
					About The Website:
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id ligula cursus, dapibus ipsum vel,
					tincidunt velit. Mauris pretium iaculis leo at vestibulum. Aliquam ut quam congue, lacinia sem nec,
					elementum ipsum. Duis tempus tellus sollicitudin, commodo ipsum non, suscipit mauris. Proin accumsa
					n bibendum dui ut tempor. Vivamus mattis blandit erat. Ut dapibus faucibus dolor a finibus. Aliquam
					id lacus massa. Cras ut eros et tortor iaculis sagittis id vel magna.

					Maecenas tellus eros, aliquam eget ex vel, vulputate venenatis lectus. Duis feugiat sed arcu ut rut
					rum. Mauris a iaculis enim. Phasellus sit amet finibus ligula, sit amet sagittis felis. Nullam moll
					is velit at lacus sollicitudin, a dictum ex placerat. Cum sociis natoque penatibus et magnis dis pa
					rturient montes, nascetur ridiculus mus. Curabitur vehicula risus sit amet tincidunt dignissim. Sed
					eleifend magna in turpis ornare eleifend. In elementum ut erat ut ullamcorper. Nullam maximus in li
					gula sit amet tempus. Nullam dignissim posuere lacus, id accumsan erat semper at.

					Duis luctus pulvinar eros vel volutpat. Morbi ultrices dapibus hendrerit. Sed consectetur nibh et e
					st mattis ullamcorper. Etiam vitae mi fermentum, aliquet neque ac, commodo erat. Integer sodales lu
					ctus libero, ut tincidunt enim tempor at. Maecenas at ultricies magna. Nam bibendum quam tempus, so
					dales mauris vitae, tempor est. Integer erat erat, facilisis efficitur euismod sit amet, congue non
					nunc. Nunc ipsum urna, venenatis sit amet tempus et, rutrum vitae nibh. Nulla venenatis mattis augu
					e, pulvinar tempor metus scelerisque ac. Vivamus in elementum sem. Aenean ac enim elementum, molest
					ie mi eget, consectetur eros. Quisque placerat, ligula ut lacinia posuere, ante dui commodo mauris,
					vitae facilisis tellus urna vitae urna.

				</p>
			</div>
			<!--div class="col-sm-1"></div-->
		</div>
		
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
			
				<h1>Featured Listings</h1>

				<div class="row featured-listing">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-3 featured-listing-img">
								<img src= "<?php echo $newListingImages[0] ?>" alt="placeholder img." width="175" height="175">
							</div>
							<div class="col-sm-9">
								<h3 class="featured-listing-title"><?php echo $newListings["addresses"][0]->getStreetName() ?></h3>
								<p class="featured-listing-price"><?php echo $newListings["listings"][0]->getPrice() ?></p>
								<div style="clear: both">
										<p>
											<?php echo $newListings["listing_details"][0]->getDescription()?>
										</p>
										<a href="#" class="btn btn-primary featured-listing-btn">Rent</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row featured-listing">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-3 featured-listing-img">
								<img src="<?php echo $newListingImages[1] ?>" alt="placeholder img."  width="175" height="175">
							</div>
							<div class="col-sm-9">
								<h3 class="featured-listing-title"><?php echo $newListings["addresses"][1]->getStreetName() ?></h3>
								<p class="featured-listing-price"><?php echo $newListings["listings"][1]->getPrice() ?></p>
								<div style="clear: both">
										<p>
											<?php echo $newListings["listing_details"][1]->getDescription()?>
										</p>
										<a href="#" class="btn btn-primary featured-listing-btn">Rent</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row featured-listing">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-3 featured-listing-img">
								<img src= "<?php echo $newListingImages[2] ?>" alt="placeholder img." width="175" height="175">
							</div>
							<div class="col-sm-9">
								<h3 class="featured-listing-title"><?php echo $newListings["addresses"][2]->getStreetName() ?></h3>
								<p class="featured-listing-price"><?php echo $newListings["listings"][2]->getPrice() ?></p>
								<div style="clear: both">
										<p>
											<?php echo $newListings["listing_details"][2]->getDescription()?>
										</p>
										<a href="#" class="btn btn-primary featured-listing-btn">Rent</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				
				
				<!--div class="row">
					<div class="col-sm-12">
						<img src="http://placehold.it/975x100">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-12">
						<img src="http://placehold.it/975x100">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-12">
						<img src="http://placehold.it/975x100">
					</div>
				</div-->
				
			</div>
			<div class="col-sm-1"></div>
		</div>
	</div>
