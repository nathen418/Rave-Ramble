<?php
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Register | bLog';
include('header.php');
$errors = array();
?>
<form action="register" method="post">
	<?php
	// Check for form submission:
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		require('mysqli_connect.php'); // Connect to the db.

		// Check for a first name:
		if (empty($_POST['first_name'])) {
			$errors[] = 'You forgot to enter your first name.';
		} else {
			$fname = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
		}

		// Check for a last name:
		if (empty($_POST['last_name'])) {
			$errors[] = 'You forgot to enter your last name.';
		} else {
			$lname = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
		}

		// Check for an email address:
		if (empty($_POST['email'])) {
			$errors[] = 'You forgot to enter your email address.';
		} else {
			$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
		}

		// Check for a password and match against the confirmed password:
		if (!empty($_POST['pass1'])) {
			if ($_POST['pass1'] != $_POST['pass2']) {
				$errors[] = 'Your password\'s do not match.';
			} else {
				$p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
			}
		} else {
			$errors[] = 'You forgot to enter your password.';
		}

		if (empty($errors)) {
			// Register the user in the database...

			// Make the query:
			$query = "INSERT INTO users (first_name, last_name, email, pass) VALUES ('$fname', '$lname', '$email', SHA2('$p',256))";
			$result = @mysqli_query($dbc, $query); // Run the query.
			if ($result) { // If it ran OK.
				mysqli_close($dbc); // Close the database connection.
				$fname = '';
				$lname = '';
				$email = '';
				$p = '';
	?>
				<div class="alert alert-success text-center">
					<p>Account has been created, you can now log in!
				</div>
	<?php
			}
		}
	}
	?>
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

							<h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Create an account</h5>

							<div class="form-outline mb-4">
								<input type="text" name="displayName" class="form-control form-control-lg" placeholder="Display Name" value="<?php if (isset($displayName)) echo stripcslashes($displayName); ?>" />
							</div>

							<div class="form-outline mb-4">
								<input type="text" name="username" class="form-control form-control-lg" placeholder="Username" value="<?php if (isset($username)) echo stripcslashes($username); ?>" />
							</div>

							<div class="form-outline mb-4">
								<input type="email" name="email" class="form-control form-control-lg" placeholder="Email address" value="<?php if (isset($email)) echo stripcslashes($email); ?>" />
							</div>

							<div class="form-outline mb-4">
								<input type="password" name="password1" class="form-control form-control-lg" placeholder="Password" />
							</div>

							<div class="form-outline mb-4">
								<input type="password" name="password2" class="form-control form-control-lg" placeholder="Confirm password" />
							</div>

							<div class="pt-1 mb-4">
								<button class="btn btn-dark btn-lg btn-block" type="submit">Register</button>
							</div>

							<p class="mb-5 pb-lg-2" style="color: #393f81;">Already have an account? <a href="../login.php" style="color: #393f81;">Login</a></p>
							<a href="../terms.php" class="small text-muted">Terms of use.</a>
							<a href="../privacy.php" class="small text-muted">Privacy policy</a>
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
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<?php include('footer.php'); ?>