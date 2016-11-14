<?php
ob_start();
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

$update_password = $_POST['update-password'];
$update_calories = $_POST['update-calories'];
$update_sugar    = $_POST['update-sugar'];
$update_sodium   = $_POST['update-sodium'];
$update_protein  = $_POST['update-protein'];

$current = $_SESSION['user_username'];

// If the user doesn't enter a new password,
// don't update the database with a blank password!
$error = "";
if (!empty($update_password)) {
    // CHECK if password is at least 6 characters long and contain only alphanumeric characters
    $pattern = "/^[a-zA-Z0-9]{6,}$/";

    if (!preg_match($pattern, $update_password)) {
        $error .= "errorPassword=invalid";
        header("Location: manageAccount.php?" . $error);
        exit();
    } else {
        // user entered a valid password, update password and the user's meal preferences
        $sql = " UPDATE Users SET Password = '$update_password', Calories = '$update_calories', Sugar = '$update_sugar', Sodium = '$update_sodium', Protein = '$update_protein' WHERE Username = '$current' ";
    }
} else {
    // password is empty, so only update the user's calories, sugar, sodium, protein
    $sql = " UPDATE Users SET Calories = '$update_calories', Sugar = '$update_sugar', Sodium = '$update_sodium', Protein = '$update_protein' WHERE Username = '$current' ";
}

if ($conn->query($sql) === TRUE) {
    // update user preferences
    $_SESSION['user_calories'] = $update_calories;
    $_SESSION['user_sugar']    = $update_sugar;
    $_SESSION['user_sodium']   = $update_sodium;
    $_SESSION['user_protein']  = $update_protein;
    session_write_close();
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
ob_end_flush();
?>
  
