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
   
	$signuppassword = $_POST['signup-password'];
	$signupcalories = $_POST['signup-calories'];
	$signupsugar = $_POST['signup-sugar'];
	$signupsodium = $_POST['signup-sodium'];
	$signupprotein = $_POST['signup-protein'];
	
	$current = $_SESSION['user_username'];

 $sql = " UPDATE Users SET Password = '$signuppassword', Calories = '$signupcalories', Sugar = '$signupsugar', Sodium = '$signupsodium', Protein = '$signupprotein' WHERE Username = '$current' ";
 
if ($conn->query($sql) === TRUE) {
	    $_SESSION['user_calories'] = $signupcalories; 
		$_SESSION['user_sugar'] = $signupsugar;
		$_SESSION['user_sodium'] = $signupsodium; 
		$_SESSION['user_protein'] = $signupprotein; 
        session_write_close();
	   header("Location: index.php");
  }
  else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
$conn->close();
    ?>
  


