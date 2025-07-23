<?php
session_start();
require_once 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>LinkMusic — In‑Ear Headphones</title>
    <link rel="icon" href="images/logo.png" type="image/png" sizes="32x32" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- inear.html – In‑Ear Headphones Page Logic -->
    <script defer src="js/inear.js"></script>
    <script defer src="js/cart.js"></script>
    <script defer src="js/main.js"></script>
  </head>
  <body>
    <?php include 'siderTopBar.php'; ?>

    <!-- Main slider section -->
    <main>
      <div class="slider">
        <button id="prevBtn" class="slider-btn left">
          <img src="images/chevron-left-64.webp" alt="Previous" />
        </button>

        <!-- Slide: Final E5000 -->
        <div class="slide active">
          <div class="floating-box">
            <h2>Final E5000</h2>
            <p>
              6.4 mm dynamic driver with ceramic chamber, stainless steel shell,
              detachable MMCX cable.
            </p>
            <img src="images/final-e5000.jpg" alt="Final E5000" />
            <p class="price">Price: $278.00 USD</p>
            <button class="add-cart" data-id="4" data-qty="1">
              <img
                src="images/shopping-cart-64.webp"
                alt="Add to Cart"
                width="24"
                height="24"
              />
              Add to Cart
            </button>
          </div>
        </div>

        <!-- Slide: THIEAUDIO Origin -->
        <div class="slide">
          <div class="floating-box">
            <h2>THIEAUDIO Origin</h2>
            <p>
              1DD+4BA+2EST+1BC quad-driver, 20Hz–44kHz response, 102 dB
              sensitivity.
            </p>
            <img src="images/thieaudio-origin.png" alt="THIEAUDIO Origin" />
            <p class="price">Price: $849.00 USD</p>
            <button class="add-cart" data-id="5" data-qty="1">
              <img
                src="images/shopping-cart-64.webp"
                alt="Add to Cart"
                width="24"
                height="24"
              />
              Add to Cart
            </button>
          </div>
        </div>

        <!-- Slide: UM Melody -->
        <div class="slide">
          <div class="floating-box">
            <h2>UM Melody</h2>
            <p>Hybrid driver design for rich detail and clarity.</p>
            <img src="images/Um-melody.webp" alt="UM Melody" />
            <p class="price">Price: $1,260.00 USD</p>
            <button class="add-cart" data-id="6" data-qty="1">
              <img
                src="images/shopping-cart-64.webp"
                alt="Add to Cart"
                width="24"
                height="24"
              />
              Add to Cart
            </button>
          </div>
        </div>

        <button id="nextBtn" class="slider-btn right">
          <img src="images/chevron-right-64.webp" alt="Next" />
        </button>
      </div>
    </main>

    <!-- Footer -->
    <footer>
      <div class="footer-content">
        <div class="footer-school">
          <img
            src="images/universityLogoNew_uni-logo-windsor.png"
            alt="University of Windsor Logo"
            class="univ-logo"
          />
          <span class="univ-name">University of Windsor</span>
        </div>
        <div class="footer-contact">
          <a href="mailto:likerui@uwindsor.ca">likerui@uwindsor.ca</a>
        </div>
      </div>
    </footer>

    <!-- Global script -->
    <script src="js/main.js"></script>
  </body>
</html>
