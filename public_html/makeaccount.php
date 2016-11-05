<?php
$configs = include('../config/config.php');

// Reference: https://www.tutorialspoint.com/php/php_mysql_login.htm
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
//echo "Connected successfully"; 

$signupname = $_POST['signup-name'];
$signupusername = $_POST['signup-username'];
$signuppassword = $_POST['signup-password'];
$signupcalories = $_POST['signup-calories'];
$signupsugar = $_POST['signup-sugar'];
$signupsodium = $_POST['signup-sodium'];
$signupprotein = $_POST['signup-protein'];

$sql = "INSERT INTO Users (Name, Username, Password, Calories, Sugar, Sodium, Protein)
VALUES ('$signupname', '$signupusername', '$signuppassword', '$signupcalories', '$signupsugar', '$signupsodium', '$signupprotein')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
