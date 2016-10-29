<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://api.nutritionix.com/v1_1/search");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
        "appId=85d9b48b&appKey=cef6f64a7162d6c58a7d38af1a6962fd&query=friedchicken");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec ($ch);

curl_close ($ch);

print_r($response);
?>