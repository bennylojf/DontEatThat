<!DOCTYPE html>
<body>

<?php

$configs = include('../config/config.php');

// Reference: http://www.w3schools.com/php/php_mysql_select.asp
$username = $configs['database_username'];
$password = $configs['database_password'];
$host = $configs['host'];
$dbname = $configs['database_name'];

$input1 = $_GET["item1"];
$input2 = $_GET["item2"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Shrt_Desc, Sugar_Tot_g, Sodium_mg, Cholestrl_mg FROM Food WHERE (Shrt_Desc = '$input1' OR Shrt_Desc = '$input2')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Food: " . $row["Shrt_Desc"]. ", Sugar: " . $row["Sugar_Tot_g"]. ", Salt: " . $row["Sodium_mg"]. ", Cholesterol: " . $row["Cholestrl_mg"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</body>

</html>
