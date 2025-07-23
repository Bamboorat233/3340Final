<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
$username = $_SESSION['username'];
require_once 'db_connect.php';

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
  <style>
    .dashboard-box {
      width: 500px;
      margin: 120px auto 40px;
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(10px);
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.3);
      text-align: center;
      font-family: sans-serif;
    }
    .receipt-box {
      width: 500px;
      margin: 20px auto;
      background: rgba(250, 250, 250, 0.85);
      border-left: 6px solid #5a3210;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.2);
      font-family: sans-serif;
    }
    .receipt-box h4 {
      margin-bottom: 10px;
    }
    .receipt-box pre {
      white-space: pre-wrap;
      word-break: break-word;
      font-size: 14px;
    }
    .dashboard-box a {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 24px;
      background-color: rgba(85, 41, 5, 0.8);
      color: white;
      border-radius: 6px;
      text-decoration: none;
    }
  </style>
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
