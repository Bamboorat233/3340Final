<?php
// orders_manage.php
session_start();
require_once 'db_connect.php';

// 确保当前用户是管理员（可替换为你项目里的 require_admin）
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// 查询当前用户角色
$stmt = $pdo->prepare("SELECT role FROM users WHERE id = :id");
$stmt->execute(['id' => $_SESSION['user_id']]);
$role = $stmt->fetchColumn();

if ($role !== 'admin') {
    http_response_code(403);
    exit("403 Forbidden: 管理员专用页面");
}

// 查询所有订单
$stmt = $pdo->query("
    SELECT r.id, r.user_id, u.username, r.total_paid, r.issued_at, r.items
    FROM receipts r
    JOIN users u ON u.id = r.user_id
    ORDER BY r.issued_at DESC
");
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <title>订单管理</title>
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
     <div class="nav">
        <strong>你好，<?php echo htmlspecialchars($username); ?>（管理员）</strong>
        | <a href="/admin_dashboard.php">首页</a>
        | <a href="/products_manage.php">商品管理</a>
        | <a href="/orders_manage.php">订单管理</a>
        | <a href="/users_manage.php">用户管理</a>
        | <a href="/logout.php">退出</a>
    </div>

<h1>订单管理</h1>

<table>
  <thead>
    <tr>
      <th>订单ID</th>
      <th>用户名</th>
      <th>支付金额</th>
      <th>下单时间</th>
      <th>商品列表</th>
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
                echo "<li>{$item['name']} × {$item['quantity']} - $" . number_format($item['price'], 2) . "</li>";
              }
              echo '</ul>';
            } else {
              echo '无商品数据';
            }
          ?>
        </td>
      </tr>
    <?php endforeach; ?>
    <?php if (count($orders) === 0): ?>
      <tr><td colspan="5" style="text-align:center;color:#888;">暂无订单</td></tr>
    <?php endif; ?>
  </tbody>
</table>

</body>
</html>
