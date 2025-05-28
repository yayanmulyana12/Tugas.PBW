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

  <title>Lugx Gaming - Shop Page</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css" />
  <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css" />
  <link rel="stylesheet" href="assets/css/owl.css" />
  <link rel="stylesheet" href="assets/css/animate.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
 
</head>

<body>
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
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
              <li><a href="index.php">Home</a></li>
              <li><a href="shop.php">Our Shop</a></li>
              <li><a href="contact.php">Contact Us</a></li>

              <?php
              if ($is_logged_in) {
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
              <?php } else { ?>
                <li><a href="login.php">Sign In</a></li>
              <?php } ?>
            </ul>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Our Shop</h3>
          <span class="breadcrumb"><a href="#">Home</a> > Our Shop</span>
        </div>
      </div>
    </div>
  </div>

  <div class="section trending">
    <div class="container">
      <ul class="trending-filter">
        <li>
          <a class="is_active" href="#!" data-filter="*">Show All</a>
        </li>
        <li>
          <a href="#!" data-filter=".adv">Action</a>
        </li>
        <li>
          <a href="#!" data-filter=".str">Battle Royal</a>
        </li>
        <li>
          <a href="#!" data-filter=".rac">Advanture</a>
        </li>
        <li>
          <a href="#!" data-filter=".rac">Platform fighter</a>
        </li>
        <li>
          <a href="#!" data-filter=".rac">Action RPG</a>
        </li>
      </ul>
      <div class="row trending-box">
        <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv">
          <div class="item">
            <div class="thumb">
              <a href="warframe.php"><img src="assets/images/trending-01.jpg" alt="" /></a>
              <span class="price"><em>$28</em>$20</span>
            </div>
            <div class="down-content">
              <span class="category">Action</span>
              <h4>warframe</h4>
              <a href="warframe.php"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 str">
          <div class="item">
            <div class="thumb">
              <a href="tof.php"><img src="assets/images/trending-02.jpg" alt="" /></a>
              <span class="price">$44</span>
            </div>
            <div class="down-content">
              <span class="category">Action RPG</span>
              <h4>Tower Of Fantasy</h4>
              <a href="tof.php"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv rac">
          <div class="item">
            <div class="thumb">
              <a href="sp.php"><img src="assets/images/trending-03.jpg" alt="" /></a>
              <span class="price"><em>$45</em>$30</span>
            </div>
            <div class="down-content">
              <span class="category">Battle Royal</span>
              <h4>Super People</h4>
              <a href="sp.php"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 str">
          <div class="item">
            <div class="thumb">
              <a href="yugioh.php"><img src="assets/images/trending-04.jpg" alt="" /></a>
              <span class="price"><em>$32</em>$22</span>
            </div>
            <div class="down-content">
              <span class="category">Card Game</span>
              <h4>Yu-Gi-Oh MD</h4>
              <a href="yugioh.php"><i class="fa fa-shopping-bag"></i></a>
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

  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>
          Copyright © 2025 Good Game. All rights reserved. &nbsp;&nbsp;
         
        </p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>
</body>

</html>