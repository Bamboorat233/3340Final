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
        <li><a href="shoppingCart.php">Shopping Cart</a></li>
        <p>The shopping cart is relatively simple to use with only two buttons. These are the Empty Cart button and the Payment button.</p>
        <image src="images/wiki-sc.png" alt="LM HIFI shopping cart Image" width="400" height="200" />
        <p>Finally, to view your order you need to go to your personal page.Click on the link below and I will continue to teach.</p>
        <li><a href="wiki5.php">dashborad wiki</a></li>

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
