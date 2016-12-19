<div class="container main">

	<div class="row rent-out">
		<div class="col-sm-2"></div>

		<div class="col-sm-8">

			<h2 class="centered-header">Edit Listing</h2>

			<form class="form-rentout" id="edit" action="#" method="post">

				<div class="form-group row">
					<p class="col-sm-2">Title <span class="text-danger">*</span></p>
					<div class="col-sm-8">
						<input class="form-control" type="text" name="listingtitle" id="form-title" value="<?php echo $listingResponse["listing"]->getTitle(); ?>">
					</div>
				</div>

				<div class="form-group row">
					<p class="col-sm-2">Price <span class="text-danger">*</span></p>
					<div class="col-sm-4">
						<label for="form-price" style="font-weight: normal">$</label>
						<input class="form-control" style="width: 60%; display:inline-block" type="text" name="listingprice" id="form-price" value="<?php echo $listingResponse["listing"]->getPrice(); ?>">
					</div>
				</div>

				<hr/>

				<div class="form-group row">
					<p class="col-sm-2">Address <span class="text-danger">*</span></p>
					<div class="col-sm-8">
						<input class="form-control" type="text" name="listingaddress" id="form-address" value="<?php echo $listingResponse["address"]->getStreetName(); ?>">
					</div>
				</div>

				<div class="form-group row">
					<p class="col-sm-2">City <span class="text-danger">*</span></p>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="listingcity" id="form-city" value="<?php echo $listingResponse["address"]->getCity(); ?>">
					</div>
					
					<div class="col-sm-6">
					<p style="display:inline-block">State <span class="text-danger">*</span></p>
						<select class="form-control" name="listingstate" id="form-state" style="width: auto; display:inline-block">
							<option value="">N/A</option>
							<option value="AK" <?php
								if (!strcmp($listingResponse["address"]->getState(), "AK")) {
									echo "selected=selected";
								}
							?>>Alaska</option>
							<option value="AL" <?php
								if (!strcmp($listingResponse["address"]->getState(), "AL")) {
									echo "selected=selected";
								}
							?>>Alabama</option>
							<option value="AR" <?php
								if (!strcmp($listingResponse["address"]->getState(), "AR")) {
									echo "selected=selected";
								}
							?>>Arkansas</option>
							<option value="AZ" <?php
								if (!strcmp($listingResponse["address"]->getState(), "AZ")) {
									echo "selected=selected";
								}
							?>>Arizona</option>
							<option value="CA" <?php
								if (!strcmp($listingResponse["address"]->getState(), "CA")) {
									echo "selected=selected";
								}
							?>>California</option>
							<option value="CO" <?php
								if (!strcmp($listingResponse["address"]->getState(), "CO")) {
									echo "selected=selected";
								}
							?>>Colorado</option>
							<option value="CT" <?php
								if (!strcmp($listingResponse["address"]->getState(), "CT")) {
									echo "selected=selected";
								}
							?>>Connecticut</option>
							<option value="DC" <?php
								if (!strcmp($listingResponse["address"]->getState(), "DC")) {
									echo "selected=selected";
								}
							?>>District of Columbia</option>
							<option value="DE" <?php
								if (!strcmp($listingResponse["address"]->getState(), "DE")) {
									echo "selected=selected";
								}
							?>>Delaware</option>
							<option value="FL" <?php
								if (!strcmp($listingResponse["address"]->getState(), "FL")) {
									echo "selected=selected";
								}
							?>>Florida</option>
							<option value="GA" <?php
								if (!strcmp($listingResponse["address"]->getState(), "GA")) {
									echo "selected=selected";
								}
							?>>Georgia</option>
							<option value="HI" <?php
								if (!strcmp($listingResponse["address"]->getState(), "HI")) {
									echo "selected=selected";
								}
							?>>Hawaii</option>
							<option value="IA" <?php
								if (!strcmp($listingResponse["address"]->getState(), "IA")) {
									echo "selected=selected";
								}
							?>>Iowa</option>
							<option value="ID" <?php
								if (!strcmp($listingResponse["address"]->getState(), "ID")) {
									echo "selected=selected";
								}
							?>>Idaho</option>
							<option value="IL" <?php
								if (!strcmp($listingResponse["address"]->getState(), "IL")) {
									echo "selected=selected";
								}
							?>>Illinois</option>
							<option value="IN" <?php
								if (!strcmp($listingResponse["address"]->getState(), "IN")) {
									echo "selected=selected";
								}
							?>>Indiana</option>
							<option value="KS" <?php
								if (!strcmp($listingResponse["address"]->getState(), "KS")) {
									echo "selected=selected";
								}
							?>>Kansas</option>
							<option value="KY" <?php
								if (!strcmp($listingResponse["address"]->getState(), "KY")) {
									echo "selected=selected";
								}
							?>>Kentucky</option>
							<option value="LA" <?php
								if (!strcmp($listingResponse["address"]->getState(), "LA")) {
									echo "selected=selected";
								}
							?>>Louisiana</option>
							<option value="MA" <?php
								if (!strcmp($listingResponse["address"]->getState(), "MA")) {
									echo "selected=selected";
								}
							?>>Massachusetts</option>
							<option value="MD" <?php
								if (!strcmp($listingResponse["address"]->getState(), "MD")) {
									echo "selected=selected";
								}
							?>>Maryland</option>
							<option value="ME" <?php
								if (!strcmp($listingResponse["address"]->getState(), "ME")) {
									echo "selected=selected";
								}
							?>>Maine</option>
							<option value="MI" <?php
								if (!strcmp($listingResponse["address"]->getState(), "MI")) {
									echo "selected=selected";
								}
							?>>Michigan</option>
							<option value="MN" <?php
								if (!strcmp($listingResponse["address"]->getState(), "MN")) {
									echo "selected=selected";
								}
							?>>Minnesota</option>
							<option value="MO" <?php
								if (!strcmp($listingResponse["address"]->getState(), "MO")) {
									echo "selected=selected";
								}
							?>>Missouri</option>
							<option value="MS" <?php
								if (!strcmp($listingResponse["address"]->getState(), "MS")) {
									echo "selected=selected";
								}
							?>>Mississippi</option>
							<option value="MT" <?php
								if (!strcmp($listingResponse["address"]->getState(), "MT")) {
									echo "selected=selected";
								}
							?>>Montana</option>
							<option value="NC" <?php
								if (!strcmp($listingResponse["address"]->getState(), "NC")) {
									echo "selected=selected";
								}
							?>>North Carolina</option>
							<option value="ND" <?php
								if (!strcmp($listingResponse["address"]->getState(), "ND")) {
									echo "selected=selected";
								}
							?>>North Dakota</option>
							<option value="NE" <?php
								if (!strcmp($listingResponse["address"]->getState(), "NE")) {
									echo "selected=selected";
								}
							?>>Nebraska</option>
							<option value="NH" <?php
								if (!strcmp($listingResponse["address"]->getState(), "NH")) {
									echo "selected=selected";
								}
							?>>New Hampshire</option>
							<option value="NJ" <?php
								if (!strcmp($listingResponse["address"]->getState(), "NJ")) {
									echo "selected=selected";
								}
							?>>New Jersey</option>
							<option value="NM" <?php
								if (!strcmp($listingResponse["address"]->getState(), "NM")) {
									echo "selected=selected";
								}
							?>>New Mexico</option>
							<option value="NV" <?php
								if (!strcmp($listingResponse["address"]->getState(), "NV")) {
									echo "selected=selected";
								}
							?>>Nevada</option>
							<option value="NY" <?php
								if (!strcmp($listingResponse["address"]->getState(), "NY")) {
									echo "selected=selected";
								}
							?>>New York</option>
							<option value="OH" <?php
								if (!strcmp($listingResponse["address"]->getState(), "OH")) {
									echo "selected=selected";
								}
							?>>Ohio</option>
							<option value="OK" <?php
								if (!strcmp($listingResponse["address"]->getState(), "OK")) {
									echo "selected=selected";
								}
							?>>Oklahoma</option>
							<option value="OR" <?php
								if (!strcmp($listingResponse["address"]->getState(), "OR")) {
									echo "selected=selected";
								}
							?>>Oregon</option>
							<option value="PA" <?php
								if (!strcmp($listingResponse["address"]->getState(), "PA")) {
									echo "selected=selected";
								}
							?>>Pennsylvania</option>
							<option value="PR" <?php
								if (!strcmp($listingResponse["address"]->getState(), "PR")) {
									echo "selected=selected";
								}
							?>>Puerto Rico</option>
							<option value="RI" <?php
								if (!strcmp($listingResponse["address"]->getState(), "RI")) {
									echo "selected=selected";
								}
							?>>Rhode Island</option>
							<option value="SC" <?php
								if (!strcmp($listingResponse["address"]->getState(), "SC")) {
									echo "selected=selected";
								}
							?>>South Carolina</option>
							<option value="SD" <?php
								if (!strcmp($listingResponse["address"]->getState(), "SD")) {
									echo "selected=selected";
								}
							?>>South Dakota</option>
							<option value="TN" <?php
								if (!strcmp($listingResponse["address"]->getState(), "TN")) {
									echo "selected=selected";
								}
							?>>Tennessee</option>
							<option value="TX" <?php
								if (!strcmp($listingResponse["address"]->getState(), "TX")) {
									echo "selected=selected";
								}
							?>>Texas</option>
							<option value="UT" <?php
								if (!strcmp($listingResponse["address"]->getState(), "UT")) {
									echo "selected=selected";
								}
							?>>Utah</option>
							<option value="VA" <?php
								if (!strcmp($listingResponse["address"]->getState(), "VA")) {
									echo "selected=selected";
								}
							?>>Virginia</option>
							<option value="VT" <?php
								if (!strcmp($listingResponse["address"]->getState(), "VT")) {
									echo "selected=selected";
								}
							?>>Vermont</option>
							<option value="WA" <?php
								if (!strcmp($listingResponse["address"]->getState(), "WA")) {
									echo "selected=selected";
								}
							?>>Washington</option>
							<option value="WI" <?php
								if (!strcmp($listingResponse["address"]->getState(), "WI")) {
									echo "selected=selected";
								}
							?>>Wisconsin</option>
							<option value="WV" <?php
								if (!strcmp($listingResponse["address"]->getState(), "WV")) {
									echo "selected=selected";
								}
							?>>West Virginia</option>
							<option value="WY" <?php
								if (!strcmp($listingResponse["address"]->getState(), "WY")) {
									echo "selected=selected";
								}
							?>>Wyoming</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<p class="col-sm-2">Zipcode <span class="text-danger">*</span></p>
					<div class="col-sm-2">
						<input class="form-control" type="text" name="listingzipcode" id="form-zipcode" value="<?php echo $listingResponse["address"]->getZipcode(); ?>">
					</div>
				</div>

				<div class="form-group row">
					<p class="col-sm-2">Approximate Address <span class="text-danger">*</span></p>
					<div class="col-sm-8">
						<label for="listing-internet">
							<input type="checkbox" name="listingaddressapprox" id="form-approx" value="approximate"
							<?php 
								if ($listingResponse["address"]->getApproximateAddress() == 1) {
									echo "checked";
								}
							?>
							>
						</label>
						<label style="color:#6de3b0; font-weight:normal;">Please check this box when you don't want the exact location of the home displayed.</label>
					</div>
				</div>

				<hr/>

				<div class="form-group row">
					<p class="col-sm-2">Bedrooms <span class="text-danger">*</span></p>
					<div class="col-sm-3">
						<!-- <input class="form-control" type="text" name="listingnumofbeds" id="form-numofbeds" value="<?php echo $listingResponse["listing_detail"]->getNumberOfBedrooms(); ?>"> -->
						<select class="form-control" name="listingnumofbeds" id="form-numofbeds">
							<option value="">N/A</option>
							<option value="1" <?php
								if (!strcmp($listingResponse["listing_detail"]->getNumberOfBedrooms(), "1")) {
									echo "selected=selected";
								}
							?>>1</option>
							<option value="2" <?php
								if (!strcmp($listingResponse["listing_detail"]->getNumberOfBedrooms(), "2")) {
									echo "selected=selected";
								}
							?>>2</option>
							<option value="3" <?php
								if (!strcmp($listingResponse["listing_detail"]->getNumberOfBedrooms(), "3")) {
									echo "selected=selected";
								}
							?>>3</option>
							<option value="4" <?php
								if (!strcmp($listingResponse["listing_detail"]->getNumberOfBedrooms(), "4")) {
									echo "selected=selected";
								}
							?>>4</option>
							<option value="5" <?php
								if (!strcmp($listingResponse["listing_detail"]->getNumberOfBedrooms(), "5")) {
									echo "selected=selected";
								}
							?>>5</option>
							<option value="6" <?php
								if (!strcmp($listingResponse["listing_detail"]->getNumberOfBedrooms(), "6")) {
									echo "selected=selected";
								}
							?>>6</option>
							<option value="7" <?php
								if (!strcmp($listingResponse["listing_detail"]->getNumberOfBedrooms(), "7")) {
									echo "selected=selected";
								}
							?>>7</option>
							<option value="8" <?php
								if (!strcmp($listingResponse["listing_detail"]->getNumberOfBedrooms(), "8")) {
									echo "selected=selected";
								}
							?>>8</option>
							<option value="9" <?php
								if (!strcmp($listingResponse["listing_detail"]->getNumberOfBedrooms(), "9")) {
									echo "selected=selected";
								}
							?>>9</option>
							<option value="10" <?php
								if (!strcmp($listingResponse["listing_detail"]->getNumberOfBedrooms(), "10")) {
									echo "selected=selected";
								}
							?>>10</option>
						</select>
					</div>

					<p class="col-sm-2">Bathrooms <span class="text-danger">*</span></p>
					<div class="col-sm-2">
						<!-- <input class="form-control" type="text" name="listingnumofbaths" id="form-numofbaths" value="<?php echo $listingResponse["listing_detail"]->getNumberOfBathrooms(); ?>"> -->
						<select class="form-control" name="listingnumofbaths" id="form-numofbaths">
							<option value="">N/A</option>
							<option value="1" <?php
								if (!strcmp($listingResponse["listing_detail"]->getNumberOfBathrooms(), "1")) {
									echo "selected=selected";
								}
							?>>1</option>
							<option value="2" <?php
								if (!strcmp($listingResponse["listing_detail"]->getNumberOfBathrooms(), "2")) {
									echo "selected=selected";
								}
							?>>2</option>
							<option value="3" <?php
								if (!strcmp($listingResponse["listing_detail"]->getNumberOfBathrooms(), "3")) {
									echo "selected=selected";
								}
							?>>3</option>
							<option value="4" <?php
								if (!strcmp($listingResponse["listing_detail"]->getNumberOfBathrooms(), "4")) {
									echo "selected=selected";
								}
							?>>4</option>
							<option value="5" <?php
								if (!strcmp($listingResponse["listing_detail"]->getNumberOfBathrooms(), "5")) {
									echo "selected=selected";
								}
							?>>5</option>
							<option value="6" <?php
								if (!strcmp($listingResponse["listing_detail"]->getNumberOfBathrooms(), "6")) {
									echo "selected=selected";
								}
							?>>6</option>
							<option value="7" <?php
								if (!strcmp($listingResponse["listing_detail"]->getNumberOfBathrooms(), "7")) {
									echo "selected=selected";
								}
							?>>7</option>
							<option value="8" <?php
								if (!strcmp($listingResponse["listing_detail"]->getNumberOfBathrooms(), "8")) {
									echo "selected=selected";
								}
							?>>8</option>
							<option value="9" <?php
								if (!strcmp($listingResponse["listing_detail"]->getNumberOfBathrooms(), "9")) {
									echo "selected=selected";
								}
							?>>9</option>
							<option value="10" <?php
								if (!strcmp($listingResponse["listing_detail"]->getNumberOfBathrooms(), "10")) {
									echo "selected=selected";
								}
							?>>10</option>
						</select>
					</div>
					<div class="col-sm-4"></div>
				</div>
				
				<div class="form-group row">
					<p class="col-sm-2">Type <span class="text-danger">*</span></p>
					<div class="col-sm-8">
						<label for="listing-apt">
							<input type="radio" name="listingtype" id="listing-apt" value="apartment"
							<?php 
								if (!strcmp($listingResponse["listing"]->getType(), "apartment")) {
									echo "checked";
								}
							?>
							>Apartment
						</label>
						<label for="listing-house">
							<input type="radio" name="listingtype" id="listing-house" value="house"
							<?php 
								if (!strcmp($listingResponse["listing"]->getType(), "house")) {
									echo "checked";
								}
							?>
							>House
						</label>
						<label for="listing-room">
							<input type="radio" name="listingtype" id="listing-room" value="room"
							<?php 
								if (!strcmp($listingResponse["listing"]->getType(), "room")) {
									echo "checked";
								}
							?>
							>Room
						</label>
						<label for="listing-shared-room">
							<input type="radio" name="listingtype" id="listing-shared-room" value="sharedroom"
							<?php 
								if (!strcmp($listingResponse["listing"]->getType(), "sharedroom")) {
									echo "checked";
								}
							?>
							>Shared room
						</label>
					</div>
				</div>

				<div class="form-group row">
					<p class="col-sm-2">Benefits</p>
					<div class="col-sm-8">
						<label for="listing-internet">
							<input type="checkbox" name="listingmisc" id="listing-internet" value="internet" 
							<?php 
								if($listingResponse["listing_detail"]->getInternet() == 1){
									echo "checked";
								}
							?>
							>Internet
						</label>
						<label for="listing-pets">
							<input type="checkbox" name="listingmisc" id="listing-pets" value="pet" 
							<?php 
								if(!strcmp($listingResponse["listing_detail"]->getPetPolicy(),"yes")){
									echo "checked";
								}
							?>
							>Pets
						</label>
						<label for="listing-elevator">
							<input type="checkbox" name="listingmisc" id="listing-elevator" value="elevator" 
							<?php 
								if(!strcmp($listingResponse["listing_detail"]->getElevatorAccess(),"yes")){
									echo "checked";
								}
							?>
							>Elevtor
						</label>
						<label for="listing-furnished">
							<input type="checkbox" name="listingmisc" id="listing-furnished" value="furniture" 
							<?php 
								if($listingResponse["listing_detail"]->getFurnishing() == 1){
									echo "checked";
								}
							?>
							>Furnished
						</label>
						<label for="listing-ac">
							<input type="checkbox" name="listingmisc" id="listing-ac" value="airconditioning" 
							<?php 
								if($listingResponse["listing_detail"]->getAirConditioning() == 1){
									echo "checked";
								}
							?>
							>Air Conditioning
						</label>
					</div>
				</div>

				<div class="form-group row">
					<p class="col-sm-2">Description</p>
					<div class="col-sm-8">
						<textarea class="form-control" id="listing-description" rows="4"><?php echo $listingResponse["listing_detail"]->getDescription(); ?></textarea>
					</div>
				</div>

				<hr/>

				<div class="form-group row">
					<p class="col-sm-2">Image(s) <span class="text-danger">*</span></p>
					<div class="col-sm-10">
						<input type="file" name="listingimage" id="form-image" multiple>
						<label style="color:#6de3b0; font-weight:normal;">Choose one or more</label>
					</div>

				</div>

				<hr/>

				<div class="form-group row">
					<div class="col-sm-2"></div>
					<label class="col-sm-10" style="color:#6de3b0; font-weight:normal;">All fields marked with * must be filled in</label>
				</div>

				<div class="row">
					<div class="col-sm-3"></div>
					<button class="btn btn-primary btn-lg col-sm-6" id="submit-listing" type="submit">Save Changes</button>
					<div class="col-sm-3"></div>
				</div>

			</form>
		</div>
		<div class="col-sm-1"></div>
	</div>
