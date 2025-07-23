<?php
session_start();
require_once 'db_connect.php';
if (!isset($_SESSION['user_id'])) {
  http_response_code(401);
  echo json_encode(['success'=>false,'msg'=>'请先登录']);
  exit;
}
$data = json_decode(file_get_contents('php://input'), true);
$product_id = intval($data['id']);
$qty        = intval($data['qty']);
$user_id    = $_SESSION['user_id'];
// 检查是否已存在
$stmt = $pdo->prepare("SELECT id, quantity FROM cart_items WHERE user_id=? AND product_id=?");
$stmt->execute([$user_id, $product_id]);
if ($row = $stmt->fetch()) {
  // 更新数量
  $newQty = $row['quantity'] + $qty;
  $up = $pdo->prepare("UPDATE cart_items SET quantity=?, added_at=NOW() WHERE id=?");
  $up->execute([$newQty, $row['id']]);
} else {
  // 新增记录
  $ins = $pdo->prepare("
    INSERT INTO cart_items (user_id, product_id, quantity, added_at)
    VALUES (?,?,?,NOW())
  ");
  $ins->execute([$user_id, $product_id, $qty]);
}
echo json_encode(['success'=>true]);
