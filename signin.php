<?php # Script 12.12 - signin.php #4
// This page processes the signin form submission.
// The script now stores the HTTP_USER_AGENT value for added security.

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Need two helper files:
	require ('includes/signin_functions.inc.php');
	require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
	require ('mysqli_connect.php');
		
	// Check the signin:
	list ($check, $data) = check_signin($dbc, $_POST['email'], $_POST['pass']);
	
	if ($check) { // OK!
		
		// Set the session data:
		session_start();
		$_SESSION['user_id'] = $data['user_id'];
		$_SESSION['username'] = $data['username'];
		$_SESSION['displayName'] = $data['displayName'];
		$_SESSION['pfpURL'] = $data['pfpURL'];
		$_SESSION['isAdmin'] = $data['isAdmin'];
		$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
		$_SESSION['spotifyRefreshToken'] = $data['spotify_refresh_token'];

		// Store the loginDate
		$query = "UPDATE users SET loginDate = NOW() WHERE user_id = " . $_SESSION['user_id']. ""; //! fix this

		// refresh spotify access token as needed
		$session = new SpotifyWebAPI\Session(
			$_ENV['SPOTIFY_CLIENT_ID'],
			$_ENV['SPOTIFY_CLIENT_SECRET'],
			$_ENV['SPOTIFY_REDIRECT_URI']
		);
		if (!isset($_SESSION['spotifyAccessToken'])) {
			header( 'Location: https://' . $_SERVER['HTTP_HOST'] . '/spotify/auth.php');
		} 
		$session->refreshAccessToken($_SESSION['spotifyRefreshToken']);
		$newAccessToken = $session->getAccessToken();
		$_SESSION['spotifyAccessToken'] = $newAccessToken;
		

		// Redirect:
		redirect_user('home.php');
			
	} else { // Unsuccessful!

		// Assign $data to $errors for signin_page.inc.php:
		$errors = $data;

	}
		
	mysqli_close($dbc); // Close the database connection.

} // End of the main submit conditional.

// Create the page:
include ('includes/signin_page.inc.php');
?>