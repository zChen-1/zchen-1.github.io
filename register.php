<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Connect to the database
    $db_user = 'root';
    $db_pass = '123456';
    $db_name = 'users';
    $cloud_sql_connection_name = 'hybrid-zephyr-362606:us-central1:cpsc491project';
    $mysqli = new mysqli(null, $db_user, $db_pass, $db_name, null, "/cloudsql/$cloud_sql_connection_name");

    if ($mysqli->connect_errno) {
        die('Failed to connect to MySQL: ' . $mysqli->connect_error);
    }

    // Insert the user data into the "users" table
    $stmt = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);
    $result = $stmt->execute();

    if ($result === false) {
        die('Error inserting data into the database: ' . $mysqli->error);
    }

    // Close the database connection
    $mysqli->close();

    // Redirect the user to index.html
    header('Location: index.html');
    exit;
}
?>
