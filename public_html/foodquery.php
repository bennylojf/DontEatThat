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

if($input1 != '') {
    $sql1 = "SELECT Shrt_Desc, Sugar_Tot_g, Sodium_mg, Cholestrl_mg FROM Food WHERE Shrt_Desc LIKE '%$input1%'";
    $result = $conn->query($sql1);
    
    if ($result->num_rows > 0) {
        // output data of each row
        $numitems = 1;
        $totalSugar_g = 0;
        $totalSalt_mg = 0;
        $totalCholestrl_mg = 0;

        while($row = $result->fetch_assoc()) {
            if($row['Sugar_Tot_g'] != null) {
                $totalSugar_g = $totalSugar_g + $row['Sugar_Tot_g'];
            }
            if($row['Sodium_mg'] != null) {
                $totalSalt_mg = $totalSalt_mg + $row['Sodium_mg'];
            }
            if($row['Cholestrl_mg'] != null) {
                $totalCholestrl_mg = $totalCholestrl_mg + $row['Cholestrl_mg'];
            }

            $numitems = $numitems + 1;
        }

        $averageSugar_g = $totalSugar_g / $numitems;
        $averageSalt_mg = $totalSalt_mg / $numitems;
        $averageCholestrl_mg = $totalCholestrl_mg / $numitems;

        echo "Food: " . $input1 . ", Sugar: " . $averageSugar_g. ", Salt: " . $averageSalt_mg. ", Cholesterol: " . $averageCholestrl_mg. "<br>";
    } 
    
    else {
        echo "0 results" . "<br>";
    }
} 

else {
    echo "Enter a food <br>";
}

echo "-----------------------------------<br>";

if($input2 != '') {
    $sql2 = "SELECT Shrt_Desc, Sugar_Tot_g, Sodium_mg, Cholestrl_mg FROM Food WHERE Shrt_Desc LIKE '%$input2%'";
    $result = $conn->query($sql2);
    
    if ($result->num_rows > 0) {
        // output data of each row
        $numitems = 1;
        $totalSugar_g = 0;
        $totalSalt_mg = 0;
        $totalCholestrl_mg = 0;

        while($row = $result->fetch_assoc()) {
            if($row['Sugar_Tot_g'] != null) {
                $totalSugar_g = $totalSugar_g + $row['Sugar_Tot_g'];
            }
            if($row['Sodium_mg'] != null) {
                $totalSalt_mg = $totalSalt_mg + $row['Sodium_mg'];
            }
            if($row['Cholestrl_mg'] != null) {
                $totalCholestrl_mg = $totalCholestrl_mg + $row['Cholestrl_mg'];
            }

            $numitems = $numitems + 1;
        }

        $averageSugar_g = $totalSugar_g / $numitems;
        $averageSalt_mg = $totalSalt_mg / $numitems;
        $averageCholestrl_mg = $totalCholestrl_mg / $numitems;

        echo "Food: " . $input2 . ", Sugar: " . $averageSugar_g. ", Salt: " . $averageSalt_mg. ", Cholesterol: " . $averageCholestrl_mg. "<br>";
    } 
    
    else {
        echo "0 results" . "<br>";
    }
} 

else {
    echo "Enter a food <br>";
}

$conn->close();
?>

</body>

</html>
