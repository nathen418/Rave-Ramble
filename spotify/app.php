<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
session_start();


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

// Fetch the saved access token from somewhere.
if (!isset($_SESSION['spotifyAccessToken'])) {
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
    if ($type == 'artists') {
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
    } else if ($type == 'tracks') {
        // parse the object in test.json]
        $top = $api->getMyTop($type, $options);
        foreach ($top->items as $item) {
            $topName[] = $item->name;
            $topImages[] = $item->album->images[0]->url;
            $topArtists[] = $item->artists[0]->name;
            $topLinks[] = $item->external_urls->spotify;
        }
        return array($topName, $topArtists, $topImages, $topLinks);
    }
}
function getSpotifyRecommendations($api, $options)
{
    $recommendations = $api->getRecommendations($options);
    return $recommendations;
}
