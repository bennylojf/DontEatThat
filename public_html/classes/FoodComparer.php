<?php
/**
 * public_html/classes/FoodComparer.php
 *
 * This class is used to compare a list of Foods to see
 * which is the healthiest. A higher score means a healthier food.
 *
 * @package default
 */


namespace vendor\project;

class FoodComparer {
    // daily recommended intake
    // approximations only
    const DAILYCALORIES = 2300; // kcal
    const DAILYPROTEIN = 50; // g
    const DAILYFAT = 65; // g
    const DAILYCHOLESTEROL = 300; // mg
    const DAILYSODIUM = 2400; // mg
    const DAILYPOTASSIUM = 5000; // mg
    const DAILYFIBER = 30; // g
    const DAILYSUGAR = 30; // g
    const DAILYVITAMINA = 100; // percentage
    const DAILYVITAMINC = 100; // percentage
    const DAILYCALCIUM = 100; // percentage
    const DAILYIRON = 100; // percentage

    var $userCalories;
    var $userSugar;
    var $userSodium;
    var $userProtein;
    var $userCalcium;

    /**
     * These are the valid arguments:
     * "High" -> Use more of this field
     * "Low" -> Use less of this field
     * Any other string -> Based of the amount an average person should eat in a day
     *
     * @param string  $userCalories - Used to determine if the user wants more, less, or a normal amount of calories
     * @param string  $userSugar    - Used to determine if the user wants more, less, or a normal amount of sugar
     * @param string  $userSodium   - Used to determine if the user wants more, less, or a normal amount of sodium
     * @param string  $userProtein  - Used to determine if the user wants more, less, or a normal amount of protein
     * @param string  $userCalcium  - Used to determine if the user wants more, less, or a normal amount of calcium
     */
    function __construct( $userCalories, $userSugar, $userSodium, $userProtein, $userCalcium ) {
        $this->userCalories = $userCalories;
        $this->userSugar    = $userSugar;
        $this->userSodium   = $userSodium;
        $this->userProtein  = $userProtein;
        $this->userCalcium  = $userCalcium;
    }


    /**
     * An array with each item in $foodDatas with a 'score' field is returned
     * The higher the score, the healthier the food.
     *
     * @param array   $foodDatas           - An multidimensional array of food. Element should be an array of
     * @param bool    $useNormalizeWeights - Set this to true if you want to compare 100 grams
     * @return array - The exact same array as $foodDatas, but each item has a new field called 'score'
     */
    function getScores( $foodDatas, $useNormalizeWeights ) {

        assert(count($foodDatas) >= 1);

        // Add the score field to each foodDatas element
        foreach ($foodDatas as &$foodData) {
            $foodData['score'] = 0.0;
        }

        foreach ($foodDatas as &$foodData) {

            $calories    = $foodData['calories']; // bad
            $protein     = $foodData['protein']; // good
            $fat         = $foodData['fat']; // bad
            $cholesterol = $foodData['cholesterol']; // bad
            $sodium      = $foodData['sodium']; // bad
            $potassium   = $foodData['potassium'];
            $fiber       = $foodData['fiber'];
            $sugar       = $foodData['sugar']; // bad
            $vitamin_a   = $foodData['vitamin_a'];
            $vitamin_c   = $foodData['vitamin_c'];
            $calcium     = $foodData['calcium']; // good
            $iron        = $foodData['iron'];

            if ($useNormalizeWeights) {
                $calories    = $this->normalizeWeight($calories, $foodData['metric_serving_amount']);
                $protein     = $this->normalizeWeight($protein, $foodData['metric_serving_amount']);
                $fat         = $this->normalizeWeight($fat, $foodData['metric_serving_amount']);
                $cholesterol = $this->normalizeWeight($cholesterol, $foodData['metric_serving_amount']);
                $sodium      = $this->normalizeWeight($sodium, $foodData['metric_serving_amount']);
                $potassium   = $this->normalizeWeight($potassium, $foodData['metric_serving_amount']);
                $fiber       = $this->normalizeWeight($fiber, $foodData['metric_serving_amount']);
                $sugar       = $this->normalizeWeight($sugar, $foodData['metric_serving_amount']);
                $vitamin_a   = $this->normalizeWeight($vitamin_a, $foodData['metric_serving_amount']);
                $vitamin_c   = $this->normalizeWeight($vitamin_c, $foodData['metric_serving_amount']);
                $calcium     = $this->normalizeWeight($calcium, $foodData['metric_serving_amount']);
                $iron        = $this->normalizeWeight($iron, $foodData['metric_serving_amount']);
            }

            $caloriesScale = 1;
            $sugarScale    = 1;
            $sodiumScale   = 1;
            $proteinScale  = 1;
            $calciumScale  = 1;
			
			$scaleFactor = 10; // used to scale for user preferences

            if ($this->userCalories == "High") {
                $caloriesScale = -1*$scaleFactor;
            }

            if ($this->userCalories == "Low") {
                $caloriesScale = 1*$scaleFactor;
            }

            if ($this->userSugar == "High") {
                $sugarScale = -1*$scaleFactor;
            }

            if ($this->userSugar == "Low") {
                $sugarScale = 1*$scaleFactor;
            }

            if ($this->userSodium == "High") {
                $sodiumScale = -1*$scaleFactor;
            }

            if ($this->userSodium == "Low") {
                $sodiumScale = 1*$scaleFactor;
            }

            if ($this->userProtein == "High") {
                $proteinScale = 1*$scaleFactor;
            }

            if ($this->userProtein == "Low") {
                $proteinScale = -1*$scaleFactor;
            }

            if ($this->userCalcium == "High") {
                $calciumScale = 1*$scaleFactor;
            }

            if ($this->userCalcium == "Low") {
                $calciumScale = -1*$scaleFactor;
            }

            // This really should be done to every field.
            // However, many foods have an amount of protein
            // which is a large portion of the daily intake,
            // so they overwhelm the algorithm.
            // When the amount of protein you eat
            // approaches the daily amount, it becomes
            // less healthy. this is reflected in this variable.
            // As the amount of protein approaches the daily amount,
            // this variable approaches 0
            $proteinNormalizer = -(1.0 / FoodComparer::DAILYPROTEIN) * ($protein) + 1.0;

            $score = -($caloriesScale) * ($calories / FoodComparer::DAILYCALORIES) - ($fat / FoodComparer::DAILYFAT) - ($cholesterol / FoodComparer::DAILYCHOLESTEROL) - ($sodiumScale) * ($sodium / FoodComparer::DAILYSODIUM) - ($sugarScale) * ($sugar / FoodComparer::DAILYSUGAR) + ($potassium / FoodComparer::DAILYPOTASSIUM) + ($fiber / FoodComparer::DAILYFIBER) + ($vitamin_a / FoodComparer::DAILYVITAMINA) + ($vitamin_c / FoodComparer::DAILYVITAMINC) + ($calcium / FoodComparer::DAILYCALCIUM) + ($iron / FoodComparer::DAILYIRON)
                +($proteinNormalizer) * ($protein / FoodComparer::DAILYPROTEIN);

            $foodData['score'] = $score;
        }

        return $foodDatas;
    }

    /**
     * @param float   $field       - The field you want to normalize. This is a number. For example, number of grams of protein, or milligrams of sodium.
     * @param float   $servingSize - The serving size of the food. Eg, a banana weighs 80 grams, so you would put 80 in here.
     * @return The amount of $field per 100 grams (assuming serving size is in grams)
     */
    function normalizeWeight($field, $servingSize) {
        return round(($field / $servingSize) * 100);
    }
}

?>
