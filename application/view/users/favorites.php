<div class="col-sm-1">
	<ul id="myPills" class="nav nav-pills nav-stacked">
		</br></br></br>
		<li><a href="<?php echo URL. "users/getuser/{$userID}";?>"><h4>Overview</h4></a></li>
		<li class="active"><a href="<?php echo URL. "users/favorites/{$userID}";?>"><h4>Favorite</h4></a></li>
		<li><a href="<?php echo URL. "users/userlistings/{$userID}"?>"><h4>My Listing</h4></a></li>
	</ul>
</div>

</br></br>
<div class="col-sm-7" id="favorite">
		<table class="table table-responsive" table frame="void">
			<tr>
				<td>
					<div class="row favorite-listing">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-2">
								<img src="http://placehold.it/175x175" alt="placeholder img.">
							</div>
							<div class="col-sm-10">
								<h3 class="favorite-listing-title">Listing Name1</h3>
								<p class="favorite-listing-price">Price</p>
								<p class="favorite-listing-type">Type</p>
								<div style="clear: both">
									<p>
										listing information
									</p>
									<a href="#" class="btn btn-primary">View details</a>
									<button class="btn btn-primary" type="submit">Delete</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="row favorite-listing">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-2">
								<img src="http://placehold.it/175x175" alt="placeholder img.">
							</div>
							<div class="col-sm-10">
								<h3 class="favorite-listing-title">Listing Name2</h3>
								<p class="favorite-listing-price">Price</p>
								<p class="favorite-listing-type">Type</p>
								<div style="clear: both">
									<p>
										listing information
									</p>
									<a href="#" class="btn btn-primary">View details</a>
									<button class="btn btn-primary" type="submit">Delete</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="row favorite-listing">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-2">
								<img src="http://placehold.it/175x175" alt="placeholder img.">
							</div>
							<div class="col-sm-10">
								<h3 class="favorite-listing-title">Listing Name3</h3>
								<p class="favorite-listing-price">Price</p>
								<p class="favorite-listing-type">Type</p>
								<div style="clear: both">
									<p>
										listing information
									</p>
									<a href="#" class="btn btn-primary">View details</a>
									<button class="btn btn-primary" type="submit">Delete</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				</td>
			</tr>
		</table>
</div>