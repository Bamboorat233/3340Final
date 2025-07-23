<?php
session_start();
require_once 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>LinkMusic — Over‑Ear Headphones</title>
    <link rel="icon" href="images/logo.png" type="image/png" sizes="32x32" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- headphone.html – Over‑Ear Headphones Page Logic -->
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
            <h2>Fiio FT1 Pro</h2>
            <p>
              95×86mm planar magnetic, open-back design, with interchangeable
              3.5mm &amp; 4.4mm cables.
            </p>
            <img src="images/FT1-Pro.png" alt="Fiio FT1 Pro" />
            <p class="price">Price: $219.99 USD</p>
            <button class="add-cart" data-id="1" data-qty="1">
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
            <h2>Hifiman Arya Unveiled</h2>
            <p>New non-grid open-back design, flagship SUSVARA-level sound.</p>
            <img src="images/arya-u.jpg" alt="Hifiman Arya Unveiled" />
            <p class="price">Price: $1,449.00 USD</p>
            <button class="add-cart" data-id="2" data-qty="1">
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
            <h2>Sennheiser HD 660S2</h2>
            <p>300 Ω impedance, high-resolution soundstage, deep bass.</p>
            <img src="images/660s2.webp" alt="Sennheiser HD 660S2" />
            <p class="price">Price: $499.95 USD</p>
            <button class="add-cart" data-id="3" data-qty="1">
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
