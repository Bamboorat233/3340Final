<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>LM HIFI – Home</title>
    <link rel="icon" href="images/logo.png" type="image/png" sizes="32x32" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
   <?php include 'siderTopBar.php'; ?>

    <!-- use HTML table to create waveform -->
    <main>
      <!-- Floating text bar -->
      <div class="floating-bar">
        <h1>Welcome to LinkMusic</h1>
        <p>Explore the purest world of music</p>
      </div>
      <div class="main-box">
        <table class="waveform">
          <tr>
            <td><div class="bar" style="height: 120px"></div></td>
            <td><div class="bar" style="height: 100px"></div></td>
            <td><div class="bar" style="height: 80px"></div></td>
            <td><div class="bar" style="height: 60px"></div></td>
            <td><div class="bar" style="height: 160px"></div></td>
            <td><div class="bar" style="height: 180px"></div></td>
            <td><div class="bar" style="height: 200px"></div></td>
            <td><div class="bar" style="height: 180px"></div></td>
            <td><div class="bar" style="height: 160px"></div></td>
            <td><div class="bar" style="height: 140px"></div></td>
            <td><div class="bar" style="height: 40px"></div></td>
            <td><div class="bar" style="height: 100px"></div></td>
            <td><div class="bar" style="height: 120px"></div></td>
            <td><div class="bar" style="height: 140px"></div></td>
            <td><div class="bar" style="height: 20px"></div></td>
            <td><div class="bar" style="height: 30px"></div></td>
            <td><div class="bar" style="height: 40px"></div></td>
            <td><div class="bar" style="height: 60px"></div></td>
            <td><div class="bar" style="height: 80px"></div></td>
          </tr>
        </table>
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

    <script src="js/main.js"></script>
  </body>
</html>
