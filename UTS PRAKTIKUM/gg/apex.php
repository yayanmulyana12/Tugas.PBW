<?php
session_start();
$is_logged_in = isset($_SESSION['username']); 
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
                    <h3>Apex Legends</h3>
                    <span class="breadcrumb"><a href="#">Home</a> > <a href="#">Shop</a> > Apex Legends</span>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-image">
                        <img src="assets/images/apex.jpg" alt="" style="width: 400px; height: auto;" />
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <h4>Apex Legends</h4>
                    <span class="price">Free</span>
                    <p>
                        Apex Legends is the award-winning, free-to-play Hero Shooter from Respawn Entertainment. Master
                        an ever-growing roster of legendary characters with powerful abilities, and experience strategic
                        squad play and innovative gameplay in the next evolution of Hero Shooter and Battle Royale.
                    </p>
                    <button type="action" class="btn btn-primary buy-now" data-game="Apex Legends" data-price="0"
                        <?php if (!$is_logged_in) echo 'onclick="alertLogin(event)"'; ?>>
                        <i class="fa fa-shopping-bag"></i> Buy
                    </button>
                    <ul>
                        <li><span>Game ID:</span> COD MMII</li>
                        <li>
                            <span>Genre:</span> <a href="#">Action</a>,
                            <a href="#">Team</a>, <a href="#">Single</a>
                        </li>
                        <li>
                            <span>Multi-tags:</span> <a href="#">War</a>,
                            <a href="#">Battle</a>, <a href="#">Royal</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="sep"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="more-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-content">
                        <div class="row">
                            <div class="nav-wrapper">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                            data-bs-target="#description" type="button" role="tab"
                                            aria-controls="description" aria-selected="true">
                                            Description
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                                            data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews"
                                            aria-selected="false">
                                            Reviews (3)
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel"
                                    aria-labelledby="description-tab">
                                    <p>
                                        Conquer with character in Apex Legends, a free-to-play* Hero shooter where
                                        legendary characters with powerful abilities team up to battle for fame &
                                        fortune on the fringes of the Frontier.

                                        Master an ever-growing roster of diverse Legends, deep-tactical squad play, and
                                        bold, new innovations that go beyond the Battle Royale experience — all within a
                                        rugged world where anything goes. Welcome to the next evolution of Hero Shooter.
                                    </p>
                                    <br />
                                    <p>
                                        System Requirements</p>
                                    <p>
                                        Minimum:</p>
                                    <p>Windows 7 64-Bit (32-bit not supported)</p>
                                    <p>Processor:Intel Core i7 860, Intel Core i5 750, or AMD FX-4100 (SSE 4.2 support
                                        required)</p>
                                    <p>Video:DirectX 11+ capable Graphics Card</p>
                                    <p>Memory:4 GB RAM</p>
                                    <p>Storage:50 GB available HD space</p>
                                    <p>Internet:Broadband Internet Connection Required</p>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                    <p>
                                        Posted: 12 May
                                        This game is so sh*t now, everyday there is a new problem, last day no server
                                        found issue, today can't play with origin or console players problem, maybe in
                                        the future there will be "No game found"issue, ea should give it epic or valve
                                        at this point, dog sh*t skin updates, no game fixes and more game-breaking issue
                                        everyday... fk EA, FK Respawn and fk Me for still playing this trash even at
                                        this state.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section categories related-games">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h6>Action</h6>
                        <h2>Related Games</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-button">
                        <a href="shop.html">View All</a>
                    </div>
                </div>
                <div class="col-lg col-sm-6 col-xs-12">
                    <div class="item">
                        <h4>Platform Fighter</h4>
                        <div class="thumb">
                            <a href="product-details.html"><img src="assets/images/categories-01.jpg" alt="" /></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-sm-6 col-xs-12">
                    <div class="item">
                        <h4>Action</h4>
                        <div class="thumb">
                            <a href="product-details.html"><img src="assets/images/categories-05.jpg" alt="" /></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-sm-6 col-xs-12">
                    <div class="item">
                        <h4>Action RPG</h4>
                        <div class="thumb">
                            <a href="product-details.html"><img src="assets/images/categories-03.jpg" alt="" /></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-sm-6 col-xs-12">
                    <div class="item">
                        <h4>Battle Royale</h4>
                        <div class="thumb">
                            <a href="product-details.html"><img src="assets/images/categories-04.jpg" alt="" /></a>
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
                    Copyright © 2025 GOOD GAME. All rights reserved.
                    RPL
                    <a rel="nofollow" href="https://templatemo.com" target="_blank"></a>
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