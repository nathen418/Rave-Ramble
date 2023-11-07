<?php
include('header.php');
$page_title = 'Home | RaveRamble';
require('mysqli_connect.php');



$url = isset($_GET['url']) ? $_GET['url'] : '';

// Perform a database lookup based on the URL
$query = "SELECT destination_url FROM redirect_table WHERE url_slug = ?";
$result = mysqli_query($dbc, $query);


?>