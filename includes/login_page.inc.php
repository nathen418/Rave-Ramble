<?php # Script 12.1 - login_page.inc.php
// This page prints any errors associated with logging in
// and it creates the entire login page, including the form.

// Include the header:
$page_title = 'Login | bLog';
include('header.php');
?>

<!-- Login form -->
<form action="login" method="post">
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">

        <div class=" container py-5">
            <!-- create 2 columns. one has the logo centered left, and the right column has the login prompt -->
            <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="/resources/logo.png" alt="login form" class="img-fluid align-middle" style="border-radius: 1rem 0 0 1rem;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <form>

                            <div class="d-flex align-items-center mb-3 pb-1">
                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                <span class="h1 fw-bold mb-0">Rave Ramble</span>
                            </div>

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                            <div class="form-outline mb-4">
                                <input type="email" id="form2Example17" class="form-control form-control-lg" placeholder="Email address" />
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="form2Example27" class="form-control form-control-lg" placeholder="Password" />
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                            </div>

                            <a class="small text-muted" href="../resetpassword.php">Forgot password?</a>
                            <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="../register.php" style="color: #393f81;">Register here</a></p>
                            <?php
                            // Print any error messages, if they exist:
                            if (isset($errors) && !empty($errors)) {
                                echo '<h5>Error!</h5>
                                    <p class="error">The following error(s) occurred:<br />';
                                foreach ($errors as $msg) {
                                    echo " - $msg<br />\n";
                                }
                            }
                            ?>
                            <a href="terms.php" class="small text-muted">Terms of use.</a>
                            <a href="privacy.php" class="small text-muted">Privacy policy</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php include('footer.php'); ?>
