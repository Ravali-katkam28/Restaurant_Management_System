<?php
$serverName = "localhost:3306";
$userName = "root";
$password = "";
$dbName = "restaurant_management_system";

try {
    // Create a connection
    $conn = new mysqli($serverName, $userName, $password, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Read values from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Store password as plain text (not recommended)

    // Insert the data into the database
    $sql = "INSERT INTO signup (Username, Email, Password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
$conn->close();
?>
