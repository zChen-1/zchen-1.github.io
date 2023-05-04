<?php
  // Connect to the database
  $conn = new SQLite3('users.db');

  // Get user input
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Insert user data into database
  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
  $conn->exec($sql);

  // Close the database connection
  $conn->close();

  // Redirect to login page
  header("Location: Login.html");
?>
