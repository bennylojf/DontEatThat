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
echo "Connected successfully";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    
    $myusername = mysqli_real_escape_string($conn, $_POST['login-name']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['login-password']);
    
    $sql    = "SELECT username FROM Users WHERE Username = '$myusername' and Password = '$mypassword'";
    $result = mysqli_query($conn, $sql);
    $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];
    
    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row
    
    if ($count == 1) {
        $_SESSION['login_user'] = $myusername;
       
        echo '<script type="text/javascript">
		        window.location = "http://www.donteatthat.ca"
			   </script>';
        exit();

    } else {
        $error = "Your Login Name or Password is invalid";
        echo "$error";
    }
}
?>

