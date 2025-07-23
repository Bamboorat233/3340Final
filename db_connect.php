<?php
// db_connect.php — connect to MySQL database using PDO

$host = 'localhost';
$dbname = 'Proj_LMHF';
$username = 'LMHF';
$password = '200209';

try {
    // Create PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: disable emulated prepares for real parameter binding
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    // Optional: you can uncomment the following line for connection confirmation during development
    // echo "Database connected successfully.";

} catch (PDOException $e) {
    // Fail-safe error message for production (do not expose $e->getMessage())
    die("Database connection failed. Please try again later.");
    
    // For development only:
    // die("Connection failed: " . $e->getMessage());
}
?>