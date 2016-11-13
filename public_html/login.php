<?php
session_start();
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
// echo "Connected successfully";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    
    $myusername = mysqli_real_escape_string($conn, $_POST['login-name']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['login-password']);
    
    $sql    = " SELECT Username, Name, Calories, Sugar, Sodium, Protein FROM 
	Users WHERE Username = '$myusername' AND Password = '$mypassword' "; // get the user's preferences
    $result = mysqli_query($conn, $sql);
    $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count  = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, a table row exists
    
    if ($count == 1) {
        $_SESSION['user_name']     = $row['Name'];
        $_SESSION['user_username'] = $row['Username'];
        $_SESSION['user_calories'] = $row['Calories'];
        $_SESSION['user_sugar']    = $row['Sugar'];
        $_SESSION['user_sodium']   = $row['Sodium'];
        $_SESSION['user_protein']  = $row['Protein'];
        session_write_close();
        header("Location: index.php");
        exit();
    } else {
        header("Location: index.php");
    }
}
?>
