<?php
require '../vendor/autoload.php';
session_start();
if (!array_key_exists('user_id', $_SESSION)) {
    header('Location: ../signin.php');
    die();
}

$api = new SpotifyWebAPI\SpotifyWebAPI();

// Fetch the saved access token from somewhere. A session for example.
if (!isset($_SESSION['spotifyAccessToken'])) {
    header('Location: ../spotify/auth.php');
    die();
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
header('Location: ../home.php');
