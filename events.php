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

                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>

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
            <div id="events-card" class="card-body mt-3" style="border-radius: 10px">
                <div id="search-filter">
                    <h5>Filters</h5>
                    <form>
                        <input type="text" class="form-control" id="event-search" placeholder="Search events...">
                    </form>
                    <h6>Venue Type:</h6>
                    <select id="venue-type-filter">
                        <option value="">All</option>
                        <option value="indoor">Indoor</option>
                        <option value="outdoor">Outdoor</option>
                    </select>
                    <!-- Add more filters for artist, location, price, etc as needed -->
                </div>
            </div>
        </nav>
    </div>
    <div class="col">
        <h5 class="mt-3">Events</h5>
        <div id="event-list">
            <!-- Loop through and display events here -->
            <?php
            $query = "SELECT * FROM events ORDER BY 'event_date' ASC LIMIT 10";
            $result = mysqli_query($dbc, $query);
            $events = mysqli_fetch_all($result, MYSQLI_ASSOC);
            // Replace this with your PHP code to fetch and display events
            foreach ($events as $event) {
                echo "<div id=\"post-card\" class=\"card-body mt-3 mb-3 ms-2 me-2\" style=\"border-radius: 18px;\">";
                echo '<div class="event">
                        <h6>' . $event['event_name'] . '</h6>
                        <p>' . $event['event_date'] . '</p>
                        <p>Venue: ' . $event['event_location'] . '</p>
                        <p>Price: $' . $event['event_price'] . '</p>
                        <a href="' . $event['ticketmaster_link'] . '" target="_blank">Buy Tickets on Ticketmaster</a>
                      </div>';
                echo "</div>";
            }
            ?>
        </div>
    </div>
    <div class="col-1">
        <nav id="right-sidebar" class=" text-dark sidebar sticky-top ms-3 me-2 mt-2">
            <!-- Sample recomended artists -->

            <div class="position-sticky">
                <div id="post-card" class="card-body mt-3" style="border-radius:10px">
                    <p> Global Top Artists: </p>
                    <div class="mb-3">

                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="col-1">
    </div>
</div>
<?php include('footer.php'); ?>