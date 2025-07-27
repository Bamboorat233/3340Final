<?php
// admin_dashboard.php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

require_once 'db_connect.php';

$username = $_SESSION['username'];

// ====== Get core statistics ======
$totalUsers     = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$totalSales     = $pdo->query("SELECT COALESCE(SUM(total_paid),0) FROM receipts")->fetchColumn();
$totalOrders    = $pdo->query("SELECT COUNT(*) FROM receipts")->fetchColumn();
$totalProducts  = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();

// Get 10 most recent orders
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
<html lang="en">
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
        <strong>Hello, <?php echo htmlspecialchars($username); ?> (Admin)</strong>
        | <a href="/admin_dashboard.php">Home</a>
        | <a href="/orders_manage.php">Order Management</a>
        | <a href="/users_manage.php">User Management</a>
        | <a href="/logout.php">Logout</a>
    </div>

    <h1>Admin Dashboard</h1>

    <div class="cards">
        <div class="card">
            <h2>Total Users</h2>
            <div><?php echo (int)$totalUsers; ?></div>
        </div>
        <div class="card">
            <h2>Total Orders</h2>
            <div><?php echo (int)$totalOrders; ?></div>
        </div>
        <div class="card">
            <h2>Total Sales</h2>
            <div>$<?php echo number_format((float)$totalSales, 2); ?></div>
        </div>
        <div class="card">
            <h2>Total Products</h2>
            <div><?php echo (int)$totalProducts; ?></div>
        </div>
    </div>

    <h2>Recent Orders</h2>
    <table>
        <thead>
            <tr>
                <th>#ID</th>
                <th>User</th>
                <th>Amount</th>
                <th>Time</th>
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
            <tr><td colspan="4" style="text-align:center;color:#999;">No data available</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
