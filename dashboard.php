<?php
session_start();
require_once 'db_connect.php';
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("
    SELECT role
    FROM users
    WHERE id = :user_id
");
$stmt->execute(['user_id' => $user_id]);
$user_role = $stmt->fetchColumn();

// 按角色跳转
if ($user_role === 'admin') {
    header('Location: /admin_dashboard.php');
}



// 查询该用户的所有 receipts
$stmt = $pdo->prepare("SELECT * FROM receipts WHERE user_id = ? ORDER BY issued_at DESC");
$stmt->execute([$_SESSION['user_id']]);
$receipts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Welcome - LinkMusic</title>
  <link rel="icon" href="images/logo.png" type="image/png" sizes="32x32" />
  <link rel="stylesheet" href="css/style.css" />
  <script defer src="js/main.js"></script>
</head>
<body>
  <!-- Menu button -->
    <?php include 'siderTopBar.php'; ?>

  <div class="dashboard-box">
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <p>You have successfully logged in to LinkMusic.</p>
    <a href="logout.php">Logout</a>
  </div>

  <?php foreach ($receipts as $receipt): ?>
    <div class="receipt-box">
      <h4>Receipt #<?php echo $receipt['id']; ?> — <?php echo $receipt['issued_at']; ?></h4>
      <p><strong>Total Paid:</strong> $<?php echo $receipt['total_paid']; ?></p>
      <pre><?php echo htmlspecialchars($receipt['items']); ?></pre>
    </div>
  <?php endforeach; ?>

</body>
</html>
