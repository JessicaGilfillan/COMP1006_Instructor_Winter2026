<?php
//TODO:
require "includes/connect.php";


  //TODO:
  //1. Write a SELECT query to get all subscribers
  $sql = "SELECT * FROM subscribers ORDER BY subscribed_at DESC";//selecting all from subscribers table, ordering rows descending
  //2. Add ORDER BY subscribed_at DESC
  //3. Prepare the statement
  $stmt = $pdo->prepare($sql);//same as prepare statement in process.php, but this time it's preparing the select statement instead of the insert statement
  //4. Execute the statement
  $stmt->execute();
  //5. Fetch all results into $subscribers
  $subscribers = $stmt->fetchAll();//i guess I don't need PDO::FETCH_ASSOC as the internet hath suggested
  $pdo = null;//assuming this is good practice from todays lesson
?>
<?php include 'includes/header.php'; ?><!--using header and styles from lesson to make it look presentable-->
  <main class="container mt-4">
    <h1>Subscribers</h1>

    <?php if (count($subscribers) === 0): ?>
      <p>No subscribers yet.</p>
    <?php else: ?>
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Subscribed</th>
          </tr>
        </thead>
        <tbody>
          <!-- TODO: Loop through $subscribers and output each row -->
          <?php foreach ($subscribers as $subscriber): ?><!--for each subscriber in the subscribers array, output a table row with their data-->
            <tr>
              <td><?php echo htmlspecialchars($subscriber['id']); ?></td><!--outputting values from database to the table, in a table row, in the original order above-->
              <td><?php echo htmlspecialchars($subscriber['first_name']); ?></td>
              <td><?php echo htmlspecialchars($subscriber['last_name']); ?></td>
              <td><?php echo htmlspecialchars($subscriber['email']); ?></td>
              <td><?php echo htmlspecialchars($subscriber['subscribed_at']); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>

    <p class="mt-3">
      <a href="index.php">Back to Subscribe Form</a>
    </p>
  </main>

  <?php require "includes/footer.php"; ?><!--using footer from lesson to make it look presentable-->
</body>