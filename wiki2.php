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
        <li><a href="login.php">login</a></li>
        <p>The first step in order to purchase items on this site is to register as a user and log in. Let's look to the top right corner of the site</p>
        <image src="images/wiki-login.png" alt="LM HIFI login Image" width="300" height="100" />
        <p>If this is your first time using this site, click on the Register button in blue font in the login box and follow the instruction on the registration page.</p>
        <image src="images/wiki-login2.png" alt="LM HIFI login Image2" width="250" height="200" />
        <p>After logging in, if you need to switch accounts or if you need to log out, you can click the Logout button to the right of your avatar.</p>
        <image src="images/wiki-login3.png" alt="LM HIFI login Image3" />
        <p>Now that you are logged in, you can start browsing the site and searching for items you want to purchase.</p>
        <li><a href="wiki3.php">purchase wiki</a></li>

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
