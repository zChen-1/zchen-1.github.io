<?php
  // Start a session
  session_start();

  // Connect to the database
  $conn = new SQLite3('users.db');

  // Get user input
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query the database for the user's credentials
  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = $conn->query($sql);

  // If the query returns a row, the login is successful
  if ($result->numColumns() == 1) {
    // Set session variable to remember the user's login status
    $_SESSION['username'] = $username;

    // Redirect to the dashboard or home page
    header("Location: dashboard.php");
  } else {
    // If the query returns no rows, the login is unsuccessful
    echo "Invalid username or password.";
  }

  // Close the database connection
  $conn->close();
?>
