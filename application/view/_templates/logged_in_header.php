<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>David's List</title>
	<link rel="icon" type="image/ico" href="<?php echo URL; ?>img/browser_logo.ico">   
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    

    <script type="text/javascript" src="<?php echo URL; ?>js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/search.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/listings.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/jquery.twbsPagination.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/notify.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/notifications.js"></script>

    <!-- CSS -->
	<link href="<?php echo URL; ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo URL; ?>css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
</head>
<body id="content">

	<?php include_once("analyticstracking.php") ?>

	<div class="container" id="header">
		<div class="row navigation">
			<div class="col-md-1 logo" >
				<img src="<?php echo URL; ?>img/logo.png" height="55px" alt="logo" onclick="onLogoClick()">
			</div>

			<div class="col-md-3" style="padding:0; margin:0;">
				<div class="navbar-header">
				    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#account-dropdown-links" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				    </button>
			    </div>
	    		<div class="collapse navbar-collapse" id="account-dropdown-links">
	    			<ul class="nav navbar-nav">
	    				<!-- <li><a href="<?php echo URL. "home/index" ; ?>" id="nav-link-0">Home</a></li> -->
	    				<li><a href="<?php echo URL. "home/rentout" ; ?>" id="nav-link-1">Create Listing</a></li>
	    				<li class="dropdown">
	    					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="nav-link-2">My Account<span class="caret"></span></a>
	    					<ul class="dropdown-menu">
	    						<li><a href="<?php echo URL."users/getuser/" . $arrayOfUserObjects[0]->getId(); ?>">Profile</a></li>
	    						<li><a href ="<?php echo URL. "messages/allmessages/" . $arrayOfUserObjects[0]->getId(); ?>">Messages</a></li>
	    						<li><a href="<?php echo URL. "users/userlistings/" . $arrayOfUserObjects[0]->getId(); ?>">My Listings</a></li>
	    						<li><a href="<?php echo URL."users/favorites/" . $arrayOfUserObjects[0]->getId(); ?>">My Favorites</a></li>
	    					</ul>
	    				</li>
	    			</ul>
	    		</div>
			</div>
			<div class="col-md-4" style="padding:0; margin:0;">
				<div class="input-group" id="search-bar">
			      	<input id="search-input" type="text" class="form-control" placeholder="Enter an Address, City, or ZIP code..." onkeypress="return enterPressed(event)" required autofocus>
			      	<span class="input-group-btn">
			        	<button class="btn btn-secondary" type="button" onclick="onSearchClick()">
			        		<span class="glyphicon glyphicon-search"></span>
			        	</button>
			      	</span>
			    </div>
			</div>
			<div class="col-md-4">
				<div class="user">
					<a href="<?php echo URL."users/getuser/" . $arrayOfUserObjects[0]->getId() ; ?>"><?php echo "Signed in as " . $arrayOfUserObjects[0]->getUsername() ?></a>
					<p style="display:inline">|</p>
					<a href="<?php echo URL. "users/logout" ; ?>">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<div class="row" style="padding:0; margin:0;">
		<div class="col-sm-12 disclaimer">
			<p class="centered-header">SFSU/FAU/Fulda Software Engineering Project, Fall 2016.  For Demonstration Only</p>
		</div>
	</div>


<script>

	function onLogoClick() {
		window.location.replace("<?php echo URL . 'home/index' ?>");
	}

</script>