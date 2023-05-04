<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  // If the user is not logged in, redirect to login page
  header('Location: login.php');
  exit();
}

// Retrieve the user ID from the session variable
$user_id = $_SESSION['user_id'];

// Connect to the database
$db = new PDO('sqlite:user.db');

// Prepare the SQL query to retrieve user information using user ID
$stmt = $db->prepare('SELECT name, email FROM users WHERE id = :id');
$stmt->bindValue(':id', $user_id);
$stmt->execute();

// Fetch user information and store in variables
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$name = $row['name'];
$email = $row['email'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
</head>
<body>
  <h1>Welcome, <?php echo $name; ?>!</h1>
  <p>Your email address is: <?php echo $email; ?></p>
</body>
</html>
