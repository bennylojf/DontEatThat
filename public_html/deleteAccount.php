<?php
// THIS SCRIPT IS CALLED WHEN A USER CONFIRMS ACCOUNT DELETION IN manage_account.php
session_start();
$configs = include('../config/config.php');

// setup variables to connect to database
$username = $configs['database_username'];
$password = $configs['database_password'];
$host     = $configs['host'];
$dbname   = $configs['database_name'];

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = " DELETE FROM Users WHERE Username = '$_SESSION['user_username']' ";

if ($conn->query($sql) === TRUE) {
   session_destroy();
   header("Refresh: 3; url=http://donteatthat.ca");
   echo "<h2>Your account has been deleted from our records. You will be redirected to the home page in 3 seconds.</h2>";
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
