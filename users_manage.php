<?php
session_start();
require_once 'db_connect.php';

// Authorization check
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Get current user's role and username
$stmt = $pdo->prepare("SELECT username, role FROM users WHERE id = :id");
$stmt->execute(['id' => $_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$username = $user['username'] ?? '';
$role = $user['role'] ?? '';

if ($role !== 'admin') {
    http_response_code(403);
    exit("403 Forbidden: Admin access only.");
}

// Handle form actions (role, email, password updates)
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

    // Avoid resubmission
    header("Location: users_manage.php");
    exit;
}

// Fetch all users
$users = $pdo->query("SELECT id, username, email, role, created_at FROM users ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
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
    <!-- Admin Navigation -->
    <div class="nav">
        <strong>Hello, <?php echo htmlspecialchars($username); ?> (Admin)</strong>
        | <a href="/admin_dashboard.php">Dashboard</a>
        | <a href="/products_manage.php">Product Management</a>
        | <a href="/orders_manage.php">Order Management</a>
        | <a href="/users_manage.php">User Management</a>
        | <a href="/logout.php">Logout</a>
    </div>

    <h1>User Management</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $u): ?>
                <tr>
                    <td><?php echo $u['id']; ?></td>
                    <td><?php echo htmlspecialchars($u['username']); ?></td>

                    <!-- Update Email -->
                    <td>
                        <form method="POST">
                            <input type="hidden" name="user_id" value="<?php echo $u['id']; ?>">
                            <input type="text" name="email" value="<?php echo htmlspecialchars($u['email']); ?>">
                            <button type="submit" name="update_email">Update Email</button>
                        </form>
                    </td>

                    <!-- Update Role -->
                    <td>
                        <form method="POST">
                            <input type="hidden" name="user_id" value="<?php echo $u['id']; ?>">
                            <select name="role">
                                <option value="user" <?php if ($u['role'] === 'user') echo 'selected'; ?>>user</option>
                                <option value="admin" <?php if ($u['role'] === 'admin') echo 'selected'; ?>>admin</option>
                            </select>
                            <button type="submit" name="update_role">Update Role</button>
                        </form>
                    </td>

                    <!-- Created At -->
                    <td><?php echo $u['created_at']; ?></td>

                    <!-- Update Password -->
                    <td>
                        <form method="POST">
                            <input type="hidden" name="user_id" value="<?php echo $u['id']; ?>">
                            <input type="password" name="new_password" placeholder="New Password">
                            <button type="submit" name="update_password">Change Password</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
