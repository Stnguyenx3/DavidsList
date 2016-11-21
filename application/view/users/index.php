<div class="col-sm-1">
	<ul id="myPills" class="nav nav-pills nav-stacked">
		</br></br></br>
		<li class="active"><a href="<?php echo URL. "users/getuser/{$userID}";?>"><h4>Overview</h4></a></li>
		<li><a href="<?php echo URL. "users/favorites/{$userID}";?>"><h4>Favorite</h4></a></li>
		<li><a href="<?php echo URL. "users/userlistings/{$userID}"?>"><h4>My Listing</h4></a></li>
	</ul>
</div>

</br></br>
<div>
<div class="col-sm-2"></div>
<div class="col-sm-9">
	<form class="form-overview" id="accountoverview" action="#" method="post">
		<div class="form-group row">
			<div class="col-sm-1"></div>
			<div>
				<div class="col-sm-2">
					<img src="http://placehold.it/175x175" alt="placeholder img.">
				</div>
				<div class="col-sm-2">
				<table class="table" table frame="void">
					<tr>
						<td>
							<label>Username</label>
							<p class="username">username here</p>
						</td>
					</tr>
					<tr>
						<td>
							<label>email</label>
							<p class="email">email here</p>
						</td>
					</tr>
					<tr>
						<td><label>password</label>
						<p>***********</p></td>
						<td><a href="#" class="btn">change</a></td>
					</tr>
				</table>
				</div>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-1"></div>
			<div class="col-sm-3">
				<input type="file" name="listing-image" id="listing-image">
			</div>
			<div class="col-sm-1">
				<button class="btn btn-link btn-xs" id="upload-image" type="submit" onclick='uploadImage()'><h5>Uplaod</h5></button>
			</div>
		</div>

		<div class="form-group row">
			<label for="form-address" class="col-sm-1 text-right">Address</label>
			<div class="col-sm-4">
				<input class="form-control" type="text" name="form-address" placeholder="address" readonly>
			</div>
		</div>

		<div class="form-group row">
			<label for="form-city" class="col-sm-1 text-right">City</label>
			<div class="col-sm-4">
				<input class="form-control" type="text" name="form-city" placeholder="city" readonly>
			</div>
		</div>

		<div class="form-group row">
			<label for="form-state" class="col-sm-1 text-right">State</label>
			<div class="col-sm-1">
				<input class="form-control" type="text" name="form-state" placeholder="state" readonly>
			</div>
			<label for="form-phone" class="col-sm-1 text-right">Phone</label>
			<div class="col-sm-2">
				<input class="form-control" type="text" name="form-phone" placeholder="phone" readonly>
			</div>
		</div>

		<div class="form-group row">
			<label for="form-biol" class="col-sm-1 text-right">Biol</label>
			<div class="col-sm-4">
				<textarea class="form-control" rows="4" readonly>Biol</textarea>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-5"></div>
			<button class="btn btn-primary" type="submit">Edit</button>
			<button class="btn btn-primary" type="submit">Save</button>
	</form>
</div>
</div>