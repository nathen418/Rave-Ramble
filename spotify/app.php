<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
session_start();
// if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
//     // The page was imported as part of another script
//     // You can choose to include some code here or simply do nothing
// } else {
//     // The page is accessed directly by the user
//     header("Location: ../home.php");
//     exit();
// }
if (!array_key_exists('user_id', $_SESSION)) {
    header('Location: ../signin.php');
    die();
}

$session = new SpotifyWebAPI\Session(
    $_ENV['SPOTIFY_CLIENT_ID'],
    $_ENV['SPOTIFY_CLIENT_SECRET'],
    $_ENV['SPOTIFY_REDIRECT_URI']
);

$api = new SpotifyWebAPI\SpotifyWebAPI();

// Fetch the saved access token from somewhere. A session for example.
if (!isset($_SESSION['spotifyAccessToken'])) {
    // header('Location: ../spotify/auth.php');
    // die();
   $session->refreshAccessToken($_SESSION['spotifyRefreshToken']);
   echo $_SESSION['spotifyRefreshToken'];
   $newAccessToken = $session->getAccessToken();
   $_SESSION['spotifyAccessToken'] = $newAccessToken;
    
} else {
    $api->setAccessToken($_SESSION['spotifyAccessToken']);
}

function getSpotifyUser($api)
{
    $user = $api->me();
    return $user;
}
function getSpotifyTop($api, $type, $options)
{
    if ($type == 'artists' || $type == 'tracks') {
        $top = $api->getMyTop($type, $options);
        foreach ($top->items as $item) {
            $topName[] = $item->name;
            $topImages[] = $item->images[0]->url;
        }
        return array($topName, $topImages);
    } else if ($type == 'genres') {
        $top = $api->getMyTop('artists', $options);
        foreach ($top->items as $item) {
            foreach ($item->genres as $genre) {
                $genres[] = $genre;
            }
        }
        return array($genres);
    }
}
function getSpotifyRecommendations($api, $options)
{
    $recommendations = $api->getRecommendations($options);
    return $recommendations;
}
