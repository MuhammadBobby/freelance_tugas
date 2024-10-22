<?php
$servername = "localhost";
$username = 'root';
$password = '';
$mydb = "dbbilliard";

// Create connection
$conn = new mysqli($servername, $username, $password, $mydb);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['passwordd']);
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO tbl_user (email, passwordd) VALUES ('$email', '$hashedPassword')";

if ($conn->query($sql) === TRUE) {
    header("location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>