</div>

<script src = "<?php echo URL; ?>js/listings.js"></script>
<script>
	
	$(document).ready(function() {
		$.validator.addMethod("letters", function(value, element) 
			{
				return this.optional(element) || /^[a-z ]+$/i.test(value);
			}, "Alphabetical letters only!");

			$("#edit").validate({
				rules: {
					listingtitle:{
						required: true,
						maxlength: 50
					},
					listingaddress: {
						required: true,
						minlength: 1
					},
					listingcity: {
						required: true,
						letters: true,
						minlength: 2
					},
					listingstate: {
						required: true
					},
					listingprice: {
						required: true,
						number: true
					},
					listingzipcode: {
						required: true,
						number: true,
						minlength: 5,
						maxlength: 5
					},
					// listingnumofbeds: {
					// 	required: true,
					// 	number: true
					// },
					// listingnumofbaths: {
					// 	required: true,
					// 	number: true
					// },
					listingtype: {
						required: true
					}

				},
				messages: {
					listingprice: {
						required: "required"
					},
					listingaddress: {
						required: "required"
					},
					listingcity: {
						required: "required"
					},
					listingstate: {
						required: "required"
					},
					listingzipcode: {
						required: "required"
					},
					listingnumofbeds: {
						required: "required"
					},
					listingnumofbaths: {
						required: "required"
					},
					listingtype: {
						required: "required"
					}
				},
				highlight: function(element) {
					$(element).addClass("form-error");
				},
				unhighlight: function(element) {
					$(element).removeClass("form-error");
				},
				errorPlacement: function(error, element) {
					error.insertAfter(element);
					error.css('color', '#ff0000');
				}
				// submitHandler: function(form) {
				// 	form.submit();
				// }

			});
		});

</script>