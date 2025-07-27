<?php
// orders_manage.php
session_start();
require_once 'db_connect.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Fetch user role
$stmt = $pdo->prepare("SELECT username, role FROM users WHERE id = :id");
$stmt->execute(['id' => $_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$username = $user['username'] ?? '';
$role = $user['role'] ?? '';

if ($role !== 'admin') {
    http_response_code(403);
    exit("403 Forbidden: Admins only");
}

// Fetch all orders
$stmt = $pdo->query("
    SELECT r.id, r.user_id, u.username, r.total_paid, r.issued_at, r.items
    FROM receipts r
    JOIN users u ON u.id = r.user_id
    ORDER BY r.issued_at DESC
");
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order Management</title>
  <style>
    body { font-family: sans-serif; margin: 40px; background-color: #f7f7f7; }
    h1 { margin-bottom: 24px; }
    table { width: 100%; border-collapse: collapse; background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.05); }
    th, td { padding: 12px 16px; border-bottom: 1px solid #eee; text-align: left; }
    th { background: #f2f2f2; }
    .items-list { margin-top: 8px; padding-left: 20px; color: #555; font-size: 14px; }
  </style>
</head>
<body>
  <!-- Admin Navigation -->
  <div class="nav">
    <strong>Hello, <?php echo htmlspecialchars($username); ?> (Admin)</strong>
    | <a href="/admin_dashboard.php">Dashboard</a>
    | <a href="/products_manage.php">Product Management</a>
    | <a href="/orders_manage.php">Order Management</a>
    | <a href="/users_manage.php">User Management</a>
    | <a href="/logout.php">Logout</a>
  </div>

  <h1>Order Management</h1>

  <table>
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Username</th>
        <th>Total Paid</th>
        <th>Order Time</th>
        <th>Items</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($orders as $order): ?>
        <tr>
          <td>#<?php echo $order['id']; ?></td>
          <td><?php echo htmlspecialchars($order['username']); ?></td>
          <td>$<?php echo number_format($order['total_paid'], 2); ?></td>
          <td><?php echo $order['issued_at']; ?></td>
          <td>
            <?php
              $items = json_decode($order['items'], true);
              if (is_array($items)) {
                echo '<ul class="items-list">';
                foreach ($items as $item) {
                  // Notice: Original used item['name'] incorrectly — it should match 'product' from checkout
                  echo "<li>{$item['product']} × {$item['quantity']} - $" . number_format($item['price'], 2) . "</li>";
                }
                echo '</ul>';
              } else {
                echo 'No item data available';
              }
            ?>
          </td>
        </tr>
      <?php endforeach; ?>

      <?php if (count($orders) === 0): ?>
        <tr>
          <td colspan="5" style="text-align:center; color: #888;">No orders found</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

</body>
</html>
