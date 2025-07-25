<?php
// admin_dashboard.php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

require_once 'db_connect.php';

$username = $_SESSION['username'];

// echo '<pre>';
// echo 'Using DB: ' . $pdo->query("SELECT DATABASE()")->fetchColumn() . "\n";
// echo 'UserName: '; var_dump($username);
// echo '</pre>';
// exit;

// ====== 获取核心统计数据 ======
$totalUsers  = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$totalSales  = $pdo->query("SELECT COALESCE(SUM(total_paid),0) FROM receipts")->fetchColumn();
$totalOrders = $pdo->query("SELECT COUNT(*) FROM receipts")->fetchColumn();
$totalProducts = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();

// 最近 10 笔订单
$stmt = $pdo->query("
    SELECT r.id, u.username, r.total_paid, r.issued_at
    FROM receipts r
    JOIN users u ON u.id = r.user_id
    ORDER BY r.issued_at DESC
    LIMIT 10
");
$recentOrders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body { font-family: sans-serif; margin: 30px; background: #f7f7f7; }
        h1 { margin-bottom: 24px; }
        .cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px; margin-bottom: 32px; }
        .card { background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,.06); padding: 16px; }
        .card h2 { margin: 0 0 8px; font-size: 18px; }
        table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 8px; overflow: hidden; }
        th, td { padding: 10px 12px; border-bottom: 1px solid #eee; text-align: left; }
        th { background: #fafafa; }
        .nav { margin-bottom: 24px; }
        .nav a { margin-right: 12px; text-decoration: none; color: #0366d6; }
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

    <h1>Admin Dashboard</h1>

    <div class="cards">
        <div class="card">
            <h2>用户总数</h2>
            <div><?php echo (int)$totalUsers; ?></div>
        </div>
        <div class="card">
            <h2>订单总数</h2>
            <div><?php echo (int)$totalOrders; ?></div>
        </div>
        <div class="card">
            <h2>销售总额</h2>
            <div>$<?php echo number_format((float)$totalSales, 2); ?></div>
        </div>
        <div class="card">
            <h2>商品数量</h2>
            <div><?php echo (int)$totalProducts; ?></div>
        </div>
    </div>

    <h2>最近订单</h2>
    <table>
        <thead>
            <tr>
                <th>#ID</th>
                <th>用户</th>
                <th>金额</th>
                <th>时间</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recentOrders as $o): ?>
            <tr>
                <td><?php echo (int)$o['id']; ?></td>
                <td><?php echo htmlspecialchars($o['username']); ?></td>
                <td>$<?php echo number_format((float)$o['total_paid'], 2); ?></td>
                <td><?php echo htmlspecialchars($o['issued_at']); ?></td>
            </tr>
            <?php endforeach; ?>
            <?php if (empty($recentOrders)): ?>
            <tr><td colspan="4" style="text-align:center;color:#999;">暂无数据</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
