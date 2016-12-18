<div class="container main">

	<div class="row">

		<div class="col-md-1"></div>

		<div class="col-md-10 user-overview">

			<h2 class="centered-header">Profile</h2>

			<form id="accountoverview">
				<div class="form-group row">

					<div class="col-md-1"></div>
					<div class="col-md-3">
						<?php 
							$outputImage = "";
							count($userResponse["user_images"]) > 0 ? $outputImage = "data:image/png;base64," .base64_encode($userResponse["user_images"][0]->getImage()) : $outputImage = "http://placehold.it/175x175";
						?>
						<img id="user-image" src="<?php echo $outputImage ?>" alt="placeholder img." width="175" height="175">
					</div>
					<div class="col-md-5">
						<div class="row">

							<div class="row">
								<div class="col-md-4"><label style="padding-left: 15px; padding-right: 15px;">Username</label></div>
								<div class="col-md-8"><p class="username"><?php echo $userResponse["user"]->getUsername() ?></p></div>
							</div>
							<div class="row">
								<div class="col-md-3"><label style="padding-left: 15px; padding-right: 15px;">Email</label></div>
								<div class="col-md-9"><p class="email"><?php echo $userResponse["user"]->getEmail() ?></p></div>
							</div>


							<div class="panel-group col-md-12" id="accordion">
								<div class="panel">
									<div class="form-group row">

										<a href="#collapseOne" data-toggle="collapse" data-parent="#accordion" class="btn btn-primary user-change-pw">Change Password</a>

										<div class="row">
											<div class="col-md-12">
												<div id="collapseOne" class="panel-collapse collapse">
													<div class="panel-body">
														<form id="changepassword" action="#" method="post">

															<div class="row">
																<div class="col-md-6">
																	<label class="text-right">Current Password</label>
																</div>
																<div class="col-md-6">
																	<input type="password" name="currentpassword" id="currentpassword" placeholder="Current Password">
																</div>
															</div>

															<div class="row">
																<div class="col-md-6">
																	<label class="text-right">New Password</label>
																</div>
																<div class="col-md-6">
																	<input type="password" name="newpassword" id="newpassword" placeholder="New Password">
																</div>
															</div>

															<div class="row">
																<div class="col-md-6">
																	<label class="text-right">Confirm Password</label>
																</div>
																<div class="col-md-6">
																	<input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm New Password">
																</div>
															</div>

															<div class="row">
																<div class="col-md-12">
																	<button class="btn btn-primary" id="changepassword" type="submit" style=" margin: 15px; float: right;">Submit</button>
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

						</div>

						<div class="col-md-3"></div>
					</div>
				</form>
		

				<form id="information">

					<div class="form-group row">

						<div class="col-md-4"></div>

						<div class="col-md-4">
							<label for="account-image">Profile Image</label>
							<input type="file" name="account-image" id="account-image">
						</div>

						<div class="col-md-4"></div>

					</div>
				

					<div class="form-group row">
						
						<div class="col-md-2"></div>

						<div class="col-md-8">
							<label for="form-address" class="text-right">Address</label>
							<input class="form-control" type="text" name="form-address" id="form-address" placeholder="Address" readonly>
						</div>

						<div class="col-md-2"></div>
					</div>

					<div class="form-group row">
						
						<div class="col-md-2"></div>

						<div class="col-md-8">
							<label for="form-city" class="text-right">City</label>
							<input class="form-control" type="text" name="form-city" id="form-city" placeholder="City" readonly>
						</div>

						<div class="col-md-2"></div>
						
					</div>

					<div class="form-group row">

						<div class="col-md-3"></div>

						<div class="col-md-2">
							<label for="form-state" class="text-right">State</label>
							<input class="form-control" type="text" name="form-state" id="form-state" placeholder="State" readonly>
						</div>
						
						<div class="col-md-4">
							<label for="form-phone" class="text-right">Phone</label>
							<input class="form-control" type="text" name="form-phone" id="form-phone" placeholder="Phone" value="<?php echo $userResponse["user"]->getPhone(); ?>" readonly >
						</div>

						<div class="col-md-3"></div>
						
					</div>

					<div class="form-group row">

						
						<div class="col-md-12">
						<label for="form-biol">Bio</label>
							<textarea class="form-control" id="form-bio" rows="4" readonly><?php echo $userResponse["user"]->getBiography(); ?></textarea>
						</div>

					</div>

					<div class="form-group row">


						<div class="col-md-6"></div>

						<div class="col-md-3">
							<button class="btn btn-primary" id="edit" onclick="onEditClick()" style="width: 100%;">Edit</button>
						</div>

						<div class="col-md-3">
							<button class="btn btn-primary" id="save" onclick="onSaveClick()" style="width: 100%;">Save</button>
						</div>

				</form>
			</div>

			<div class="col-md-1"></div>
			
		</div>
		<!-- <div class="col-md-2"></div> -->
	</div>
</div>

<script src= "<?php echo URL; ?>js/users.js"></script>

<script>
	//Highlight the current pages' navbar link.
	$("#nav-link-2").css("color", "#6de3b0");
</script>