<?php # Script 12.1 - login_page.inc.php
// This page prints any errors associated with logging in
// and it creates the entire login page, including the form.

// Include the header:
$page_title = 'Home | Rave Ramble';
include('header.php');
?>

<div class="card" style="width: 48rem">
  <div class="border border-left border-right px-0">
    <div class="p-3 border-bottom">
      <h4 class="d-flex align-items-center mb-0">
        Home <i class="far fa-xs fa-star ms-auto text-primary"></i>
      </h4>
    </div>
    <div>
      <div class="card shadow-0">
        <div class="card-body border-bottom pb-2">
          <div class="d-flex">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (31).webp" class="rounded-circle"
              height="50" alt="Avatar" loading="lazy" />
            <div class="d-flex align-items-center w-100 ps-3">
              <div class="w-100">
                <input type="text" id="form143" class="form-control form-status border-0 py-1 px-0"
                  placeholder="What's happening" />
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
              <button type="button" class="btn btn-primary btn-rounded">Tweet</button>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="d-flex p-3 border-bottom">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (29).webp" class="rounded-circle"
            height="50" alt="Avatar" loading="lazy" />
          <div class="d-flex w-100 ps-3">
            <div>
              <a href="">
                <h6 class="text-body">
                  Miley Cyrus
                  <span class="small text-muted font-weight-normal">@mileycyrus</span>
                  <span class="small text-muted font-weight-normal"> • </span>
                  <span class="small text-muted font-weight-normal">2h</span>
                  <span><i class="fas fa-angle-down float-end"></i></span>
                </h6>
              </a>
              <p style="line-height: 1.2;">
                Lorem ipsum dolor, sit amet <a href="">#consectetur</a> adipisicing elit.
                Nobis assumenda eveniet ipsum libero mollitia vero doloremque
                <a href="">#perspiciatis</a> molestiae omnis, quam iure dicta reprehenderit
                distinctio facere labore atque, sit <a href="">#ratione</a> quo.
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
              </ul>
            </div>
          </div>
        </div>
        <div class="d-flex p-3 border-bottom">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (29).webp" class="rounded-circle"
            height="50" alt="Avatar" loading="lazy" />
          <div class="d-flex w-100 ps-3">
            <div>
              <a href="#">
                <h6 class="text-body">
                  Miley Cyrus
                  <span class="small text-muted font-weight-normal">@mileycyrus</span>
                  <span class="small text-muted font-weight-normal"> • </span>
                  <span class="small text-muted font-weight-normal">3h</span>
                  <span><i class="fas fa-angle-down float-end"></i></span>
                </h6>
              </a>
              <p style="line-height: 1.2;">
                Nobis assumenda eveniet ipsum libero mollitia vero doloremque molestiae
                reprehenderit.
              </p>
              <div class="card border mb-3 shadow-0" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-3">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (21).webp" alt="Avatar"
                      class="img-fluid rounded-left" />
                  </div>
                  <div class="col-md-9">
                    <div class="card-body">
                      <p class="card-text" style="line-height: 1;">
                        Title of the news
                      </p>
                      <p class="card-text small mb-0" style="line-height: 1.2;">
                        This is a wider card with supporting text below as a natural lead-in
                        to additional content.
                      </p>
                      <p class="card-text small mb-0" style="line-height: 1.2;">
                        <i class="fas fa-link fa-xs pe-1"></i>example.pl
                      </p>
                    </div>
                  </div>
                </div>
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
        <div class="d-flex p-3 border-bottom">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (22).webp" class="rounded-circle"
            height="50" alt="Avatar" loading="lazy" />
          <div class="d-flex w-100 ps-3">
            <div>
              <a href="#">
                <h6 class="text-body">
                  Bob Marley
                  <span class="small text-muted font-weight-normal">@bobmarley</span>
                  <span class="small text-muted font-weight-normal"> • </span>
                  <span class="small text-muted font-weight-normal">5h</span>
                  <span><i class="fas fa-angle-down float-end"></i></span>
                </h6>
              </a>
              <p style="line-height: 1.2;">
                Lorem ipsum dolor, sit amet <a href="">#consectetur</a> adipisicing elit.
                Officiis, <a href="">#repellat</a>. Error cumque temporibus eum pariatur
                ducimus facere? Obcaecati fugit, nobis eos <a href="">#deserunt</a> odit
                libero voluptatibus, iste laudantium, tempore ratione ut.
              </p>
              <div class="card border mb-3 shadow-0" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-3">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (20).webp" alt="Avatar"
                      class="img-fluid rounded-left" />
                  </div>
                  <div class="col-md-9">
                    <div class="card-body">
                      <p class="card-text" style="line-height: 1;">
                        Title of the news
                      </p>
                      <p class="card-text small mb-0" style="line-height: 1.2;">
                        This is a wider card with supporting text below as a natural lead-in
                        to additional content.
                      </p>
                      <p class="card-text small mb-0" style="line-height: 1.2;">
                        <i class="fas fa-link fa-xs pe-1"></i>example.pl
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <ul class="list-unstyled d-flex justify-content-between mb-0 pe-xl-5">
                <li>
                  <i class="far fa-comment"></i>
                </li>
                <li><i class="fas fa-retweet"></i><span class="small ps-2">8</span></li>
                <li><i class="far fa-heart"></i><span class="small ps-2">97</span></li>
                <li>
                  <i class="far fa-share-square"></i>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="d-flex p-3 border-bottom">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (24).webp" class="rounded-circle"
            height="50" alt="Avatar" loading="lazy" />
          <div class="d-flex w-100 ps-3">
            <div>
              <a href="">
                <h6 class="text-body">
                  Anna Doe
                  <span class="small text-muted font-weight-normal">@annadoe</span>
                  <span class="small text-muted font-weight-normal"> • </span>
                  <span class="small text-muted font-weight-normal">7h</span>
                  <span><i class="fas fa-angle-down float-end"></i></span>
                </h6>
              </a>
              <p style="line-height: 1.2;">
                Error cumque temporibus eum pariatur ducimus facere? Obcaecati fugit, nobis
                eos <a href="">#deserunt</a> odit libero voluptatibus, iste laudantium,
                tempore ratione ut.
              </p>
              <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp"
                class="img-fluid rounded mb-3" alt="Fissure in Sandstone" />
              <ul class="list-unstyled d-flex justify-content-between mb-0 pe-xl-5">
                <li>
                  <i class="far fa-comment"></i>
                </li>
                <li><i class="fas fa-retweet"></i><span class="small ps-2">11</span></li>
                <li><i class="far fa-heart"></i><span class="small ps-2">65</span></li>
                <li>
                  <i class="far fa-share-square"></i>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="d-flex p-3 border-bottom mb-5">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (3).webp" class="rounded-circle"
            height="50" alt="Avatar" loading="lazy" />
          <div class="d-flex w-100 ps-3">
            <div>
              <a href="">
                <h6 class="text-body">
                  Mark Twain
                  <span class="small text-muted font-weight-normal">@marktawin</span>
                  <span class="small text-muted font-weight-normal"> • </span>
                  <span class="small text-muted font-weight-normal">10h</span>
                  <span><i class="fas fa-angle-down float-end"></i></span>
                </h6>
              </a>
              <p style="line-height: 1.2;">
                Obcaecati fugit, nobis eos odit libero voluptatibus, iste laudantium,
                tempore ratione ut.
              </p>
              <div class="ratio ratio-16x9 mb-3">
                <iframe src="https://www.youtube.com/embed/vlDzYIIOYmM" title="YouTube video"
                  allowfullscreen></iframe>
              </div>
              <ul class="list-unstyled d-flex justify-content-between mb-0 pe-xl-5">
                <li>
                  <i class="far fa-comment"></i>
                </li>
                <li><i class="fas fa-retweet"></i><span class="small ps-2">34</span></li>
                <li><i class="far fa-heart"></i><span class="small ps-2">159</span></li>
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