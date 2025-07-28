<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>LM HIFI - Home</title>
    <link rel="icon" href="images/logo.png" type="image/png" sizes="32x32" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <?php include 'siderTopBar.php'; ?>

    <main>
      <div class="wiki-floating-bar">
        <h1>Welcome to LinkMusic website wiki</h1>
        <li><a href="inear.php">In-Ear Headphones</a></li>
        <p>Now to start the shopping instruction, after clicking on the sidebar, you can see the link to the product category page</p>
        <image src="images/wiki-product.png" alt="LM HIFI product Image" width="200" height="250" />
        <p>To purchase an item, you first need to click on the Add Cart button and then go to the cart to pay for it. 
            Click on the arrows on the left and right side of the product to switch between different products.</p>
        <image src="images/wiki-product2.png" alt="LM HIFI product Image2" width="600" height="200" />
        <p>Let's keep teaching, the next thing you need to know is the user shopping cart for the website. Click on the link below and let's continue</p>
        <li><a href="wiki4.php">cart wiki</a></li>

      </div>
    </main>

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

    <script src="js/main.js"></script>
  </body>
</html>
