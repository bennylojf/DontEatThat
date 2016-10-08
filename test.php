<!DOCTYPE html>
<html>
<body>

<?php

$username = "group14";
$password = "Cpen&321";
$host = "localhost";
$table = "Food";

$con = new mysqli("$host", "$username", "$password", "$table");

// if we don't connect
if(mysqli_connect_errno())
{
    echo "Failed to connect to food database" . mysqli_connect_error();
}

// if we connect
if(mysqli_ping($con))
{
    echo nl2br("Connection to food database OK\n");
}

else
{
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);

?>

</body>
</html>
