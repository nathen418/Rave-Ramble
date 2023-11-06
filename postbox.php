<div id="ramble-card" class="card-body mt-3">
    <div class="mb-3" style="display: flex; align-items: center;">
        <img src="<?php echo $_SESSION["pfpURL"]; ?>" class="rounded-circle" height="50" alt="Avatar" loading="lazy" />
        <div style="margin-left: 10px;">
            <a class="username" href="<?php echo "/@" . $_SESSION['username']; ?>">
                <h6>
                    <?php echo $_SESSION['displayName']; ?>
                </h6>
                <span class="small font-weight-normal"><?php echo "@" . $_SESSION['username']; ?></span>
            </a>
        </div>
    </div>
    <form action="post.php/" method="post">
        <input name="post_body" class="form-control" id="post_body" placeholder="Ramble about it!">
        <div class="mt-3 mb-3">
            <textarea name="post_embed_link" class="form-control" id="post_embed_link" placeholder="Attach a Spotify or Apple Music link here." rows="3"><?php if (isset($_POST['post_embed_link'])) echo $_POST['post_embed_link']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-rounded">Ramble!</button>
    </form>
</div>