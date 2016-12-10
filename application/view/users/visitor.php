<div class="container main">
	
	<div class="row">
		
		<div class="col-md-4"></div>

		<div class="col-md-4">
				
			<h3 class="cenetered-header">User: <?php echo $userResponse["user"]->getUsername() ?></h3>

			<img src="http://placehold.it/175x175" alt="placeholder img.">

		</div>

		<div class="col-md-4"></div>

	</div>


	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-3"><label style="padding-left: 15px; padding-right: 15px;">Username</label></div>
		<div class="col-md-3"><p class="username"><?php echo $userResponse["user"]->getUsername() ?></p></div>
		<div class="col-md-3"></div>
	</div>

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-3"><label style="padding-left: 15px; padding-right: 15px;">Email</label></div>
		<div class="col-md-3"><p class="email"><?php echo $userResponse["user"]->getEmail() ?></p></div>
		<div class="col-md-3"></div>
	</div>


</div>