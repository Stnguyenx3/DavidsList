<div class="container" style="margin-top: 25px">

	<div class="row">

		<div class="col-md-2">
			<ul id="myPills" class="nav nav-pills nav-stacked" style="margin-top: 45PX">
				<li class="active"><a href="<?php echo URL. "userProfile/index";?>"><h4>Overview</h4></a></li>
				<li><a href="<?php echo URL. "userProfile/favorites";?>"><h4>Favorite</h4></a></li>
				<li><a href="<?php echo URL. "userProfile/listings"?>"><h4>Listing</h4></a></li>
			</ul>
		</div>

		<div class="col-md-10">
			<form id="accountoverview" action="#" method="post">
				<div class="form-group row">

					<div class="col-md-1"></div>
					<div>
						<div class="col-md-3">
							<img src="http://placehold.it/175x175" alt="placeholder img.">
						</div>
						<div class="col-md-5">
							<div class="row">

								<div class="col-md-12"><label>Username</label></div>
								<div class="col-md-12"><p class="username">username here</p></div>
								<div class="col-md-12"><label>Email</label></div>
								<div class="col-md-12"><p class="email">email here</p></div>

								<div class="panel-group col-md-12" id="accordion">
									<div class="panel">
										<div class="form-group row">
											<div class="col-md-12"><label>Password</label></div>
											<div class="col-md-3"><p>***********</p></div>
											<div class="col-md-9">
												<div class="accordion-heading">
													<a class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
														<p>change</p>
													</a>
												</div>
											</div>
											<div class="col-md-12">
												<div id="collapseOne" class="panel-collapse collapse">
													<div class="panel-body">
														<form id="changepassword" action="#" method="post">
															<div class="row">
																<div class="col-md-6">
																	<label class="text-right">Current Password</label>
																</div>
																<div class="col-md-6">
																	<input type="password" name="currentpassword" placeholder="Current Password">
																</div>
																<div class="col-md-6">
																	<label class="text-right">New Password</label>
																</div>
																<div class="col-md-6">
																	<input type="password" name="newpassword" placeholder="New Password">
																</div>
																<div class="col-md-6">
																	<label class="text-right">Confirm Password</label>
																</div>
																<div class="col-md-6">
																	<input type="password" name="confirmpassword" placeholder="Confirm New Password">
																</div>
																<div class="col-md-9"></div>
																<div class="col-md-3">
																	<button class="btn btn-link" id="changepassword" type="submit">Submit</button>
																</div>
															</div>
														</form>	
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>	
							</div>
						</div>
						<div class="col-md-3"></div>
					</div>
				</div>
			</form>

			<form id="information" action="#" method="post">

				<div class="form-group row">
					<div class="col-md-1"></div>
					<div class="col-md-4">
						<input type="file" name="account-image" id="account-image">
					</div>
					<div class="col-md-2">
						<button class="btn btn-link" id="account-image" type="submit" onclick='uploadImage()'>Uplaod</button>
					</div>
					<div class="col-md-5"></div>
				</div>
			

				<div class="form-group row">
					<label for="form-address" class="col-md-1 text-right">Address</label>
					<div class="col-md-6">
						<input class="form-control" type="text" name="form-address" placeholder="address" readonly>
					</div>
					<div class="col-md-5"></div>
				</div>

				<div class="form-group row">
					<label for="form-city" class="col-md-1 text-right">City</label>
					<div class="col-md-6">
						<input class="form-control" type="text" name="form-city" placeholder="city" readonly>
					</div>
					<div class="col-md-5"></div>
				</div>

				<div class="form-group row">
					<label for="form-state" class="col-md-1 text-right">State</label>
					<div class="col-md-2">
						<input class="form-control" type="text" name="form-state" placeholder="state" readonly>
					</div>
					<label for="form-phone" class="col-md-1 text-right">Phone</label>
					<div class="col-md-3">
						<input class="form-control" type="text" name="form-phone" placeholder="phone" >
					</div>
					<div class="col-md-5"></div>
				</div>

				<div class="form-group row">
					<label for="form-biol" class="col-md-1 text-right">Biol</label>
					<div class="col-md-6">
						<textarea class="form-control" rows="4" readonly="">Biol</textarea>
					</div>
					<div class="col-md-5"></div>
				</div>

				<div class="form-group row">
					<div class="col-md-7"></div>
					<div class="col-md-1">
					<button class="btn btn-primary" id="information" type="submit">Edit</button>
					</div>
					<div class="col-md-1">
					<button class="btn btn-primary" id="information" type="submit">Save</button>
					</div>
					<div class="col-md-3"></div>
			</form>
		</div>
	</div>
</div>