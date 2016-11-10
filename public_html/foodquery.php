<?php 
session_start();

require_once('lib/fat-secret-php/src/Client.php');
require_once('lib/fat-secret-php/src/OAuthBase.php');
require_once('lib/fat-secret-php/src/FatSecretException.php');
$config = include('../config/config.php');

$consumer_key = $config['consumer_key']; 
$secret_key = $config['secret_key'];

$searchTerm1 = $_GET['item1'];
$searchTerm2 = $_GET['item2'];
$_SESSION['item1'] = $searchTerm1;
$_SESSION['item2'] = $searchTerm2;

$client = new \Adcuz\FatSecret\Client($consumer_key, $secret_key);

$numberOfSearchTerms = 5;

// Get the first item
$searchResult = $client->SearchFood($searchTerm1, false, false, $numberOfSearchTerms);

$foodIDs = [];

for ($i = 0; $i < $numberOfSearchTerms; $i++) {
    $foodIDs[$i] = $searchResult['foods']['food'][$i]['food_id'];
}

for ($i = 0; $i < $numberOfSearchTerms; $i++) {
    $rawFoodData1 = $client->GetFood($foodIDs[$i]);
    $foodData1 = getRelevantData($rawFoodData1);

    if ($foodData1['metric_serving_unit'] == 'g' || $foodData1['metric_serving_unit'] == 'oz') {
        break;
    }
}
if ($foodData1['metric_serving_unit'] != 'g' && $foodData1['metric_serving_unit'] != 'oz') {
    $foodData1 = null;
}
// Get the second item
$searchResult = $client->SearchFood($searchTerm2, false, false, $numberOfSearchTerms);

$foodIDs = [];

for ($i = 0; $i < $numberOfSearchTerms; $i++) {
    $foodIDs[$i] = $searchResult['foods']['food'][$i]['food_id'];
}

for ($i = 0; $i < $numberOfSearchTerms; $i++) {
    $rawFoodData2 = $client->GetFood($foodIDs[$i]);
    $foodData2 = getRelevantData($rawFoodData2);

    if ($foodData2['metric_serving_unit'] == 'g' || $foodData2['metric_serving_unit'] == 'oz') {
        break;
    }
}
if ($foodData2['metric_serving_unit'] != 'g' && $foodData2['metric_serving_unit'] != 'oz') {
    $foodData2 = null;
}
// Return the data as an associative array
return array(
    $foodData1,
    $foodData2
);


function getRelevantData($rawFoodData) {
    // This is the case where the query contains multiple different ways of serving
    // Eg, for fried chicken, yeild after cooking, bones removed, sliced, with bone, etc
    if ($rawFoodData["food"]["servings"]["serving"][0] !== null) {
        return array(
            "food_id" => $rawFoodData["food"]["food_id"],
            "food_name" => $rawFoodData["food"]["food_name"],
            "metric_serving_unit" => $rawFoodData["food"]["servings"]["serving"][0]["metric_serving_unit"],
            "metric_serving_amount" => $rawFoodData["food"]["servings"]["serving"][0]["metric_serving_amount"],
            "cholesterol" => $rawFoodData["food"]["servings"]["serving"][0]["cholesterol"], //mg
            "calories" => $rawFoodData["food"]["servings"]["serving"][0]["calories"], // kcal
            "fat" => $rawFoodData["food"]["servings"]["serving"][0]["fat"], // grams
            "protein" => $rawFoodData["food"]["servings"]["serving"][0]["protein"], // grams
            "sodium" => $rawFoodData["food"]["servings"]["serving"][0]["sodium"], // mg
            "carbohydrate" => $rawFoodData["food"]["servings"]["serving"][0]["carbohydrate"], // grams
            "sugar" => $rawFoodData["food"]["servings"]["serving"][0]["sugar"] // grams
        );
    } 
    // In this case, there is only one serving_description
    else {
        return array(
            "food_id" => $rawFoodData["food"]["food_id"],
            "food_name" => $rawFoodData["food"]["food_name"],
            "metric_serving_unit" => $rawFoodData["food"]["servings"]["serving"]["metric_serving_unit"],
            "metric_serving_amount" => $rawFoodData["food"]["servings"]["serving"]["metric_serving_amount"],
            "cholesterol" => $rawFoodData["food"]["servings"]["serving"]["cholesterol"], //mg
            "calories" => $rawFoodData["food"]["servings"]["serving"]["calories"], // kcal
            "fat" => $rawFoodData["food"]["servings"]["serving"]["fat"], // grams
            "protein" => $rawFoodData["food"]["servings"]["serving"]["protein"], // grams
            "sodium" => $rawFoodData["food"]["servings"]["serving"]["sodium"], // mg
            "carbohydrate" => $rawFoodData["food"]["servings"]["serving"]["carbohydrate"], // grams
            "sugar" => $rawFoodData["food"]["servings"]["serving"]["sugar"] // grams
        );

    }
}

?>
