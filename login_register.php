<?php
session_start();
require_once 'db_connect.php'; // Use your configured DB connection

// Get form data from POST
$action   = $_POST['action'] ?? '';
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');
$email    = trim($_POST['email'] ?? '');

// Basic input validation
if ($username === '' || $password === '') {
    exit('Username and password are required.');
}

// === Registration logic ===
if ($action === 'register') {
    if ($email === '') {
        exit('Email is required for registration.');
    }

    // Check if username or email already exists
    $check = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $check->execute([$username, $email]);
    if ($check->rowCount() > 0) {
        exit('Username or email already exists.');
    }

    // Hash password and insert new user
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $insert = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $insert->execute([$username, $hashed, $email]);

    echo "Registration successful! <a href='login.php'>Go to login</a>";
    exit;
}

// === Login logic ===
if ($action === 'login') {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify user and password
    if ($user && password_verify($password, $user['password'])) {
        // Store session information
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header("Location: index.php"); // Redirect to homepage after login
        exit;
    } else {
        echo "Login failed. Invalid username or password.";
        exit;
    }
}

echo "Invalid request.";
?>
