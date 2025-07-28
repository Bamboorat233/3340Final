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
        <p>To access the administrator page, we need to log in to the site as an administrator.</p>
        <p>Account number: admin01; Password: 123456.</p>
        <p>Still the dashborad button in the upper right corner.</p>
        <image src="images/wiki-dashb.png" alt="LM HIFI dashboard Image" width="300" height="100" />
        <p>Then we're on the admin page, and the rest is left for you to explore!</p>
        <image src="images/wiki-admin.png" alt="LM HIFI admin Image" width="400" height="150" />

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
