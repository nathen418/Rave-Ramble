<div id="pfp-stats-card" class="card-body mt-3" style="border-radius: 10px">
    <h5 class="card-title">Your top 5 artists:</h5>
    <?php

    $topArtists = getSpotifyTop($api, 'artists', ['limit' => 5 ]);
    for ($i = 0; $i < 5; $i++) {
        echo "<div class=\"col align-center \">";
        echo "<img src=\"" . $topArtists[1][$i] . "\" height=\"50\" loading=\"lazy\" />";
        echo $topArtists[0][$i];
        echo "</div>";
    }
    ?>
</div>
<div id="pfp-stats-card" class="card-body mt-3" style="border-radius: 10px">
    <h5 class="card-title">Your top 5 tracks:</h5>
    <?php

    $topTracks = getSpotifyTop($api, 'tracks', ['limit' => 5 ]);
    for ($i = 0; $i < 5; $i++) {
        echo "<div class=\"col align-center \">";
        echo "<a class=\"username\" href=\"" . $topTracks[3][$i] . "\">";
        echo "<img src=\"" . $topTracks[2][$i] . "\" height=\"50\" loading=\"lazy\" />";
        echo $topTracks[0][$i];
        echo "</a>";
        echo "</div>";
    }
    ?>
</div>
<div id="pfp-stats-card" class="card-body mt-3" style="border-radius: 10px">
    <h6 class="card-title">Your top 5 genres:</h6>
    <?php

    $topArtists = getSpotifyTop($api, 'genres', ['limit' => 5 ]);
    for ($i = 0; $i < 5; $i++) {
        echo "<div class=\"col align-center \">";
        echo "<img src=\"" . $topArtists[1][$i] . "\" height=\"50\" loading=\"lazy\" />";
        echo $topArtists[0][$i];
        echo "</div>";
    }
    ?>
</div>