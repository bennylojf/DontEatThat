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
   
	$signupname = $_POST['signup-name'];
	$signupusername = $_POST['signup-username'];
	$signuppassword = $_POST['signup-password'];
	$signupcalories = $_POST['signup-calories'];
	$signupsugar = $_POST['signup-sugar'];
	$signupsodium = $_POST['signup-sodium'];
	$signupprotein = $_POST['signup-protein'];

 $sql = " UPDATE Users SET Name = '$signupname', Username = '$signupusername', Password = '$signuppassword', Calories = '$signupcalories', Sugar = '$signupsugar', Sodium = '$signupsodium', Protein = '$signupprotein' WHERE Username = '{$_SESSION['user_username']}' ";
 
if ($conn->query($sql) === TRUE) {
	   header("Location: index.php");
  }
  else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
$conn->close();
    ?>
  


