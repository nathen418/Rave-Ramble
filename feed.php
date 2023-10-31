<div class="card" style="">
  <div class="border border-left border-right px-0">
    <div class="p-3 border-bottom">
      <h4 class="d-flex align-items-center mb-0">
        <i class="fas fa-home ps-2"></i> Home
      </h4>
    </div>
    <div>
      <?php if ((isset($_SESSION['user_id']))) { ?>
        <div class="card shadow-0"> <!-- New post bar -->
          <div class="card-body border-bottom pb-2">
            <div class="d-flex">
              <img src="<?php echo $row["pfpURL"]; ?>" class="rounded-circle" height="50" alt="Avatar" loading="lazy" />
              <div class="d-flex align-items-center w-100 ps-3">
                <div class="w-100">
                  <input type="text" id="newPost" class="form-control form-status border-0 py-1 px-0" placeholder="Ramble to your community" />
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <ul class="list-unstyled d-flex flex-row ps-3 pt-3" style="margin-left: 50px;">
                <li>
                  <a href=""><i class="far fa-image pe-2"></i></a>
                </li>
                <li>
                  <a href=""><i class="fas fa-photo-video px-2"></i></a>
                </li>
                <li>
                  <a href=""><i class="fas fa-chart-bar px-2"></i></a>
                </li>
                <li>
                  <a href=""><i class="far fa-smile px-2"></i></a>
                </li>
                <li>
                  <a href=""><i class="far fa-calendar-check px-2"></i></a>
                </li>
              </ul>
              <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary btn-rounded">Ramble!</button>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <div>
        <div class="d-flex p-3 border-bottom"> <!-- Post -->
          <img src="<?php echo $row["pfpURL"]; ?>" class="rounded-circle" height="50" alt="Avatar" loading="lazy" />
          <div class="d-flex w-100 ps-3">
            <div>
              <a href="">
                <h6 class="text-body">
                  <?php echo $row['displayName']; ?>
                  <span class="small text-muted font-weight-normal"><?php echo "@" + $row['username']; ?></span>
                  <span class="small text-muted font-weight-normal"> • </span>
                  <span class="small text-muted font-weight-normal"><?php echo $row["post_timestamp"]; //! make this display the time delta
                                                                    ?></span>
                  <span><i class="fas fa-angle-down float-end"></i></span>
                </h6>
              </a>
              <p style="line-height: 1.2;">
                This is by far the best app ever made!
              </p>
              <ul class="list-unstyled d-flex justify-content-between mb-0 pe-xl-5">
                <li>
                  <i class="far fa-comment"></i>
                </li>
                <li><i class="fas fa-retweet"></i><span class="small ps-2">7</span></li>
                <li><i class="far fa-heart"></i><span class="small ps-2">35</span></li>
                <li>
                  <i class="far fa-share-square"></i>
                </li>
                <?php
                if (isset($_SESSION['user_id']) && $_SESSION['is_admin'] == 1) {
                ?>
                  <!-- Edit and Delete buttons for each posts if admin -->
                  <a href=<?php echo "update.php?id=" . $row['blogpost_id']; ?> class="btn btn-warning">Edit</a>
                  <a href=<?php echo "delete.php?id=" . $row['blogpost_id']; ?> class="btn btn-danger">Delete</a>
                <?php
                }
                ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="d-flex p-3 border-bottom">
          <img src="/resources/jay.png" class="rounded-circle" height="50" alt="Avatar" loading="lazy" />
          <div class="d-flex w-100 ps-3">
            <div>
              <a href="#">
                <h6 class="text-body">
                  Prof J
                  <span class="small text-muted font-weight-normal">@professorj</span>
                  <span class="small text-muted font-weight-normal"> • </span>
                  <span class="small text-muted font-weight-normal">3h</span>
                  <span><i class="fas fa-angle-down float-end"></i></span>
                </h6>
              </a>
              <p style="line-height: 1.2;">
                Hey guys I found this cool playlist made by the one and only Nate. It's so good!
              </p>
              <div class="card border mb-3 shadow-0" style="max-width: 40vw;">
                <div class="row g-0"> <a href="https://open.spotify.com/playlist/2qMMAmcFYW5UkY6nTLKFl2?si=8a3f25dcc9cd49ce">
                    <div class="col-md-3">
                      <img src="https://i.scdn.co/image/ab67706c0000da84a69a08c78a75911fa220055a" alt="Avatar" class="img-fluid rounded-left" />
                    </div>
                    <div class="col-md-9">
                      <div class="card-body">
                        <p class="card-text" style="line-height: 1;">
                          DnB so filthy it attracts roaches
                        </p>
                        <p class="card-text small mb-0" style="line-height: 1.2;">
                          Boom
                        </p>
                        <p class="card-text small mb-0" style="line-height: 1.2;">
                          <i class="fas fa-link fa-xs pe-1"></i>spotify.com
                        </p>
                      </div>
                    </div>
                </div>
                </a>
              </div>
              <ul class="list-unstyled d-flex justify-content-between mb-0 pe-xl-5">
                <li>
                  <i class="far fa-comment"></i>
                </li>
                <li><i class="fas fa-retweet"></i><span class="small ps-2">51</span></li>
                <li><i class="far fa-heart"></i><span class="small ps-2">185</span></li>
                <li>
                  <i class="far fa-share-square"></i>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>