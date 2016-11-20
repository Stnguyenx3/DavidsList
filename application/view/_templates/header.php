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

    <!-- CSS -->
	<link href="<?php echo URL; ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
</head>
<body id="content">

	<div class="container" id="header">
	
		<div class="row">
			<div class="col-sm-12">
				<div class="user">
					<a href="<?php echo URL."home/login" ; ?>">Login</a>
					<p style="display:inline">|</p>
					<a href="<?php echo URL. "home/register" ; ?>">Register</a>
				</div>
			</div>
		</div>
		
		<div class="row">
		
			<div class="col-sm-3">
				<img src="<?php echo URL; ?>img/logo.png" height="100" alt="logo">
			</div>
			
			<div class="col-sm-9" id="search-bar">
    				<input id="search-input" type="text" placeholder="City, Street, Zipcode..." onkeypress="return enterPressed(event)" required autofocus/><button id="search-get" type="button" class="btn btn-primary" onclick="onSearchClick()">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
			</div>
			
		</div>

    <!-- navigation -->
    <div class="navigation">
        <a href="<?php echo URL. "home/index" ; ?>">home</a>
        <a href="<?php echo URL. "home/rentout" ; ?>">rent out</a>
        <a href="<?php echo URL. "info/about" ; ?>">about</a>
    </div>

</div><!--End header-->
