<?php
$page_title = 'Home | RaveRamble';
include('header.php');
$errors = array();
?>

<div class="container-fluid">
    <div class="row">
        <nav id="left-sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="position-sticky">
                <!-- Add the logo and app name here -->
                <div class="text-center mt-3">
                    <img src="/resources/logo.png" alt="RaveRamble Logo" width="100" height="100">
                    <h4 class="mt-2">RaveRamble</h4>
                </div>

                <form class="mt-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
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
                <?php if((isset($_SESSION['user_id']))){ ?>
                <div class="dropdown mt-auto">
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
                <?php } else {?>
                    <a class="btn btn-primary" href="/signin.php" role="button">Sign In</a>
                <a class="btn btn-secondary" href="/register.php" role="button">Register</a>
                <?php } ?>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="col-md-6 ms-sm-auto col-lg-8 px-md-4">
            <?php //include('feed.php');?>
        </main>

        <!-- Right sidebar -->
        <nav id="right-sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="position-sticky">
                <!-- Include the dropdown button at the bottom of the sidebar -->
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">What's Happening Near You</h5>
                        <ul>
                            <li>Event 1: <?php // Get events?></li>
                            <li>Event 2: <?php // Get events?></li>
                            <li>Event 3: <?php // Get events?></li>
                            <li>Event 4: <?php // Get events?></li>
                            <li>Event 5: <?php // Get events?></li>
                            <li>Event 6: <?php // Get events?></li>
                        </ul>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Suggested Community Members  & Artists</h5>
                        <ul>
                            <!-- put some people here. idk -->
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>

<?php include('footer.php'); ?>