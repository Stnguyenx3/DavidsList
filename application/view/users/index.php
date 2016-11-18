

<div class="col-sm-1">
	<ul id="myPills" class="nav nav-pills nav-stacked">
		</br></br></br>
		<li class="active"><a href="<?php echo URL. "users/getuser/{$userID}";?>"><h4>Overview</h4></a></li>
		<li><a href="<?php echo URL. "users/favorites/{$userID}";?>"><h4>Favorite</h4></a></li>
		<li><a href="<?php echo URL. "users/listings/{$userID}"?>"><h4>My Listing</h4></a></li>
	</ul>
</div>

</br></br>
<div class="col-sm-2"></div>
<div class="col-sm-8">
	<form class="form-overview" id="accountoverview" action="#" method="post">

		<div class="form-group row">
			<label for="form-image" class="col-sm-1 col-form-label">Image</label>
			<div class="col-sm-3">
				<input type="file" name="listing-image" id="listing-image">
			</div>
			<div>
				<button id="upload-image" type="submit" onclick='uploadImage()'>Uplaod Image</button>
			</div>
		</div>

		<div class="form-group row">
			<label for="form-username" class="col-sm-1 col-form-label">Username</label>
			<div class="col-sm-5">
				<input class="form-control" type="text" name="form-username" placeholder="username" disabled="disabled">
			</div>
		</div>

		<div class="form-group row">
			<label for="form-email" class="col-sm-1 col-form-label">Email</label>
			<div class="col-sm-5">
				<input class="form-control" type="email" name="form-email" placeholder="email" disabled="disabled">
			</div>
		</div>

		<div class="form-group row">
			<label for="form-password" class="col-sm-1 col-form-label">Password</label>
			<div class="col-sm-2">
				<!-- <input class="form-control" type="password" name="form-password" placeholder="password" disabled="disabled"> -->
				<p><h5>******************************</h5></p>
			</div>
			<div class="col-sm-1">
				<button class="btn-sm btn-link" type="submit">Change</button>
			</div>
		</div>

		<div class="form-group row">
			<label for="form-address" class="col-sm-1 col-form-label">Address</label>
			<div class="col-sm-5">
				<input class="form-control" type="text" name="form-address" placeholder="address">
			</div>
		</div>

		<div class="form-group row">
			<label for="form-city" class="col-sm-1 col-form-label">City</label>
			<div class="col-sm-2">
				<input class="form-control" type="text" name="form-city" placeholder="city">
			</div>
			<div class="col-sm-1"></div>
			<label for="form-state" class="col-sm-1 col-form-label">State</label>
			<div class="col-sm-1">
				<input class="form-control" type="text" name="form-state" placeholder="state">
			</div>
		</div>

		<div class="form-group row">
			<label for="form-phone" class="col-sm-1 col-form-label">Phone</label>
			<div class="col-sm-5">
				<input class="form-control" type="text" name="form-phone" placeholder="phone">
			</div>
		</div>

		<div class="form-group row">
			<label for="form-biol" class="col-sm-1 col-form-label">Biol</label>
			<div class="col-sm-5">
				<textarea class="form-control" rows="3">Biol</textarea>
			</div>
		</div>

		<div class="col-sm-5"></div>
		<button class="btn btn-primary" type="submit">Edit</button>
		<div class="col-sm-1"></div>
		<button class="btn btn-primary" type="submit">Save</button>

	</form>
</div>