<!DOCTYPE html>

<html>

<body>

<?php
$servername = "localhost";
$username = "group14";
$password = "Cpen&321";
$databasename = "Food";

// create connection
$conn = new mysqli("$servername", "$username", "$password", "$databasename");

// check connection
if ($conn -> connect_error) {
    die ("connection failed: " .$conn -> connect_error);
}

$sql = "SELECT * FROM `foods`";

$result = $conn -> query($sql);

if ($result -> num_rows > 0) {
    echo "<table><tr><th>Name</th><th>Sugar</th>";
        while($row = $result -> fetch_assoc()) {
            echo "<tr><td>" .$row["Name"] . "</td><td>" . $row["Sugar"] . "</td></tr>";
        }
    echo "</table>";
} 
else {
    echo "0 results";
}

$conn -> close();

?>

</body>

</html>
