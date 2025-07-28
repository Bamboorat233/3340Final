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
        <p>Welcome to the website wiki where I will be teaching how to use the LMHF shopping site</p>
        <image src="images/wiki-sidebar.png" alt="LM HIFI sidebar Image" width="200" height="200" />
        <p>I need to start by describing the navigation page of this site, also known as the sidebar. The sidebar is opened by clicking on this button with three horizontal lines.</p>
        <p>Let's keep teaching, the next thing you need to know is the user login for the website. Click on the link below and let's continue</p>
        <li><a href="wiki2.php">login wiki</a></li>

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
