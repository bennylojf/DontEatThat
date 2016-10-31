<?php 

require_once('../lib/fat-secret-php/src/Client.php');
require_once('../lib/fat-secret-php/src/OAuthBase.php');
require_once('../lib/fat-secret-php/src/FatSecretException.php');
require_once('../config/config.php');

$consumer_key = "e8f1ee8aeb2640d2831349c9e2d63334"; 
$secret_key = "68a6ee2e74034474a625a5dfdf2546d1"; 

$searchTerm1 = $_GET['item1'];
$searchTerm2 = $_GET['item2'];

$client = new \Adcuz\FatSecret\Client($consumer_key, $secret_key);

// Get data from first search term:
$searchResult = $client->SearchFood($searchTerm1, false, false, 1);

$foodID = $searchResult["foods"]["food"]["food_id"];

$rawFoodData = $client->GetFood($foodID);

$foodData1 = getRelevantData($rawFoodData);

// Get data from second search term:
$searchResult = $client->SearchFood($searchTerm2, false, false, 1);

$foodID = $searchResult["foods"]["food"]["food_id"];

$rawFoodData = $client->GetFood($foodID);

$foodData2 = getRelevantData($rawFoodData);

var_dump($foodData1);
echo "<br>";
var_dump($foodData2);

function getRelevantData($rawFoodData) {
    return array(
        "food_id" => $rawFoodData["food"]["food_id"],
        "food_name" => $rawFoodData["food"]["food_name"],
        "metric_serving_unit" => $rawFoodData["food"]["servings"]["serving"][0]["metric_serving_unit"],
        "metric_serving_amount" => $rawFoodData["food"]["servings"]["serving"][0]["metric_serving_amount"],
        "cholesterol" => $rawFoodData["food"]["servings"]["serving"][0]["cholesterol"],
        "calories" => $rawFoodData["food"]["servings"]["serving"][0]["calories"],
        "fat" => $rawFoodData["food"]["servings"]["serving"][0]["fat"],
        "protein" => $rawFoodData["food"]["servings"]["serving"][0]["protein"],
        "sodium" => $rawFoodData["food"]["servings"]["serving"][0]["sodium"],
        "carbohydrate" => $rawFoodData["food"]["servings"]["serving"][0]["carbohydrate"]
    );
}

?>
