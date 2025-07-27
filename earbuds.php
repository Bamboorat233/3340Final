<?php
session_start();
require_once 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>LinkMusic — TWS Earbuds</title>
    <link rel="icon" href="images/logo.png" type="image/png" sizes="32x32" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- TWS Earbuds.php – TWS Earbuds Page Logic -->
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

        <!-- Slide: Fiio FT1 Pro -->
        <div class="slide active">
          <div class="floating-box">
            <h2>TRN BT1</h2>
            <p>
              1DD+1BA Hybrid Driver TWS True Wireless Bluetooth 5.0 Earphones
            </p>
            <img src="images/TRN BT1.png" alt="TRN BT1" />
            <img src="images/TRN BT1_2.png" alt="TRN BT1_2" />
            <p class="price">Price: $39.01 USD</p>
            <button class="add-cart" data-id="12" data-qty="1">
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

        <!-- Slide: Hifiman Arya Unveiled -->
        <div class="slide">
          <div class="floating-box">
            <h2>KINERA YH623</h2>
            <p>Kinera YH623 adopts the new driver and active noise-cancelling technology to achieve a HiFi class stereo sound.</p>
            <img src="images/KINERA YH623.png" alt="KINERA YH623" />
            <img src="images/KINERA YH623_2.png" alt="KINERA YH623_2" />
            <p class="price">Price: $89.75 USD</p>
            <button class="add-cart" data-id="13" data-qty="1">
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

        <!-- Slide: Sennheiser HD 660S2 -->
        <div class="slide">
          <div class="floating-box">
            <h2>Moondrop PILL</h2>
            <p>Built-in AI ENC High-quality Ear-clip Earbuds</p>
            <img src="images/Moondrop PILL.png" alt="Moondrop PILL" />
            <img src="images/Moondrop PILL_2.png" alt="Moondrop PILL_2" />
            <p class="price">Price: $65.02 USD</p>
            <button class="add-cart" data-id="14" data-qty="1">
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

        <!-- Slide: Sennheiser HD 660S2 -->
        <div class="slide">
          <div class="floating-box">
            <h2>KZ Carol Pro</h2>
            <p>Wireless Earbuds, Six-Microphone Hybrid Noise Cancellation, LDAC High-Resolution Wireless Audio</p>
            <img src="images/KZ Carol Pro.png" alt="KZ Carol Pro" />
            <img src="images/KZ Carol Pro_2.png" alt="KZ Carol Pro_2" />
            <p class="price">Price: $42.91 USD</p>
            <button class="add-cart" data-id="15" data-qty="1">
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

        <!-- Slide: Sennheiser HD 660S2 -->
        <div class="slide">
          <div class="floating-box">
            <h2>Moondrop Pavane</h2>
            <p>13.5mm Dynamic Driver Flagship Earbuds</p>
            <img src="images/Moondrop Pavane.png" alt="Moondrop Pavane" />
            <img src="images/Moondrop Pavane_2.png" alt="Moondrop Pavane_2" />
            <p class="price">Price: $494.27 USD</p>
            <button class="add-cart" data-id="16" data-qty="1">
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
