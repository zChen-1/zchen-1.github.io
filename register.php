<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Connect to the database
  $conn = new SQLite3('users.db');

  // Get user input
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Hash the password for security
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Insert the user data into the "users" table
  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
  $result = $conn->query($sql);

  // Close the database connection
  $conn->close();

  // Redirect the user to index.html
  header('Location: index.html');
  exit;
}
?>
