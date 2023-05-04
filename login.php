<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve the username and password from the form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Connect to the database
  $db = new PDO('sqlite:user.db');
  
  // Prepare the SQL query to check if the username and password match
  $stmt = $db->prepare('SELECT id FROM users WHERE username = :username AND password = :password');
  $stmt->bindValue(':username', $username);
  $stmt->bindValue(':password', md5($password));
  $stmt->execute();

  // If the user is found, set the session variable and redirect to profile page
  if ($stmt->rowCount() == 1) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user_id'] = $row['id'];
    header('Location: profile.php');
    exit();
  } else {
    // If the user is not found, display an error message
    $error = "Invalid username or password";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>
  <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
  <form method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br>

    <input type="submit" value="Login">
  </form>
</body>
</html>

