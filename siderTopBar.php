<?php
// sidebar_topbar.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- Menu button -->
<button id="menu-btn" class="menu-btn">
  <img src="images/align-justify-128.webp" alt="Menu" width="24" height="24" />
</button>

<!-- Fixed background layer -->
<div class="bg-fixed"></div>

<!-- Sidebar -->
<aside id="sidebar" class="sidebar">
  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="inear.php">In-Ear Headphones</a></li>
      <li><a href="headphone.php">Over-Ear Headphones</a></li>
      <li><a href="about.html">About Us</a></li>
      <li><a href="shoppingCart.php">Shopping Cart</a></li>
      <li><a href="citation.html">References</a></li>
    </ul>
  </nav>
</aside>

<!-- Overlay for sidebar -->
<div id="overlay"></div>

<!-- Top bar -->
<div class="top-bar">
  <div class="brand">
    <img src="images/logo.png" alt="LinkMusic Logo" class="brand-logo" />
    <div class="brand-text">
      <span class="site-name">LinkMusic</span>
      <span class="tagline">Born for music</span>
    </div>
  </div>
  <div class="social-icons">
    <a href="#"><img src="images/facebook-128.webp" alt="Facebook" /></a>
    <a href="#"><img src="images/instagram-128.webp" alt="Instagram" /></a>
    <a href="#"><img src="images/share-128.webp" alt="Share" /></a>
    <?php if (isset($_SESSION['user_id'])): ?>
      <a href="dashboard.php"><img src="images/user-64.webp" alt="<?php echo htmlspecialchars($_SESSION['username']); ?>" title="Dashboard" /></a>
      <a href="logout.php"><img src="images/log-in-64.webp" alt="Logout" title="Logout" /></a>
    <?php else: ?>
      <a href="login.php"><img src="images/user-64.webp" alt="Login" title="Login" /></a>
    <?php endif; ?>
  </div>
</div>
