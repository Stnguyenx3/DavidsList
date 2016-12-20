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
		<div class="row">
			
		</div>
		<!-- <div class="row">
			<div class="col-sm-3">
				<img src="<?php echo URL; ?>img/logo.png" height="100" alt="logo" onclick="onLogoClick()">
			</div>
			<div class="col-sm-6 disclaimer">
				<h3 class="centered-header">SFSU/FAU/Fulda Software Engineering Project, Fall 2016.  For Demonstration Only</h3>
			</div>
			<div class="col-sm-3"></div>
		</div> -->
		<div class="row navigation">
			<div class="col-sm-1 logo" style="overflow:hidden">
				<img src="<?php echo URL; ?>img/logo.png" height="55px" alt="logo" onclick="onLogoClick()">
			</div>
			<div class="col-md-3" style="padding:0; margin:0;">
				<div class="navbar-header">
				    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#account-dropdown-links-to-home" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				    </button>
			    </div>
	    		<div class="collapse navbar-collapse" id="account-dropdown-links-to-home">
	    			<ul class="nav navbar-nav">
	    				<!-- <li><a href="<?php echo URL. "home/index" ; ?>" id="nav-link-0">Home</a></li> -->
	    				<li><a href="<?php echo URL. "home/rentout" ; ?>" id="nav-link-1">Create Listing</a></li>
	    			</ul>
	    		</div>
			</div>
			<div class="col-md-4">
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
					<a href="<?php echo URL."home/login" ; ?>">Login</a>
					<p style="display:inline">|</p>
					<a href="<?php echo URL. "home/register" ; ?>">Register</a>
				</div>
			</div>
		</div>
</div><!--End header-->

<div class="row" style="padding:0;  margin:0;">
	<div class="col-sm-12 disclaimer">
		<p class="centered-header">SFSU/FAU/Fulda Software Engineering Project, Fall 2016.  For Demonstration Only</p>
	</div>
</div>

<script>
	function onLogoClick() {
		window.location.replace("<?php echo URL . 'home/index' ?>");
	}
</script>