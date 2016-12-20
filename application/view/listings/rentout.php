<div class="container main">

	<div class="row rent-out">
		<div class="col-sm-2"></div>

		<div class="col-sm-8">

			<h2 class="centered-header">Create a Listing</h2>

			<form class="form-rentout" id="rentout" action="#" method="post">

				<div class="form-group row">
					<p class="col-sm-2">Title <span class="text-danger">*</span></p>
					<div class="col-sm-8">
						<input class="form-control" type="text" name="listingtitle" id="form-title" placeholder="Title">
					</div>
				</div>

				<div class="form-group row">
					<p class="col-sm-2">Price <span class="text-danger">*</span></p>
					<div class="col-sm-4">
						<label for="form-price" style="font-weight: normal">$</label>
						<input class="form-control" style="width: 60%; display:inline-block" type="text" name="listingprice" id="form-price" placeholder="Price">
					</div>
				</div>

				<hr/>

				<div class="form-group row">
					<p class="col-sm-2">Address <span class="text-danger">*</span></p>
					<div class="col-sm-8">
						<input class="form-control" type="text" name="listingaddress" id="form-address" placeholder="Address">
					</div>
				</div>


				<div class="form-group row">
					<p class="col-sm-2">City <span class="text-danger">*</span></p>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="listingcity" id="form-city" placeholder="City">
					</div>

					<div class="col-sm-6">
					<p style="display:inline-block">State <span class="text-danger">*</span></p>		
						<select class="form-control" name="listingstate" id="form-state" style="width: auto; display:inline-block">
							<option value="">N/A</option>
							<option value="AK">Alaska</option>
							<option value="AL">Alabama</option>
							<option value="AR">Arkansas</option>
							<option value="AZ">Arizona</option>
							<option value="CA">California</option>
							<option value="CO">Colorado</option>
							<option value="CT">Connecticut</option>
							<option value="DC">District of Columbia</option>
							<option value="DE">Delaware</option>
							<option value="FL">Florida</option>
							<option value="GA">Georgia</option>
							<option value="HI">Hawaii</option>
							<option value="IA">Iowa</option>
							<option value="ID">Idaho</option>
							<option value="IL">Illinois</option>
							<option value="IN">Indiana</option>
							<option value="KS">Kansas</option>
							<option value="KY">Kentucky</option>
							<option value="LA">Louisiana</option>
							<option value="MA">Massachusetts</option>
							<option value="MD">Maryland</option>
							<option value="ME">Maine</option>
							<option value="MI">Michigan</option>
							<option value="MN">Minnesota</option>
							<option value="MO">Missouri</option>
							<option value="MS">Mississippi</option>
							<option value="MT">Montana</option>
							<option value="NC">North Carolina</option>
							<option value="ND">North Dakota</option>
							<option value="NE">Nebraska</option>
							<option value="NH">New Hampshire</option>
							<option value="NJ">New Jersey</option>
							<option value="NM">New Mexico</option>
							<option value="NV">Nevada</option>
							<option value="NY">New York</option>
							<option value="OH">Ohio</option>
							<option value="OK">Oklahoma</option>
							<option value="OR">Oregon</option>
							<option value="PA">Pennsylvania</option>
							<option value="PR">Puerto Rico</option>
							<option value="RI">Rhode Island</option>
							<option value="SC">South Carolina</option>
							<option value="SD">South Dakota</option>
							<option value="TN">Tennessee</option>
							<option value="TX">Texas</option>
							<option value="UT">Utah</option>
							<option value="VA">Virginia</option>
							<option value="VT">Vermont</option>
							<option value="WA">Washington</option>
							<option value="WI">Wisconsin</option>
							<option value="WV">West Virginia</option>
							<option value="WY">Wyoming</option>
						</select>
					</div>

				</div>

				<div class="form-group row">
					<p class="col-sm-2">Zipcode <span class="text-danger">*</span></p>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="listingzipcode" id="form-zipcode" placeholder="Zipcode">
					</div>
				</div>

				<div class="form-group row">
					<p class="col-sm-2">Approximate Address <span class="text-danger">*</span></p>
					<div class="col-sm-8">
						<label for="listing-internet">
							<input type="checkbox" name="listingaddressapprox" id="form-approx" value="approximate">
						</label>
						<label style="color:#6de3b0; font-weight:normal;">Please check this box when you don't want the exact location of the home displayed.</label>
					</div>
				</div>

				<hr/>

				<div class="form-group row">
					<p class="col-sm-2">Bedrooms <span class="text-danger">*</span></p>
					<div class="col-sm-3">
						<select class="form-control" name="listingnumofbeds" id="form-numofbeds" style="width: auto;">
							<option value="">N/A</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
						</select>
					</div>

					<p class="col-sm-2">Bathrooms <span class="text-danger">*</span></p>
					<div class="col-sm-3">
						<select class="form-control" name="listingnumofbaths" id="form-numofbaths" style="width: auto;">
							<option value="">N/A</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
						</select>
					</div>
					<div class="col-sm-4"></div>
				</div>
				
				<div class="form-group row">
					<p class="col-sm-2">Type <span class="text-danger">*</span></p>
					<div class="col-sm-8" >
						<label for="listing-apt">
							<input type="radio" name="listingtype" id="listing-apt" value="apartment" /> Apartment
						</label>
						<label for="listing-house">
							<input type="radio" name="listingtype" id="listing-house" value="house" /> House
						</label>
						<label for="listing-room">
							<input type="radio" name="listingtype" id="listing-room" value="room" /> Room
						</label>
						<label for="listing-shared-room" id="listing-type">
							<input type="radio" name="listingtype" id="listing-shared-room" value="sharedroom" /> Shared room
						</label>
					</div>
				</div>

				<div class="form-group row">
					<p class="col-sm-2">Benefits</p>
					<div class="col-sm-8">
						<label for="listing-internet">
							<input type="checkbox" name="listingmisc" id="listing-internet" value="internet"> Internet
						</label>
						<label for="listing-pets">
							<input type="checkbox" name="listingmisc" id="listing-pets" value="pet"> Pets
						</label>
						<label for="listing-elevator">
							<input type="checkbox" name="listingmisc" id="listing-elevator" value="elevator"> Elevator
						</label>
						<label for="listing-furnished">
							<input type="checkbox" name="listingmisc" id="listing-furnished" value="furniture"> Furnished
						</label>
						<label for="listing-ac">
							<input type="checkbox" name="listingmisc" id="listing-ac" value="airconditioning"> Air Conditioning
						</label>
					</div>
				</div>

				<div class="form-group row">
					<p class="col-sm-2">Description</p>
					<div class="col-sm-8">
						<textarea class="form-control" id="listing-description" rows="4" placeholder="Description"></textarea>
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

					<div class="col-sm-12">
						<a href="<?php echo URL. "home/index" ; ?>" class="btn btn-primary btn-lg" style="display:inline-block; float:left;">Cancel</a>
	
						<button class="btn btn-primary btn-lg" id="submit-listing" type="submit" style="display:inline-block; float:right;">Post Listing</button>
					</div>
				</div>

			</form>
		</div>
		<div class="col-sm-1"></div>
	</div>
</div>

<script src = "<?php echo URL; ?>js/listings.js"></script>

<script>

	//Highlight the current pages' navbar link.
	$("#nav-link-1").css("color", "#6de3b0");
	
	$(document).ready(function() {

		$.validator.addMethod("letters", function(value, element) 
			{
				return this.optional(element) || /^[a-z ]+$/i.test(value);
			}, "Alphabetical letters only!");

			$("#rentout").validate({
				rules: {
					listingtitle: {
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
					},
					listingimage: {
						required: true
					}

				},
				messages: {
					listingtitle: {
						required: "required",
					},
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
					element[0].name === "listingtype" ? error.insertBefore(element) : error.insertAfter(element);
					error.css('color', 'rgba(255,0,0,1)');
				}
				// submitHandler: function(form) {
				// 	form.submit();
				// }

			});
		});

</script>