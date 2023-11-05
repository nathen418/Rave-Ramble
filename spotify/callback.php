<?php
require '../vendor/autoload.php';
session_start();
if (!array_key_exists('user_id', $_SESSION)) {
    echo 'no user id';
    header('Location: ../signin.php');
    die();
}
$session = new SpotifyWebAPI\Session(
    $_ENV['SPOTIFY_CLIENT_ID'],
    $_ENV['SPOTIFY_CLIENT_SECRET'],
    $_ENV['SPOTIFY_REDIRECT_URI']
);

$state = $_GET['state'];

// Fetch the stored state value from somewhere. A session for example

if ($state !== $_SESSION['spotifyState']) {
    // The state returned isn't the same as the one we've stored, we shouldn't continue
    die('State mismatch');
}

// Request a access token using the code from Spotify
$session->requestAccessToken($_GET['code']);

$accessToken = $session->getAccessToken();
$_SESSION['spotifyAccessToken'] = $accessToken;
$refreshToken = $session->getRefreshToken();

// Store the access and refresh tokens somewhere. In a session for example

// Send the user along and fetch some data!
header('Location: ../spotify/app.php');
die();
?>