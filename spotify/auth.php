<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
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

$state = $session->generateState();
$_SESSION['spotifyState'] = $state;
$options = [
    'scope' => [
        'playlist-read-private',
        'user-read-private',
        'user-top-read',
        'user-read-email',
    ],
    'state' => $_SESSION['spotifyState'],
];

header('Location: ' . $session->getAuthorizeUrl($options));
die();
?>