<?php
require "includes/header.php";
require "includes/connect.php";

// Select everything
$sql = "SELECT * FROM orders ORDER BY created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$orders = $stmt->fetchAll();
?>

<main class="container mt-4">
  <h2>Orders</h2>

  <?php if (count($orders) === 0): ?>
    <p>No orders yet.</p>
  <?php else: ?>
    <ul>
      <?php foreach ($orders as $order): ?>
        <li class="mb-3">
          <strong>Order #<?php echo htmlspecialchars($order['id']); ?></strong><br>

          <?php echo htmlspecialchars($order['first_name']); ?>
          <?php echo htmlspecialchars($order['last_name']); ?>
          (<?php echo htmlspecialchars($order['email']); ?>)<br>
    </ul>
    <?php endforeach ?>
  <?php endif; ?>

  <p class="mt-3">
    <a href="index.php">Back to Order Form</a>
  </p>
</main>

<?php require "includes/footer.php"; ?>
