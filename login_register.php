<?php
session_start();
require_once 'db_connect.php'; // 使用你已配置好的数据库连接

// 获取表单数据
$action = $_POST['action'] ?? '';
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');
$email = trim($_POST['email'] ?? '');

// 基础校验
if ($username === '' || $password === '') {
    exit('Username and password are required.');
}

if ($action === 'register') {
    // 注册逻辑
    if ($email === '') {
        exit('Email is required for registration.');
    }

    // 检查用户名或邮箱是否已存在
    $check = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $check->execute([$username, $email]);
    if ($check->rowCount() > 0) {
        exit('Username or email already exists.');
    }

    // 加密密码并插入
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $insert = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $insert->execute([$username, $hashed, $email]);

    echo "Registration successful! <a href='login.php'>Go to login</a>";
    exit;
}

if ($action === 'login') {
    // 登录逻辑
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header("Location: index.php"); // 登录成功跳转主页
        exit;
    } else {
        echo "Login failed. Invalid username or password.";
        exit;
    }
}

echo "Invalid request.";
?>
