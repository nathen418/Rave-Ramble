<div class="card">
  <div class="border px-3">
    <div class="p-3 border">
      <h4 class="d-flex mb-0">
        <i class="fas fa-home ps-2"></i> Home
      </h4>
    </div>
    <div>
      <?php if (isset($_SESSION['user_id'])) { ?>
        <div class="card border"> <!-- New post bar -->
          <div class="card-body pb-2">
            <div class="d-flex">
              <img src="<?php echo $row["pfpURL"]; ?>" class="rounded-circle" height="50" alt="Avatar" loading="lazy" />
              <div class="d-flex align-items-center ps-3">
                <div class="w-100">
                  <input type="text" id="newPost" class="form-control border-0 py-1 px-2" placeholder="Ramble to your community" />
                  <input type="text" id="link" class="form-control border-0 py-1 px-2" placeholder="Attach a Spotify or Apple Music link" />
                </div>
              </div>
            </div>
            <button type="button" class="btn btn-primary">Ramble!</button>
          </div>
        </div>
    </div>
  <?php } ?>
  <div>
    <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
      <div class="d-flex p-3"> <!-- Post -->
        <img src="<?php echo $row["pfpURL"]; ?>" class="rounded-circle" height="50" alt="Avatar" loading="lazy" />
        <div class="d-flex ps-3">
          <div>
            <a href="<?php echo "/@" . $row['username']; ?>">
              <h6 class="text-body">
                <?php echo $row['displayName']; ?>
                <span class="small text-muted font-weight-normal"><?php echo "@" . $row['username']; ?></span>
                <span class="small text-muted font-weight-normal"> • </span>
                <span class="small text-muted font-weight-normal"><?php echo $row["post_timestamp"]; ?></span>
                <span><i class="fas fa-angle-down float-end"></i></span>
              </h6>
            </a>
            <p>
              <?php if (!isset($row['post_url'])) {
                echo $row['post_body'];
              } ?>
            </p>
            <?php if (isset($row['post_embed_link'])) {
              $embed_link = $row['post_embed_link'];
              if (str_contains($row['post_embed_link'], "open.spotify.com")) {
                $embed_link = str_replace(".com/", ".com/embed/", $row['post_embed_link']);
              } elseif (str_contains($row['post_embed_link'], "music.apple.com")) {
                $embed_link = str_replace("https://music.apple.com", "https://embed.music.apple.com", $row['post_embed_link']);
              }
            ?>
              <iframe src="<?php echo $embed_link; ?>" width="100%" height="125" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
            <?php } ?>
            <ul class="list-unstyled d-flex justify-content-between">
              <li><i class="far fa-comment"></i><span class="small ps-2"><?php echo $row['post_comments'] ?></span></li>
              <li><i class="far fa-heart"></i><span class="small ps-2"><?php echo $row['post_likes'] ?></span></li>
              <li>
                <a href="<?php echo $row['post_permalink'] ?>"></a><i class="far fa-share-square"></i>
              </li>
            </ul>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>