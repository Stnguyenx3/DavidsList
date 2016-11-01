<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>David's List</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <!-- CSS -->
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
</head>
<body>
    <!-- logo -->

    <div class="search-header" id="search-container">

        <div class="logo">
            <img src="<?php echo URL; ?>img/logo.png" height="100">
        </div>

        <div class="container">
            <input id="search-input" type="text" placeholder="City, street, zipcode..." required autofocus/>
            <button id="search-get" type="submit" onclick='onSearchClick()'>Search For Homes</button>
        </div>
    </div>

    <!-- navigation -->
    <div class="navigation">
        <a href="<?php echo URL; ?>">home</a>
        <a href="<?php echo URL ; ?>">rent out</a>
        <a href="<?php echo URL ; ?>">about</a>
    </div>
