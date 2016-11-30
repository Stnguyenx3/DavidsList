<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>David's List</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    

    <script type="text/javascript" src="<?php echo URL; ?>js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/search.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/listings.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/jquery.twbsPagination.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/notify.js"></script>

    <!-- CSS -->
	<link href="<?php echo URL; ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
</head>
<body id="content">

	<div class="container" id="header">
	
		<div class="row">
			<div class="col-sm-12">
				<div class="user">
					<a href="<?php echo URL."users/getuser/" . $arrayOfUserObjects[0]->getId() ; ?>"><?php echo $arrayOfUserObjects[0]->getUsername() ?></a>
					<p style="display:inline">|</p>
					<a href="<?php echo URL. "users/logout" ; ?>">Logout</a>
				</div>
			</div>
		</div>
		
		<div class="row">
		
			<div class="col-sm-3">
				<img src="<?php echo URL; ?>img/logo.png" height="100" alt="logo">
			</div>

			<div class="col-sm-6 disclaimer">
				<h3 class="centered-header">SFSU/FAU/Fulda Software Engineering Project, Fall 2016.  For Demonstration Only</h3>
			</div>

			<div class="col-sm-3"></div>
			
		</div>

    <div class="navigation">
    <!-- navigation -->

    	<div class="row">
    		
	    	<div class="col-md-3 nav-link-div">
	    		<a href="<?php echo URL. "home/index" ; ?>">Home</a>
	    		<a href="<?php echo URL. "home/rentout" ; ?>">Rent Out</a>
	    		<a href="<?php echo URL."users/getuser/" . $arrayOfUserObjects[0]->getId() ; ?>">My Profile</a>
	    		<a href="<?php echo URL. "users/userlistings/". $arrayOfUserObjects[0]->getId() ?>">My Listings</a>
	    	</div>

	    	<div class="col-md-9" id="search-bar">
				<input id="search-input" type="text" placeholder="Enter an Address, City, or ZIP code..." onkeypress="return enterPressed(event)" required autofocus/><button id="search-get" type="button" class="btn btn-primary search-button" onclick="onSearchClick()">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
	    	</div>

    	</div>

    </div>
