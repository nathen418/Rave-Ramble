<div id="post-card" class="card-body mt-3 mb-3 ms-2 me-2" style="border-radius: 18px;">
    <div style="display: flex; align-items: center;">
        <img src="<?php echo $row["pfpURL"]; ?>" class="rounded-circle" height="50" alt="Avatar" loading="lazy" />
        <div style="margin-left: 10px;">
            <a class="username" href="<?php echo "/@" . $row['username']; ?>">
                <h6>
                    <?php echo $row['displayName']; ?>
                </h6>
                <span class="small font-weight-normal"><?php echo "@" . $row['username']; ?></span>
                <span class="small font-weight-normal"><?php 
                $timeSince = strtotime($row["post_timestamp"]) - strtotime(date("Y-m-d H:i:s"));
                echo $timeSince;
                ?></span>
            </a>
        </div>
    </div>
    <p class="mt-3"style="line-height: 1.2;">
        <?php if (!isset($row['post_url'])) {
            echo $row['post_body'];
        } ?>
    </p>
    <?php if ((isset($row['post_embed_link']))) { ?>
        <?php
        $embed_link = $row['post_embed_link'];
        if (str_contains($row['post_embed_link'], "open.spotify.com")) {
            $embed_link = str_replace(".com/", ".com/embed/", $row['post_embed_link']);
        } elseif (str_contains($row['post_embed_link'], "music.apple.com")) {
            $embed_link = str_replace("https://music.apple.com", "https://embed.music.apple.com", $row['post_embed_link']);
        }
        ?>
        <iframe id= "iframe" style="border-radius:12px" src="<?php echo $embed_link; ?>" width="70%" height="90" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
    <?php } ?>
    <ul class="list-unstyled d-flex justify-content-between mb-0">
        <li><i class="far fa-comment"></i><span class="small ps-2"><?php echo $row['post_comments'] ?></span></li>
        <li><i class="far fa-heart"></i><span class="small ps-2"><?php echo $row['post_likes'] ?></span></li>
        <li>
            <a href="<?php echo $row['post_permalink'] ?>"></a><i class="far fa-share-square"></i>
        </li>
    </ul>
</div>