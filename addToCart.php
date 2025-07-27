<?php
session_start();
require_once 'db_connect.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  http_response_code(401);
  echo json_encode(['success' => false, 'msg' => 'Please login first']);
  exit;
}

// Read and parse the JSON input
$data = json_decode(file_get_contents('php://input'), true);
$product_id = intval($data['id']);
$qty        = intval($data['qty']);
$user_id    = $_SESSION['user_id'];

// Check if the product already exists in the user's cart
$stmt = $pdo->prepare("SELECT id, quantity FROM cart_items WHERE user_id=? AND product_id=?");
$stmt->execute([$user_id, $product_id]);

if ($row = $stmt->fetch()) {
  // Update the quantity if the item already exists in the cart
  $newQty = $row['quantity'] + $qty;
  $up = $pdo->prepare("UPDATE cart_items SET quantity=?, added_at=NOW() WHERE id=?");
  $up->execute([$newQty, $row['id']]);
} else {
  // Insert a new record if the product is not in the cart yet
  $ins = $pdo->prepare("
    INSERT INTO cart_items (user_id, product_id, quantity, added_at)
    VALUES (?,?,?,NOW())
  ");
  $ins->execute([$user_id, $product_id, $qty]);
}

// Return success response
echo json_encode(['success' => true]);
