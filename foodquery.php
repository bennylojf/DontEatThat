<?php
// Reference: http://www.w3schools.com/php/php_mysql_select.asp
$username = "group14";
$password = "Cpen&321";
$host = "localhost";
$dbname = "Food";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Name, Sugar, Salt, Fat FROM foods";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Food: " . $row["Name"]. ", Sugar: " . $row["Sugar"]. ", Salt: " . $row["Salt"]. ", Fat: " . $row["Fat"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>