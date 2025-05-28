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

  <title>Lugx Gaming Template - Contact Page</title>

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
          <h3>Contact Us</h3>
          <span class="breadcrumb"><a href="#">Home</a> > Contact Us</span>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-page section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-text">
            <div class="section-heading">
              <h6>Contact Us</h6>
              <h2>Hello!</h2>
            </div>
            <p>
              Good Game is a digital game distribution platform where you can
              discover, download, and enjoy the best PC games — all in one
              place. From indie gems to blockbuster hits, we bring you a
              growing library of games with fast downloads, user reviews, and
              exclusive deals. Join our gaming community today and level up
              your collection with Good Game — your new favorite way to play.
              Thank you.
            </p>
            <ul>
              <li>
                <span>Address</span> Jl. HS.Ronggo Waluyo, Puseurjaya,
                Telukjambe Timur, Karawang, Jawa Barat 41361
              </li>
              <li><span>Phone</span> +62822348938</li>
              <li><span>Email</span> goodgame@gaming.com</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-content">
            <div class="row">
              <div class="col-lg-12">
                <div id="map">
                  <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.5457598995267!2d107.30382347441135!3d-6.32323446187308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6977ccb34822e1%3A0x6c4c7c12678610e0!2sUniversitas%20Singaperbangsa%20Karawang%20(UNSIKA)!5e0!3m2!1sid!2sid!4v1747964530467!5m2!1sid!2sid"
                    width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" width="100%" height="325px" frameborder="0"
                    style="border: 0; border-radius: 23px" allowfullscreen=""></iframe>
                </div>
              </div>
              <div class="col-lg-12">
                <form id="contact-form" action="" method="post">
                  <div class="row">
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="name" name="name" id="name" placeholder="Your Name..." autocomplete="on"
                          required />
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="surname" name="surname" id="surname" placeholder="Your Surname..."
                          autocomplete="on" required />
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..."
                          required="" />
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="subject" name="subject" id="subject" placeholder="Subject..." autocomplete="on" />
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <textarea name="message" id="message" placeholder="Your Message"></textarea>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="orange-button">
                          Send Message Now
                        </button>
                      </fieldset>
                    </div>
                  </div>
                </form>
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
          >RPL</a>
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