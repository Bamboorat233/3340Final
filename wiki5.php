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
        <li><a href="dashboard.php">dashborad</a></li>
        <p>Let's look to the top right corner of the site and click on the avatar.</p>
        <image src="images/wiki-dashb.png" alt="LM HIFI dashboard Image" width="300" height="100" />
        <p>Lastly, administrators teach, so let's continue.</p>
        <li><a href="wiki6.php">admin wiki</a></li>

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
