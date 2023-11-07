<?php
// This script performs an INSERT query to add a record to the users table.
session_start(); // Start the session.
if (isset($_SESSION['user_id'])) {	
	// Need the functions:
	require ('includes/signin_functions.inc.php');
	redirect_user();	
}

$page_title = 'Register | Rave Ramble';
include('header.php');
$errors = array();
?>
<form action="register" method="post">
	<?php
	// Check for form submission:
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		require('mysqli_connect.php'); // Connect to the db.

		// Check for a first name:
		if (empty($_POST['displayName'])) {
			$errors[] = 'You forgot to enter your display name.';
		} else {
			$displayName = mysqli_real_escape_string($dbc, trim($_POST['displayName']));
		}

		// Check for a last name:
		if (empty($_POST['username'])) {
			$errors[] = 'You forgot to enter your username.';
		} else {
			$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
		}

		// Check for an email address:
		if (empty($_POST['email'])) {
			$errors[] = 'You forgot to enter your email address.';
		} else {
			$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
		}

		// Check for a password and match against the confirmed password:
		if (!empty($_POST['password1'])) {
			if ($_POST['password1'] != $_POST['password2']) {
				$errors[] = 'Your password\'s do not match.';
			} else {
				$p = mysqli_real_escape_string($dbc, trim($_POST['password1']));
			}
		} else {
			$errors[] = 'You forgot to enter your password.';
		}

		// check if email or username already exists
		$query = "SELECT * FROM users WHERE email='$email' OR username='$username'";
		$result = @mysqli_query($dbc, $query);
		if (mysqli_num_rows($result) > 0) {
			$errors[] = 'Email or username already exists.';
		}

		if (empty($errors)) {
			// Register the user in the database...

			// Make the query:
			$query = "INSERT INTO users (displayName, username, email, pass) VALUES ('$displayName', '$username', '$email', SHA2('$p',256))";
			$result = @mysqli_query($dbc, $query); // Run the query.
			if ($result) { // If it ran OK.
				mysqli_close($dbc); // Close the database connection.
				$displayName = '';
				$username = '';
				$email = '';
				$p = '';
	?>
				<div class="alert alert-success text-center alert-position">
					<p>Account has been created, you can now log in!
				</div>
	<?php
			}
		}
		// Print any error messages, if they exist:
		if (isset($errors) && !empty($errors)) {
			echo '<div class="alert alert-danger text-center alert-position">';
			foreach ($errors as $msg) {
				echo " - $msg<br />\n";
			}
			echo '</div>';
		}
	}
	?>

</form>
<form action="register" method="post">
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">

        <div class="container py-5">
            <!-- create 2 columns. one has the logo centered left, and the right column has the signin prompt -->
            <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="/resources/logo.png" alt="signin form" class="img-fluid align-middle" style="border-radius: 1rem 0 0 1rem;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div id="signin-card" class="card-body p-4 p-lg-5">

                        <form action="signin" method="post">

                            <div class="d-flex align-items-center mb-3 pb-1">
                                <span class="h1 fw-bold mb-0">Rave Ramble</span>
                            </div>

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register for an account:</h5>

							<div class="mb-4">
								<input type="text" name="displayName" class="form-control form-control-lg" placeholder="Display Name" value="<?php if (isset($displayName)) echo stripcslashes($displayName); ?>" />
							</div>
							<div class=" mb-4">
								<input type="text" name="username" class="form-control form-control-lg" placeholder="Username" value="<?php if (isset($username)) echo stripcslashes($username); ?>" />
							</div>
							<div class=" mb-4">
								<input type="email" name="email" class="form-control form-control-lg" placeholder="Email address" value="<?php if (isset($email)) echo stripcslashes($email); ?>" />
							</div>
							<div class=" mb-4"> 
								<input type="pfp" name="pfp" class="form-control form-control-lg" placeholder="Profile Picture link" value="<?php if (isset($pfp)) echo stripcslashes($pfp); ?>" />
							</div>
							<div class=" mb-4">
								<input type="password" name="password1" class="form-control form-control-lg" placeholder="Password" />
							</div>
							<div class=" mb-4">
								<input type="password" name="password2" class="form-control form-control-lg" placeholder="Confirm password" />
							</div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
                            </div>

                            <p class="small text-muted">Already have an account? <a href="../signin.php" style="color: #393f81;">Sign In here</a></p>
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


