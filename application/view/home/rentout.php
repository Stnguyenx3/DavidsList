
</br></br>
<div class="col-sm-3"></div>
<div class="col-sm-8">
	<form class="form-rentout" id="rentout" action="#" method="post">

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
			<label for="from-price" class="col-sm-1 col-form-label">Price</label>
			<div class="col-sm-5">
				<input class="form-control" type="text" name="from-price" placeholder="price">
			</div>
		</div>

		<div class="form-group row">
			<label for="form-note" class="col-sm-1 col-form-label">Note</label>
			<div class="col-sm-5">
				<input class="form-control" type="text" name="form-note" placeholder="50 words limit">
			</div>
		</div>

		<div class="form-group row">
			<label for="form-address" class="col-sm-1 col-form-label">Address</label>
			<div class="col-sm-5">
				<input class="form-control" type="text" name="form-address" placeholder="address line1">
				</br>
				<input class="form-control" type="text" name="form-address" placeholder="address line2">
			</div>
		</div>

		<div class="form-group row">
			<label for="form-zip" class="col-sm-1 col-form-label">Zip Code</label>
			<div class="col-sm-2">
				<input class="form-control" type="text" name="form-zip" placeholder="zip code">
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
			<label for="form-pet" class="col-sm-1 col-form-label">Per Policy</label>
			<div class="col-sm-1">
				<input class="form-control" type="text" name="form-pet" placeholder="pet policy">
			</div>
			<label for="form-NumofBed" class="col-sm-1 col-form-label">Number of Bedroom</label>
			<div class="col-sm-1">
				<input class="form-control" type="text" name="form-NumofBed" placeholder="Number of Bedroom">
			</div>
			<label for="form-NumofBath" class="col-sm-1 col-form-label">Number of Bathroom</label>
			<div class="col-sm-1">
				<input class="form-control" type="text" name="form-NumofBath" placeholder="Number of Bathroom">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="form-type" class="col-sm-1 col-form-label">Type</label>
			<div class="col-sm-8">
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
					<input type="radio" name="optiontype" id="optiontype4" value="shareroom">Share room
				</label>
			</div>
		</div>

		<div class="form-group row">
			<label for="form-moreoption" class="col-sm-1 col-form-label">More Options</label>
			<div class="col-sm-8">
				<label>
					<input type="checkbox" name="moreoption" id="moreoption1" value="internet">Internet
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
			<label for="form-description" class="col-sm-1 col-form-label">Description</label>
			<div class="col-sm-5">
				<textarea class="form-control" rows="3" placeholder="Description"></textarea>
			</div>
		</div>

		<div class="col-sm-6"></div>
		<button class="btn btn-primary" id="submit-listing" type="submit">Submit</button>

	</form>
</div>