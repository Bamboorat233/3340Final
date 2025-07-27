<?php
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];

require_once 'db_connect.php';

// Fetch cart items for current user
$stmt = $pdo->prepare("
    SELECT c.id, c.product_id, p.id AS p_id, p.name, p.price, p.image, c.quantity
    FROM cart_items c
    LEFT JOIN products p ON c.product_id = p.id
    WHERE c.user_id = :user_id
    ORDER BY c.added_at DESC
");
$stmt->execute(['user_id' => $user_id]);
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle clear cart POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear_cart'])) {
    $stmt = $pdo->prepare("DELETE FROM cart_items WHERE user_id = :uid");
    $stmt->execute(['uid' => $_SESSION['user_id']]);
    header("Location: shoppingCart.php"); // Prevent resubmission on refresh
    exit;
}

// Calculate total price
$total = 0;
foreach ($items as $it) {
    $total += $it['price'] * $it['quantity'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Shopping Cart — LinkMusic</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="icon" href="images/logo.png" type="image/png" sizes="32x32" />
  <script src="js/main.js" defer></script>
</head>
<body>
  <?php include 'siderTopBar.php'; ?>

  <main>
    <div class="cart-box-container">
      <div class="cart-box">
        <h1>My Shopping Cart</h1>

        <?php if (empty($items)): ?>
          <p>Your cart is empty.</p>
        <?php else: ?>
          <div class="cart-items">
            <ul>
              <?php foreach ($items as $it): ?>
              <li>
                <img src="<?php echo htmlspecialchars($it['image']); ?>" 
                     alt="<?php echo htmlspecialchars($it['name']); ?>" 
                     style="height:40px; vertical-align:middle; margin-right:8px;">
                <strong><?php echo htmlspecialchars($it['name']); ?></strong>
                × <?php echo $it['quantity']; ?>
                — $<?php echo number_format($it['price'] * $it['quantity'], 2); ?>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <div class="cart-total">
            Total: $<?php echo number_format($total, 2); ?>
          </div>

          <div class="cart-actions">
            <!-- Checkout form -->
            <form action="checkout.php" method="POST">
              <button type="submit" class="checkout-btn">Checkout</button>
            </form>

            <!-- Clear cart form -->
            <form method="POST" style="display: inline;">
              <button type="submit" name="clear_cart" class="checkout-btn" onclick="return confirm('Are you sure you want to clear your cart?')">
                Clear Cart
              </button>
            </form>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </main>
</body>
</html>
