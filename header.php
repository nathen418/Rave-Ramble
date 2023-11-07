<?php
date_default_timezone_set('CDT');
session_start(); 
require("./vendor/autoload.php");
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
?>
<!DOCTYPE html">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="./resources/mdb.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="./resources/logo.png" type="image/x-icon">
	<script src="https://kit.fontawesome.com/7f4c007346.js" crossorigin="anonymous"></script>
	<title><?php echo $page_title; ?></title>
	<meta name="description" content="A brand new music community">
	<meta name="keywords" content="Rave Ramble, Rave, Ramble">
	<meta name="author" content="Rave Ramble">
	<meta property="og:type" content="website">
	<meta property="og:title" content="Rave Ramble">
	<meta property="og:description" content="A brand new music community">
	<meta property="theme-color" content="#6761A8">
	<meta canonical href="https://raveramble.com">


	<style>
		::-webkit-scrollbar {
			display: none;

		}

		iframe::-webkit-scrollbar {
			display: none;
		}

		body {
			background-color: black;
		}

		.row>* {
			padding-right: 1px;
			padding-left: 1px;
		}

		#left-sidebar,
		#right-sidebar {
			height: 100vh;
			position: sticky;
			overflow: hidden;
			background-color: black;
		}

		footer {
			position: fixed;
			bottom: 0;
			width: 100%;
			background-color: black;
		}

		.sidebar {
			background-color: black;
		}

		#post-card {
			background-color: #16181c;
			color: white;
			border-radius: 10px
		}

		#ramble-card {
			background-color: #16181c;
			color: white;
			border-radius: 10px
		}

		#signin-card {
			background-color: #16181c;
			color: white;
			border-radius: 10px
		}
		#register-card {
			background-color: #16181c;
			color: white;
			border-radius: 10px
		}
		#pfp-stats-card {
			background-color: #16181c;
			color: white;
			border-radius: 10px
		}
		

		#suggested-follow-card {
			background-color: #16181c;
			color: white;
			border-radius: 10px
		}

		#events-card {
			background-color: #16181c;
			color: white;
			border-radius: 10px
		}
		#home-card {
			background-color: #16181c;
			color: white;
			border-radius: 10px
		}

		.btn-primary {
			background-color: #7151a9;
			border: none;
		}

		.username {
			color: white;
		}

		a {
			text-decoration: none;
		}
		a:hover {
			color: #cb31ce;
		}
	</style>
</head>

<body>