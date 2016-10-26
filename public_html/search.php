<?php
$configs = include('../config/config.php');
$dbUsername = $configs['database_username'];
$dbPassword = $configs['database_password'];
$dbHost = $configs['host'];
$dbName = $configs['database_name'];

//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
// Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM Food WHERE Shrt_Desc LIKE '%".$searchTerm."%'");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['Shrt_Desc'];
}
//return json data
echo json_encode($data);
?>