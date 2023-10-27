<?php # Script 9.6 - view_users.php #2
// This script retrieves all the records from the users table.

// Page header:
require ('mysqli_connect.php'); // Connect to the db.
		
// Make the query:
// add email to the query
$query = "SELECT CONCAT(last_name, ', ', first_name) AS name, email, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr FROM users ORDER BY registration_date ASC";		
$result = @mysqli_query ($dbc, $query); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($result);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
	echo "<p>There are currently $num registered users.</p>\n";

	// Table header.
	echo '<table class="text-white" cellspacing="3" cellpadding="3" width="100%">
	<tr><td align="left"><b>Name</b></td><td align="left"><b>Email</b></td><td align="left"><b>Date Registered</b></td></tr>';
	
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo '<tr><td align="left">' . $row['name'] . '</td><td align="left">' . $row['email'] . '</td><td align="left">' . $row['dr'] . '</td></tr>
		';
	}

	echo '</table>'; // Close the table.
	
	mysqli_free_result ($result); // Free up the resources.	

} else { // If no records were returned.

	echo '<p class="error">There are currently no registered users.</p>';

}

mysqli_close($dbc); // Close the database connection.

include ('footer.php');
?>