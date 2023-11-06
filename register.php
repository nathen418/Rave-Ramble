<?php
// This script performs an INSERT query to add a record to the users table.

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
	<div class="d-flex justify-content-center align-items-center">
		<div class="container py-5">
			<div class="row g-0">
				<!-- <img src="/resources/logo.png" alt="signin form" class="img-fluid align-middle" /> -->
				<div class="col-md-6 col-lg-7 d-flex align-items-center">
					<div class=" register-card card-body p-4 p-lg-5 text-white">
						<form action="register" method="post">
							<div class="d-flex align-items-center mb-3 pb-1">
								<i class="fas fa-cubes fa-2x me-3"></i>
								<span class="h1 fw-bold mb-0">Rave Ramble</span>
							</div>
							<h5 class="fw-normal mb-3 pb-3">Create an account</h5>
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
								<input type="password" name="password1" class="form-control form-control-lg" placeholder="Password" />
							</div>
							<div class=" mb-4">
								<input type="password" name="password2" class="form-control form-control-lg" placeholder="Confirm password" />
							</div>
							<div class="pt-1 mb-4">
								<button class="btn btn-dark btn-lg btn-block" type="submit">Register</button>
							</div>
							<p class="mb-5 pb-lg-2">Already have an account? <a href="../signin.php" style="color: #393f81;">signin</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>


