<?php
session_start();

// Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

require_once 'db_connect.php';
$user_id = $_SESSION['user_id'];

// 1. Fetch cart details for the current user
$stmt = $pdo->prepare("
  SELECT p.name, p.price, ci.quantity
  FROM cart_items ci
  JOIN products p ON ci.product_id = p.id
  WHERE ci.user_id = ?
");
$stmt->execute([$user_id]);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// If the cart is empty, stop execution
if (empty($rows)) {
  die("Your cart is empty.");
}

// 2. Construct receipt data (calculate total and snapshot)
$total = 0;
$snapshot = [];
foreach ($rows as $r) {
  $total += $r['price'] * $r['quantity'];
  $snapshot[] = [
    'product'  => $r['name'],
    'price'    => $r['price'],
    'quantity' => $r['quantity']
  ];
}

// 3. Insert new receipt record
$ins = $pdo->prepare("INSERT INTO receipts (user_id, total_paid, items) VALUES (?, ?, ?)");
$ins->execute([
  $user_id,
  $total,
  json_encode($snapshot, JSON_UNESCAPED_UNICODE) // Keep UTF-8 characters readable
]);

// 4. Clear the cart after checkout
$del = $pdo->prepare("DELETE FROM cart_items WHERE user_id = ?");
$del->execute([$user_id]);

// 5. Redirect to dashboard to view the receipt
header("Location: dashboard.php");
exit;
