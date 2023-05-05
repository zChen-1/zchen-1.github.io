<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Connect to Cloud SQL instance
    $db_host = 'hybrid-zephyr-362606:us-central1:cpsc491project';
    $db_user = 'root';
    $db_pass = '123456';
    $db_name = 'users';

    $dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";

    try {
        $pdo = new PDO($dsn, $db_user, $db_pass);
    } catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }

    // Insert the user data into the "users" table
    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $hashed_password, PDO::PARAM_STR);
    $result = $stmt->execute();

    if ($result === false) {
        die('Error inserting data into the database: ' . $pdo->errorInfo()[2]);
    }

    // Close the database connection
    $pdo = null;

    // Redirect the user to index.html
    header('Location: index.html');
    exit;
}
?>
