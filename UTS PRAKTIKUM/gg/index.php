<?php
session_start();
$is_logged_in = isset($_SESSION['username']); // ubah sesuai session loginmu
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />

  <title>GOOD GAME</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css" />
  <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css" />
  <link rel="stylesheet" href="assets/css/owl.css" />
  <link rel="stylesheet" href="assets/css/animate.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!-- Tambahkan ini di dalam tag <head> -->
  <style>
    .modal-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      z-index: 9999; /* Pastikan z-index tinggi */
      justify-content: center;
      align-items: center;
    }
    
    .modal-content {
      background-color: white;
      padding: 25px;
      border-radius: 10px;
      width: 90%;
      max-width: 500px;
      position: relative;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    
    .close-button {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 24px;
      cursor: pointer;
    }
  </style>
  <!--
  

-->
</head>

<body>
  <!-- Payment Modal -->
  <div id="paymentModal" class="modal-overlay">
    <div class="modal-content">
      <span class="close-button">&times;</span>
      <h4 class="mb-3 fw-bold">
        Payment for <span id="modalGameName"></span>
      </h4>
      <p class="mb-4">Total: $<span id="modalGamePrice"></span></p>
      <form action="auth/proses_pembayaran.php" method="POST">
        <input type="text" class="form-control mb-3" name="nama" placeholder="Full Name" required />
        <input type="text" class="form-control mb-3" placeholder="Card Number (xxxx xxxx xxxx xxxx)" name="card_number"
          maxlength="19" required />
        <div class="d-flex gap-2 mb-3">
          <input type="text" class="form-control" placeholder="MM/YY" name="expiry" maxlength="5" required />
          <input type="text" class="form-control" placeholder="CVV" name="cvv" maxlength="4" required />
        </div>
        <input type="email" class="form-control mb-4" placeholder="Email (optional)" name="email" />
        <input type="hidden" name="game_name" id="hiddenGameName" />
        <button type="submit" class="btn btn-success w-100 py-2">
          Pay Now
        </button>
      </form>
    </div>
  </div>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots"></div>
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="index.php" class="active">Home</a></li>
              <li><a href="shop.php">Our Shop</a></li>
              <li><a href="contact.php">Contact Us</a></li>

              <?php
              if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $initial = strtoupper(substr($username, 0, 1));
                ?>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">

                    <!-- Avatar bulat dengan inisial -->
                    <div style="
                    width: 32px;
                    height: 32px;
                    background-color: #ffffff;
                    color: #007bff;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-weight: bold;
                    margin-right: 8px;
                    box-shadow: 0 0 5px rgba(0,0,0,0.1);
                  ">
                      <?= $initial ?>
                    </div>

                    <?= htmlspecialchars($username) ?>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right blur-dropdown" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="logout.php">
                      <span style="position: relative; top: -2px;">Logout</span>
                    </a>
                  </div>
                </li>

                <?php
              } else {
                echo '<li class="nav-item"><a class="nav-link" href="login.php">Sign In</a></li>';
              }
              ?>
            </ul>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
    </ul>
    <a class="menu-trigger">
      <span>Menu</span>
    </a>
    <!-- ***** Menu End ***** -->
    </nav>
    </div>
    </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="caption header-text">
            <h6>Welcome to Good Game</h6>
            <h2>BEST GAMING SITE!</h2>
            <p>
              Good Game is a digital game distribution platform where you can
              discover, download, and enjoy the best PC games — all in one
              place. From indie gems to blockbuster hits, we bring you a
              growing library of games with fast downloads, user reviews, and
              exclusive deals.
            </p>
            <div class="search-input">
              <form id="search" action="#">
                <input type="text" placeholder="Type Something" id="searchText" name="searchKeyword"
                  onkeypress="handle" />
                <button role="button">Search Now</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4 offset-lg-2">
          <div class="right-image">
            <img src="assets/images/banner-image.jpg" alt="" />
            <span class="price">$22</span>
            <span class="offer">-40%</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="assets/images/featured-01.png" alt="" style="max-width: 44px" />
              </div>
              <h4>Fast Download</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="assets/images/featured-02.png" alt="" style="max-width: 44px" />
              </div>
              <h4>Player Community</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="assets/images/featured-03.png" alt="" style="max-width: 44px" />
              </div>
              <h4>24/7 Support</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="assets/images/featured-04.png" alt="" style="max-width: 44px" />
              </div>
              <h4>Attaractive Site</h4>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="section trending">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>Trending</h6>
            <h2>Trending Games</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="shop.php">View All</a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="item">
            <div class="thumb">
              <a href="warframe.php"><img src="assets/images/trending-01.jpg" alt="" /></a>
              <span class="price"><em>$28</em>$20</span>
            </div>
            <div class="down-content">
              <span class="category">Action</span>
              <h4>Warframe</h4>
              <a href="#" 
                class="buy-now" 
                data-game="Warframe"
                data-price="20"
                <?php if (!$is_logged_in) echo 'onclick="alertLogin(event)"'; ?>>
                <i class="fa fa-shopping-bag"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="item">
            <div class="thumb">
              <a href="tof.php"><img src="assets/images/trending-02.jpg" alt="" /></a>
              <span class="price">$44</span>
            </div>
            <div class="down-content">
              <span class="category">Open World Action RPG</span>
              <h4>Tower Of Fantasy</h4>
              <a href="#" 
                class="buy-now" 
                data-game="Tower of Fantasy"
                data-price="44"
                <?php if (!$is_logged_in) echo 'onclick="alertLogin(event)"'; ?>>
                <i class="fa fa-shopping-bag"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="item">
            <div class="thumb">
              <a href="sp.php"><img src="assets/images/trending-03.jpg" alt="" /></a>
              <span class="price"><em>$64</em>$44</span>
            </div>
            <div class="down-content">
              <span class="category">Battle Royale</span>
              <h4>Super People</h4>
              <a href="#" 
                class="buy-now" 
                data-game="Super People"
                data-price="44"
                <?php if (!$is_logged_in) echo 'onclick="alertLogin(event)"'; ?>>
                <i class="fa fa-shopping-bag"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="item">
            <div class="thumb">
              <a href="yugioh.php"><img src="assets/images/trending-04.jpg" alt="" /></a>
              <span class="price">$32</span>
            </div>
            <div class="down-content">
              <span class="category">Card Game</span>
              <h4>Yu-Gi-Oh MD</h4>
              <a href="#" 
                class="buy-now" 
                data-game="Yu-Gi-Oh MD"
                data-price="32"
                <?php if (!$is_logged_in) echo 'onclick="alertLogin(event)"'; ?>>
                <i class="fa fa-shopping-bag"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section most-played">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>TOP GAMES</h6>
            <h2>Most Played</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="shop.php">View All</a>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="item">
            <div class="thumb">
              <a href="warframe.php"><img src="assets/images/top-game-01.jpg" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Adventure</span>
              <h4>Warframe</h4>
              <a href="warframe.php">Explore</a>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="item">
            <div class="thumb">
              <a href="pubg.php"><img src="assets/images/top-game-02.jpg" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Adventure</span>
              <h4>PUBG</h4>
              <a href="pubg.php">Explore</a>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="item">
            <div class="thumb">
              <a href="apex.php"><img src="assets/images/top-game-03.jpg" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Adventure</span>
              <h4>Apex Legends</h4>
              <a href="apex.php">Explore</a>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="item">
            <div class="thumb">
              <a href="thesims.php"><img src="assets/images/top-game-04.jpg" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Adventure</span>
              <h4>The Sims4</h4>
              <a href="thesims.php">Explore</a>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="item">
            <div class="thumb">
              <a href="lostark.php"><img src="assets/images/top-game-05.jpg" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Adventure</span>
              <h4>Lost Ark</h4>
              <a href="lostark.php">Explore</a>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="item">
            <div class="thumb">
              <a href="desnity2.php"><img src="assets/images/top-game-06.jpg" alt="" /></a>
            </div>
            <div class="down-content">
              <span class="category">Adventure</span>
              <h4>Destiny 2</h4>
              <a href="desnity2.php">Explore</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      </div>
    </div>
  </div>
  </div>
  </div>

  <div class="section cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="shop">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h6>Our Shop</h6>
                  <h2>
                    Go Pre-Order Buy & Get Best <em>Prices</em> For You!
                  </h2>
                </div>
                <p>
                  Don’t miss out on exclusive deals for upcoming games!
                  Pre-order today and enjoy special discounts, bonus in-game
                  items, and early access before the official release.
                </p>
                <div class="main-button">
                  <a href="shop.php">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-2 align-self-end">
          <div class="subscribe">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h6>NEWSLETTER</h6>
                  <h2>
                    Give Us Feedback!
                  </h2>
                </div>
                <div class="search-input">
                  <form id="subscribe" action="#">
                    <input type="text" class="form-control" id="messageInput" placeholder="Your Message..." />
                    <button type="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>
          Copyright © 2025 Good Game. All rights reserved. &nbsp;&nbsp;
          <a>RPL</a>
        </p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  document.querySelectorAll(".buy-now").forEach((button) => {
    button.addEventListener("click", function (e) {
      <?php if ($is_logged_in): ?>
        // Jika user sudah login, tampilkan modal pembayaran
        e.preventDefault();
        const gameName = this.getAttribute("data-game");
        const gamePrice = this.getAttribute("data-price");

        document.getElementById("modalGameName").innerText = gameName;
        document.getElementById("modalGamePrice").innerText = gamePrice;
        document.getElementById("hiddenGameName").value = gameName;

        document.getElementById("paymentModal").style.display = "flex";
      <?php else: ?>
        // Jika user belum login, alertLogin akan dipanggil oleh atribut onclick
        // Tidak ada kode tambahan yang diperlukan di sini
      <?php endif; ?>
    });
  });

  // Tutup modal saat tombol X ditekan
  document.querySelector(".close-button").addEventListener("click", function () {
    document.getElementById("paymentModal").style.display = "none";
  });

  // Tutup modal saat klik di luar modal
  window.addEventListener("click", function (e) {
    const modal = document.getElementById("paymentModal");
    if (e.target == modal) {
      modal.style.display = "none";
    }
  });
</script>

<script>
function alertLogin(event) {
  event.preventDefault();
  alert("Silakan login terlebih dahulu untuk membeli game.");
}
</script>

</body>

</html>