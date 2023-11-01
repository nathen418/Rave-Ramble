<?php
include('./includes/non_admin_redirect.inc.php');
// Needed imports to make guestbook work
$page_title = "Make a Post | Rave Ramble";
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
        if(filter_var($_POST['post_embed_link'], FILTER_VALIDATE_URL)) {
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
include('header.php');
?>
<br />
<form action="post" method="POST">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-black" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h2 class="fw-bold mb-2 text-uppercase">Post</h2>

                            <div class="form-outline form-white mb-4">
                                <label class="form-label" for="body">Body</label>
                                <input type="post_body" name="post_body" class="form-control form-control-lg" maxlength="512" value="<?php if (isset($_POST['post_body'])) echo $_POST['post_body']; ?>">
                            </div>

                            <div class="form-outline form-white mb-4">
                                <label class="form-label" for="link">Optional content link</label>   <i class="fas fa-info-circle"></i> 
                                <textarea name="post_embed_link" class="form-control form-control-lg"><?php if (isset($_POST['post_embed_link'])) echo $_POST['post_embed_link']; ?></textarea>
                            </div>

                            <button class="btn btn-outline-dark btn-lg px-5" type="submit">Post</button>
                            <?php
                            if ($errors) {
                                echo '<p class="error">The following error(s) occurred:<br />';
                                foreach ($errors as $msg) { // Print each error.
                                    echo " - $msg<br />\n";
                                }
                                echo '</p><p>Please try again.</p><p><br /></p>';

                                mysqli_close($dbc);
                                exit();
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
<?php
include('footer.php');
?>