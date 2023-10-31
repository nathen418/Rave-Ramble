<?php session_start(); ?>
<!DOCTYPE html">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="./resources/bootstrap.min.css" rel="stylesheet">
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
		#sort {
			text-align: center;
		}

		body {
			background: #ced4da;
			height: 100%;
			/* overflow: hidden */
		}

		footer {
			position: fixed;
			bottom: 0;
			width: 100%;
		}

		html {
			min-height: 100%;
			/* make sure it is at least as tall as the viewport */
			position: relative;
		}

		.card-body {
			border-radius: 10px;
			background-color: #f8f9fa;
		}

		.btn-dark {
			background-color: #7151a9;
		}

		#left-sidebar {
			height: 100vh;
			/* 100% of the viewport height */
		}

		#right-sidebar {
			height: 100vh;
			/* 100% of the viewport height */
		}

		.btn-primary {
			background-color: #7151a9;
		}
	</style>

</head>

<body>