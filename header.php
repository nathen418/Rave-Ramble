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
		body {
			display: flex;
			flex-direction: row;
			 justify-content: space-between;
			/* other styles */
			background: #ced4da;
			height: 100%;
		}

		#left-sidebar{
			flex: 1;
			width: 20vw;
			height: 100vh;
			position: sticky;
			/* other styles */
		}
		#right-sidebar {
			flex: 1;
			width: 20vw;
			height: 100vh;
			position: sticky;
			/* other styles */
		}

		/* .sidebar {
			position: sticky;
		} */

		footer {
			position: fixed;
			bottom: 0;
			width: 100%;
		}

		alert-position {
			position: fixed;
			top: 0;
			width: 100%;
		}

		main {
			height: 100vh;
			/* 100% of the viewport height */
			overflow-y: auto;
			/* Enable vertical scrolling when the content exceeds the height */
		}

		.post-container {
			max-height: 100vh;
			/* Adjust the height as needed */
			overflow-y: auto;
		}

		.card-body {
			border-radius: 10px;
			background-color: #f8f9fa;
		}

		.btn-dark {
			background-color: #7151a9;
		}

		.btn-primary {
			background-color: #7151a9;
		}
	</style>

</head>

<body>