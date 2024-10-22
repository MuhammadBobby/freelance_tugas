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

    $email = $_POST['email'];
    $password = $_POST['passwordd'];

    // Hash the password using bcrypt
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO tbl_user(email, passwordd) VALUES ('$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        header("location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
