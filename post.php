<?php
	require ('includes/signin_functions.inc.php');

session_start();
$errors = array();
// Check for form submission:

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require('mysqli_connect.php'); // Connect to the db.

    // Check for a title:
    if (empty($_POST['post_body'])) {
        $errors[] = 'You forgot to enter a body for your post.';
    } else {
        $post_body = mysqli_real_escape_string($dbc, trim($_POST['post_body']));
    }
    if (isset($_POST['post_embed_link'])) {
        if (filter_var($_POST['post_embed_link'], FILTER_VALIDATE_URL)) {
            $post_embed_link = mysqli_real_escape_string($dbc, trim($_POST['post_embed_link']));
        } else {
            $errors[] = 'You entered an invalid link.';
        }
    }
    if (empty($errors)) {
        $user_id = $_SESSION['user_id'];
        $post_body = mysqli_real_escape_string($dbc, trim($_POST['post_body']));
        $query = "INSERT INTO posts (user_id, post_body, post_embed_link, post_permalink ) VALUES ('$user_id', '$post_body', '$post_embed_link', md5('$post_body'))";
        mysqli_query($dbc, $query);


        redirect_user();
    }
}
