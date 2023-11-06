<?php
require('./spotify/app.php');
include('header.php');
$page_title = 'Home | RaveRamble';
require('mysqli_connect.php');
$errors = array();
?>


<div class="row">
    <div class="col-1">
    </div>
    <div class="col-3">
        <nav id="left-sidebar" class="ps-2 bg-black sidebar text-light sticky-top ms-5 mt-2 me-3">
            <div id="home-card" class="card-body mt-3">
                <div class="position-sticky ">
                    <div class="text-center">
                        <img src="/resources/logo.png" alt="RaveRamble Logo" width="100" height="100">
                        <h4>RaveRamble</h4>
                    </div>

                    <img src="<?php echo $_SESSION["pfpURL"]; ?>" class="rounded-circle" height="50" alt="Avatar" loading="lazy" />
                    <div style="margin-left: 10px;">
                        <a class="username" href="<?php echo "/@" . $_SESSION['username']; ?>">
                            <h6>
                                <?php echo $_SESSION['displayName']; ?>
                            </h6>
                            <span class="small font-weight-normal"><?php echo "@" . $_SESSION['username']; ?></span>
                        </a>
                    </div>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="#">
                                <i class="fas fa-house"></i>
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-magnifying-glass"></i>
                                Explore
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-headphones-simple"></i>
                                Listening Activity
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-users"></i>
                                Community
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-location-dot"></i>
                                Nearby Concerts & Shows
                            </a>
                        </li>
                    </ul>
                    <!-- Include the dropdown button at the bottom of the sidebar. show only if logged in-->
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <div class=" dropdown mt-auto">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- Fix the dropdown and pin to bottom of navbar -->
                                <i class="fa-solid fa-gear"></i>
                                Your Profile
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <a class="btn btn-primary" href="/signin.php" role="button">Sign In</a>
                        <a class="btn btn-secondary" href="/register.php" role="button">Register</a>
                    <?php } ?>
                </div>
            </div>
            <div id="suggested-follow-card" class="card-body mt-3" style="border-radius: 10px">
                    <h5 class="card-title">Events Coming Up:</h5>
                    <ul>
                        <li>Person 1: <?php ?></li>
                        <li>Person 2: <?php ?></li>
                        <li>Person 3: <?php ?></li>
                        <li>Person 4: <?php ?></li>
                        <li>Person 5: <?php ?></li>
                        <li>Person 6: <?php ?></li>

                    </ul>
                </div>
        </nav>
    </div>
    <div class="col">
        <?php
        if ((isset($_SESSION['user_id']) && $_SESSION['username'] === trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/@'))) {
            include('postbox.php');
        } ?>
        <?php
        // Get feed from database
        $username = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/@');
        $query = "SELECT * FROM posts JOIN users ON posts.user_id = users.user_id WHERE users.username = '$username' ORDER BY post_timestamp DESC";
        $result = mysqli_query($dbc, $query);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        ?>
            <div id="post-card" class="card-body mt-3 mb-3 ms-2 me-2" style="border-radius: 18px;">
                <div style="display: flex; align-items: center;">
                    <img src="<?php echo $row["pfpURL"]; ?>" class="rounded-circle" height="50" alt="Avatar" loading="lazy" />
                    <div style="margin-left: 10px;">
                        <a class="username" href="<?php echo "/@" . $row['username']; ?>">
                            <h6>
                                <?php echo $row['displayName']; ?>
                            </h6>
                            <span class="small font-weight-normal"><?php echo "@" . $row['username']; ?></span>
                            <span class="small font-weight-normal"><?php
                                                                    $timeSince = strtotime($row["post_timestamp"]) - strtotime(date("Y-m-d H:i:s"));
                                                                    echo $timeSince;
                                                                    ?></span>
                        </a>
                    </div>
                </div>
                <p class="mt-3" style="line-height: 1.2;">
                    <?php if (!isset($row['post_url'])) {
                        echo $row['post_body'];
                    } ?>
                </p>
                <?php if ((isset($row['post_embed_link']))) { ?>
                    <?php
                    $embed_link = $row['post_embed_link'];
                    if (str_contains($row['post_embed_link'], "open.spotify.com")) {
                        $embed_link = str_replace(".com/", ".com/embed/", $row['post_embed_link']);
                    } elseif (str_contains($row['post_embed_link'], "music.apple.com")) {
                        $embed_link = str_replace("https://music.apple.com", "https://embed.music.apple.com", $row['post_embed_link']);
                    }
                    ?>
                    <iframe id="iframe" style="border-radius:12px" src="<?php echo $embed_link; ?>" width="70%" height="90" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                <?php } ?>
                <ul class="list-unstyled d-flex justify-content-between mb-0">
                    <li><i class="far fa-comment"></i><span class="small ps-2"><?php echo $row['post_comments'] ?></span></li>
                    <li><i class="far fa-heart"></i><span class="small ps-2"><?php echo $row['post_likes'] ?></span></li>
                    <li>
                        <a href="<?php echo $row['post_permalink'] ?>"></a><i class="far fa-share-square"></i>
                    </li>
                </ul>
            </div>
        <?php } ?>

    </div>
    <div class="col-3">
        <nav id="right-sidebar" class=" text-dark sidebar sticky-top ms-3 me-2 mt-2">
            <div class="position-sticky">
                <?php if ((isset($_SESSION['user_id']))) {
                    include('pfpstatsbox.php');
                } ?>
                <div id="events-card" class="card-body mt-3" style="border-radius: 10px">
                    <h5 class="card-title">What's Happening Near You</h5>
                    <ul>
                        <li>Event 1: <?php // Get events
                                        ?></li>
                        <li>Event 2: <?php // Get events
                                        ?></li>
                        <li>Event 3: <?php // Get events
                                        ?></li>
                        <li>Event 4: <?php // Get events
                                        ?></li>
                        <li>Event 5: <?php // Get events
                                        ?></li>
                        <li>Event 6: <?php // Get events
                                        ?></li>
                    </ul>
                </div>
                <div id="suggested-follow-card" class="card-body mt-3" style="border-radius: 10px">
                    <h5 class="card-title">Suggested Community Members & Artists</h5>
                    <ul>
                        <li>Person 1: <?php ?></li>
                        <li>Person 2: <?php ?></li>
                        <li>Person 3: <?php ?></li>
                        <li>Person 4: <?php ?></li>
                        <li>Person 5: <?php ?></li>
                        <li>Person 6: <?php ?></li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="col-1">
    </div>
</div>
<?php include('footer.php'); ?>