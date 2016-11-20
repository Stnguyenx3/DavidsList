<div class="container main">
	<div class="row rent-out">
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<form class="form-rentout linear-gradient-bg" id="rentout" action="#" method="post">

				<div class="form-group row">
					<label for="form-image" class="col-sm-2 text-right">Image</label>
					<div class="col-sm-10">
						<input type="file" name="listing-image" id="listing-image" multiple>
						<button class="btn-link" id="upload-image" type="submit" onclick='uploadImage()'>Upload</button>
					</div>

				</div>

				<div class="form-group row">
					<label for="form-address" class="col-sm-2 text-right">Address</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="form-address" placeholder="address">
					</div>
				</div>

				<div class="form-group row">
					<label for="form-city" class="col-sm-2 text-right">City</label>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="form-city" placeholder="city">
					</div>
					<label for="form-state" class="col-sm-1 text-right">State</label>
					<div class="col-sm-2">
						<select class="form-control" name="form-state" style="width: auto;">
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
					<label for="form-zip" class="col-sm-2 text-right">Zip</label>
					<div class="col-sm-2">
						<input class="form-control" type="text" name="form-zip" placeholder="zip code">
					</div>

				</div>

				<div class="form-group row">
					<label for="form-NumofBed" class="col-sm-2 text-right">Number of Bedrooms</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="form-NumofBed" placeholder="Number of Bedrooms">
					</div>
				</div>

				<div class="form-group row">
					<label for="form-NumofBath" class="col-sm-2 text-right">Number of Bathrooms</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="form-NumofBath" placeholder="Number of Bathrooms">
					</div>
				</div>
				
				<div class="form-group row">
					<label for="form-type" class="col-sm-2 text-right">Type</label>
					<div class="col-sm-10">
						<label>
							<input type="radio" name="optiontype" id="optiontype1" value="apartment">Apartment
						</label>
						<label>
							<input type="radio" name="optiontype" id="optiontype2" value="house">House
						</label>
						<label>
							<input type="radio" name="optiontype" id="optiontype3" value="room">Room
						</label>
						<label>
							<input type="radio" name="optiontype" id="optiontype4" value="shareroom">Shared room
						</label>
					</div>
				</div>

				<div class="form-group row">
					<label for="form-moreoption" class="col-sm-2 text-right">Misc</label>
					<div class="col-sm-10">
						<label>
							<input type="checkbox" name="moreoption" id="moreoption1" value="internet">Internet
						</label>
						<label>
							<input type="checkbox" name="moreoption" id="moreoption1" value="internet">Pets
						</label>
						<label>
							<input type="checkbox" name="moreoption" id="moreoption3" value="elevtor">Elevtor
						</label>
						<label>
							<input type="checkbox" name="moreoption" id="moreoption4" value="furniture">Furniture
						</label>
						<label>
							<input type="checkbox" name="moreoption" id="moreoption6" value="airconditioning">Air Conditioning
						</label>
					</div>
				</div>

				<div class="form-group row">
					<label for="form-description" class="col-sm-2 text-right">Description</label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="4" placeholder="Description"></textarea>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-3"></div>
					<button class="btn btn-primary col-sm-6" id="submit-listing" type="submit">Post Listing</button>
					<div class="col-sm-3"></div>
				</div>

			</form>
		</div>
		<div class="col-sm-1"></div>
	</div>
</div>