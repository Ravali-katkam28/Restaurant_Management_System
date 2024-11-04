<?php
$serverName = "localhost:3306";
$userName = "root";
$password = "";
$dbName = "restaurant_management_system";

// Establish database connection
$conn = new mysqli($serverName, $userName, $password, $dbName);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form data
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare the SQL statement
$sql = $conn->prepare("SELECT * FROM signup WHERE email = ? AND password = ?");
$sql->bind_param("ss", $email, $password);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    // Start a session if login is successful
    session_start();
    $_SESSION['email'] = $email;

    // Redirect to homepage
    header("Location: index.html");
    exit();
} else {
    // Login failed
    echo "Invalid email or password.";
}

$conn->close();
?>
