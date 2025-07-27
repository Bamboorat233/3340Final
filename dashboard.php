<?php
session_start();
require_once 'db_connect.php';

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];

// Fetch the user's role
$stmt = $pdo->prepare("
    SELECT role
    FROM users
    WHERE id = :user_id
");
$stmt->execute(['user_id' => $user_id]);
$user_role = $stmt->fetchColumn();

// Redirect based on role
if ($user_role === 'admin') {
    header('Location: /admin_dashboard.php');
    exit;
}

// Fetch all receipts for this user, most recent first
$stmt = $pdo->prepare("SELECT * FROM receipts WHERE user_id = ? ORDER BY issued_at DESC");
$stmt->execute([$user_id]);
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
  <!-- Navigation bar / sidebar -->
  <?php include 'siderTopBar.php'; ?>

  <!-- Welcome message box -->
  <div class="dashboard-box">
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <p>You have successfully logged in to LinkMusic.</p>
    <a href="logout.php">Logout</a>
  </div>

  <!-- User receipts listing -->
  <?php foreach ($receipts as $receipt): ?>
    <div class="receipt-box">
      <h4>Receipt #<?php echo $receipt['id']; ?> — <?php echo $receipt['issued_at']; ?></h4>
      <p><strong>Total Paid:</strong> $<?php echo $receipt['total_paid']; ?></p>
      <pre><?php echo htmlspecialchars($receipt['items']); ?></pre>
    </div>
  <?php endforeach; ?>

</body>
</html>
