<?php
session_start();

// Change these according to your MySQL server configuration
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'my_database';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("location: welcome.php"); // Redirect to welcome page after successful login
    } else {
        echo "Invalid username or password";
    }
}

mysqli_close($conn);
?>
