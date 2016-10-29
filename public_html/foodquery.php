<!DOCTYPE html>
<body>

<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://api.nutritionix.com/v1_1/search");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Get the firs thing the user entered. 
// Make sure to properly escape spaces
$searchTerm = $_GET["item1"];
$searchTerm = preg_replace('/\s+/', '', $searchTerm);

$postfields = array(
    'appId' => '85d9b48b&appKey=cef6f64a7162d6c58a7d38af1a6962fd&query=$searchTerm',
    'fields' => 'item_name%2Citem_id%2Cbrand_name%2Cnf_calories%2Cnf_total_fat' 
);

curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);


$response = curl_exec ($ch);


print $response;

print '<br>---------------------<br>';

// Now check the second item
$searchTerm = $_GET["item2"];
$searchTerm = preg_replace('/\s+/', '', $searchTerm);

curl_setopt($ch, CURLOPT_POSTFIELDS,
        "appId=85d9b48b&appKey=cef6f64a7162d6c58a7d38af1a6962fd&query=$searchTerm");

$response = curl_exec ($ch);

print $response;


curl_close ($ch);
?>

</body>

</html>
