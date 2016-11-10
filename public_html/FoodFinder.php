<?php
require_once('lib/fat-secret-php/src/Client.php');
require_once('lib/fat-secret-php/src/OAuthBase.php');
require_once('lib/fat-secret-php/src/FatSecretException.php');

    class FoodFinder {
        var $numberOfSearchTerms = 5;
        var $foodData1;
        var $foodData2;
        var $consumerKey;
        var $secretKey;
        var $client;

        function __construct() {
            $config = include('../config/config.php');
            $this->consumerKey = $config['consumer_key'];
            $this->secretKey = $config['secret_key'];
            $this->client = new \Adcuz\FatSecret\Client($this->consumerKey, $this->secretKey);
        }

        function runQuery($searchTerm1, $searchTerm2) {
            // Get the first item
            $searchResult = $this->client->SearchFood($searchTerm1, false, false, $this->numberOfSearchTerms);

            $foodIDs = [];
            for ($i = 0; $i < $this->numberOfSearchTerms; $i++) {
                $foodIDs[$i] = $searchResult['foods']['food'][$i]['food_id'];
            }

            for ($i = 0; $i < $this->numberOfSearchTerms; $i++) {
                $rawFoodData1 = $this->client->GetFood($foodIDs[$i]);
                $this->foodData1 = $this->getRelevantData($rawFoodData1);
            
                if ($this->foodData1['metric_serving_unit'] == 'g' || $this->foodData1['metric_serving_unit'] == 'oz') {
                    break;
                }
            }

            if ($this->foodData1['metric_serving_unit'] != 'g' && $this->foodData1['metric_serving_unit'] != 'oz') {
                $this->foodData1 = null;
            }
            
            // Get the second item
            $searchResult = $this->client->SearchFood($searchTerm2, false, false, $this->numberOfSearchTerms);
            $foodIDs = [];
            for ($i = 0; $i < $this->numberOfSearchTerms; $i++) {
                $foodIDs[$i] = $searchResult['foods']['food'][$i]['food_id'];
            }
            
            for ($i = 0; $i < $this->numberOfSearchTerms; $i++) {
                $rawFoodData2 = $this->client->GetFood($foodIDs[$i]);
                $this->foodData2 = $this->getRelevantData($rawFoodData2);
            
                if ($this->foodData2['metric_serving_unit'] == 'g' || $this->foodData2['metric_serving_unit'] == 'oz') {
                    break;
                }
            }
            if ($this->foodData2['metric_serving_unit'] != 'g' && $this->foodData2['metric_serving_unit'] != 'oz') {
                $this->foodData2 = null;
            }
        }

        function setNumberOfSearchTerms($num) {
            $this->numberOfSearchTerms = $num;
        }

        function getFoodDatas() {
            return array(
                $this->foodData1,
                $this->foodData2
            );
        }


        private function getRelevantData($rawFoodData) { // This is the case where the query contains multiple different ways of serving
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

    }

?>
