<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
require_once 'db_connect.php';
$user_id = $_SESSION['user_id'];

// 1. 读取购物车详情
$stmt = $pdo->prepare("
  SELECT p.name, p.price, ci.quantity
  FROM cart_items ci
  JOIN products p ON ci.product_id = p.id
  WHERE ci.user_id = ?
");
$stmt->execute([$user_id]);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($rows)) {
  die("Your cart is empty.");
}

// 2. 组装回执数据
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

// 3. 插入 receipts
$ins = $pdo->prepare("INSERT INTO receipts (user_id, total_paid, items) VALUES (?, ?, ?)");
$ins->execute([
  $user_id,
  $total,
  json_encode($snapshot, JSON_UNESCAPED_UNICODE)
]);

// 4. 清空购物车
$del = $pdo->prepare("DELETE FROM cart_items WHERE user_id = ?");
$del->execute([$user_id]);

// 5. 重定向到 dashboard 查看回执
header("Location: dashboard.php");
exit;
