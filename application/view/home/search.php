<div class="container main" id="search-result-container">

	<div class="row">

		<div class="col-sm-3">
			<p class="search-title">Refine search</p>

			<div class="search-filter linear-gradient-bg">

				<div class="form-group search-filter-price">

					<label>Price</label>

					<br>

					<label for="search-filter-price-range1">
						<input type="checkbox" id="search-filter-price-range1" value="" onselect="onSelectFilter()">Under $500
					</label>

					<br>

					<label for="search-filter-price-range2">
						<input type="checkbox" id="search-filter-price-range2" value="">$500 to $750
					</label>

					<br>

					<label for="search-filter-price-range3">
						<input type="checkbox" id="search-filter-price-range3" value="">$750 to $1000
					</label>

					<br>

					<label for="search-filter-price-range4">
						<input type="checkbox" id="search-filter-price-range4" value="">$1000 &amp; Above
					</label>

					<div class="form-group">
						<label>Rooms</label>

						<br>

						<label for="search-filter-bedroom-range1">
							<input type="checkbox" id="search-filter-bedroom-range1" value="">1
						</label>

						<br>

						<label for="search-filter-bedroom-range2">
							<input type="checkbox" id="search-filter-bedroom-range2" value="">2
						</label>

						<br>

						<label for="search-filter-bedroom-range3">
							<input type="checkbox" id="search-filter-bedroom-range3" value="">3+
						</label>
					</div>

					<div class="form-group">
						<label>Distance from SFSU</label>

						<br>

						<label for="search-filter-distance-range1">
							<input type="checkbox" id="search-filter-distance-range1" value="">Under 1 mile
						</label>

						<br>

						<label for="search-filter-distance-range2">
							<input type="checkbox" id="search-filter-distance-range2" value="">2-3 miles
						</label>

						<br>

						<label for="search-filter-distance-range3">
							<input type="checkbox" id="search-filter-distance-range3" value="">4 miles &amp; Above
						</label>
					</div>

				</div>

			</div>

		</div>

		<div class="col-sm-9">

			<p class="search-title">Results</p>
			<p id="loading-container"></p>

			<!--Search results begin -->
			<div class="row search-result-listing linear-gradient-bg">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-3 search-result-listing-img">
							<img src="http://placehold.it/175x175" alt="placeholder img.">
						</div>
						<div class="col-sm-9">
							<h3 class="search-result-listing-title">Listing Name</h3>
							<p class="search-result-listing-price">Price</p>
							<div style="clear: both">
								<p>
									Info Duis luctus pulvinar eros vel volutpat. Morbi ultrices dapibus hendrerit. Sed consectetur nibh et e
									st mattis ullamcorper. Duis luctus pulvinar eros vel volutpat. Morbi ultrices dapibus hendrerit. Sed consectetur nibh et e.
								</p>
								<a href="#" class="btn btn-primary search-result-listing-btn">Rent</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--Search results end -->
		</div>

	</div>	

</div>
