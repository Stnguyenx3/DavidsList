<div class="container" style="margin-top: 25px">

	<div class="row">

		<div class="col-md-2">
			<ul id="myPills" class="nav nav-pills nav-stacked" style="margin-top: 45px">
				<li><a href="<?php echo URL. "users/getuser/{$userID}";?>"><h4>Overview</h4></a></li>
		<li class="active"><a href="<?php echo URL. "users/favorites/{$userID}";?>"><h4>Favorite</h4></a></li>
		<li><a href="<?php echo URL. "users/userlistings/{$userID}"?>"><h4>My Listing</h4></a></li>
			</ul>
		</div>

		<div class="col-md-10" id="favorites">

<!-- 		<div class="row user-favorite linear-gradient-bg custom-border">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-3 user-favorite-img">
							<img src="http://placehold.it/175x175" alt="placeholder img.">
						</div>
						<div class="col-sm-9">
							<h3 class="user-favorite-title">Listing Name</h3>
							<p class="user-favorite-price">Price</p>
							<div style="clear: both">
								<p>
									Info Duis luctus pulvinar eros vel volutpat. Morbi ultrices dapibus hendrerit. Sed consectetur nibh et e
									st mattis ullamcorper. Duis luctus pulvinar eros vel volutpat. Morbi ultrices dapibus hendrerit. Sed consectetur nibh et e.
								</p>
								<a href="#" class="btn btn-primary user-favorite-remove">Remove</a>
							</div>
						</div>
					</div>
				</div>
			</div>
-->

		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo URL; ?>js/user_favorites.js"></script>