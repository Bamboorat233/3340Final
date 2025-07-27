<?php
session_start();
require_once 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>LinkMusic — Audio Cables</title>
    <link rel="icon" href="images/logo.png" type="image/png" sizes="32x32" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- audioCable.php – Audio Cables Page Logic -->
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

        <!-- Slide: MOONDROP Silver pill -->
        <div class="slide active">
          <div class="floating-box">
            <h2>MOONDROP Silver pill</h2>
            <p>
              Three-Layer Coaxial Braided Oil-Immersed Oxygen-Free Copper Silver-Plated Upgrade Cable
            </p>
            <img src="images/MOONDROP Silver pill.png" alt="MOONDROP Silver pill" />
            <img src="images/MOONDROP Silver pill_2.png" alt="MOONDROP Silver pill_2" />
            <p class="price">Price: $780.44 USD</p>
            <button class="add-cart" data-id="7" data-qty="1">
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

        <!-- Slide: Moondrop Atami -->
        <div class="slide">
          <div class="floating-box">
            <h2>Moondrop Atami</h2>
            <p>Litz-Structure Single Crystal Copper + Special Silver Solder High-Quality Braided Upgrade Cable</p>
            <img src="images/Moondrop Atami.png" alt="Moondrop Atami" />
            <img src="images/Moondrop Atami_2.png" alt="Moondrop Atami_2" />
            <p class="price">Price: $169.08 USD</p>
            <button class="add-cart" data-id="8" data-qty="1">
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
            <h2>TWISTURA CHENXI</h2>
            <p>Headphone Upgrade Cable</p>
            <img src="images/TWISTURA CHENXI.png" alt="Sennheiser HD 660S2" />
            <img src="images/TWISTURA CHENXI_2.png" alt="Sennheiser HD 660S2" />
            <p class="price">Price: $141.78 USD</p>
            <button class="add-cart" data-id="9" data-qty="1">
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

        <!-- Slide: MOONDROP Silver pill -->
        <div class="slide active">
          <div class="floating-box">
            <h2>Tripowin Aurora</h2>
            <p>
              HiFi Replacement Cable for Wired Earbuds
            </p>
            <img src="images/Tripowin Aurora.png" alt="Tripowin Aurora" />
            <img src="images/Tripowin Aurora_2.png" alt="Tripowin Aurora_2" />
            <p class="price">Price: $78.03 USD</p>
            <button class="add-cart" data-id="10" data-qty="1">
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

        <!-- Slide: MOONDROP Silver pill -->
        <div class="slide active">
          <div class="floating-box">
            <h2>Kiwi Ears Terras</h2>
            <p>
              4N OCC Audiophile Cable
            </p>
            <img src="images/Kiwi Ears Terras.png" alt="Kiwi Ears Terras" />
            <img src="images/Kiwi Ears Terras_2.png" alt="Kiwi Ears Terras_2" />
            <p class="price">Price: $59.82 USD</p>
            <button class="add-cart" data-id="11" data-qty="1">
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
