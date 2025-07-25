<?php
session_start();
require_once 'db_connect.php';

// 权限验证
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$stmt = $pdo->prepare("SELECT role FROM users WHERE id = :id");
$stmt->execute(['id' => $_SESSION['user_id']]);
$role = $stmt->fetchColumn();

if ($role !== 'admin') {
    http_response_code(403);
    exit("403 Forbidden: 仅限管理员访问");
}

// 处理操作（修改权限、邮箱、密码）
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'];
    if (isset($_POST['update_role'])) {
        $newRole = $_POST['role'] === 'admin' ? 'admin' : 'user';
        $stmt = $pdo->prepare("UPDATE users SET role = :role WHERE id = :id");
        $stmt->execute(['role' => $newRole, 'id' => $userId]);
    }
    if (isset($_POST['update_email'])) {
        $email = trim($_POST['email']);
        $stmt = $pdo->prepare("UPDATE users SET email = :email WHERE id = :id");
        $stmt->execute(['email' => $email, 'id' => $userId]);
    }
    if (isset($_POST['update_password'])) {
        $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET password = :pwd WHERE id = :id");
        $stmt->execute(['pwd' => $newPassword, 'id' => $userId]);
    }
    header("Location: users_manage.php");
    exit;
}

// 获取所有用户
$users = $pdo->query("SELECT id, username, email, role, created_at FROM users ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>用户管理</title>
    <style>
        body { font-family: sans-serif; margin: 40px; background-color: #f9f9f9; }
        h1 { margin-bottom: 24px; }
        table { width: 100%; border-collapse: collapse; background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.05); }
        th, td { padding: 10px 14px; border-bottom: 1px solid #eee; text-align: left; vertical-align: middle; }
        th { background: #f2f2f2; }
        form { display: inline; }
        input[type="text"], input[type="password"], select {
            padding: 4px 6px; font-size: 14px; width: 160px;
        }
        button { padding: 4px 10px; font-size: 13px; margin-left: 4px; }
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

<h1>用户管理</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>用户名</th>
            <th>邮箱</th>
            <th>权限</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $u): ?>
            <tr>
                <td><?php echo $u['id']; ?></td>
                <td><?php echo htmlspecialchars($u['username']); ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $u['id']; ?>">
                        <input type="text" name="email" value="<?php echo htmlspecialchars($u['email']); ?>">
                        <button type="submit" name="update_email">更新邮箱</button>
                    </form>
                </td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $u['id']; ?>">
                        <select name="role">
                            <option value="user" <?php if ($u['role'] === 'user') echo 'selected'; ?>>user</option>
                            <option value="admin" <?php if ($u['role'] === 'admin') echo 'selected'; ?>>admin</option>
                        </select>
                        <button type="submit" name="update_role">更新权限</button>
                    </form>
                </td>
                <td><?php echo $u['created_at']; ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $u['id']; ?>">
                        <input type="password" name="new_password" placeholder="新密码">
                        <button type="submit" name="update_password">修改密码</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
