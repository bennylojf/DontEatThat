<?php 
   $title = "Results";
   include("header.php"); 
?>
<!-- Reference: http://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_table_basic&stacked=h -->
<div style="padding-left: 5%;padding-right:5%;">
   <div class="container-fluid">
      <h2>Results</h2>
      <div style="padding-top: 30px;" class="table-responsive" align="center">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>Item</th>
                  <th>Serving Size</th>
                  <th>Calories per 100 g</th>
                  <th>Fat per 100 g</th>
                  <th>Sugar per 100 g</th>
                  <th>Sodium per 100 g</th>
				  <th>Protein per 100 g</th>
				  <th>Cholesterol per 100 g</th>
				  <th>Carbohydrates per 100 g</th>
               </tr>
            </thead>
            <?php
               $resultData = include('foodquery.php');
               
               // Get NORMALIZED (to 100g) data for the first food item
               $food0amount = round($resultData[0]['metric_serving_amount']);
               $food0calories = normalizeWeight($resultData[0]['calories'], $resultData[0]);
               $food0fat = normalizeWeight($resultData[0]['fat'], $resultData[0]);
               $food0sugar = normalizeWeight($resultData[0]['sugar'], $resultData[0]);
               $food0sodium = normalizeWeight($resultData[0]['sodium'], $resultData[0]);
               $food0protein = normalizeWeight($resultData[0]['protein'], $resultData[0]);
			   $food0cholesterol = normalizeWeight($resultData[0]['cholesterol'], $resultData[0]);
			   $food0carbs = normalizeWeight($resultData[0]['carbohydrate'], $resultData[0]);

               $food1amount = round($resultData[1]['metric_serving_amount']);
               $food1calories = normalizeWeight($resultData[1]['calories'], $resultData[1]);
               $food1fat = normalizeWeight($resultData[1]['fat'], $resultData[1]);
               $food1sugar = normalizeWeight($resultData[1]['sugar'], $resultData[1]);
               $food1sodium = normalizeWeight($resultData[1]['sodium'], $resultData[1]);
               $food1protein = normalizeWeight($resultData[1]['protein'], $resultData[1]);
			   $food1cholesterol = normalizeWeight($resultData[1]['cholesterol'], $resultData[1]);
			   $food1carbs = normalizeWeight($resultData[1]['carbohydrate'], $resultData[1]);
               
			   // TODO: Maybe remove this and store it as a constant somewhere?
               $dailycalories = 2500; // kcal
               $dailyfat = 65; // g
               $dailysugar = 30; // g
               $dailysodium = 2400; // mg
			   $dailyprotein = 50; // g 
			   $dailycholesterol = 300; // mg
			   $dailycarbs = 300; // g
               
               $food0score = -($food0calories/$dailycalories) - ($food0fat/$dailyfat) - ($food0sugar/$dailysugar) - ($food0sodium/$dailysodium) 
			   - ($food0cholesterol/$dailycholesterol) + ($food0protein/$dailyprotein)+ ($food0carbs/$dailycarbs);
               $food1score = -($food1calories/$dailycalories) - ($food1fat/$dailyfat) - ($food1sugar/$dailysugar) - ($food1sodium/$dailysodium) 
			   - ($food1cholesterol/$dailycholesterol) + ($food1protein/$dailyprotein)+ ($food1carbs/$dailycarbs);
               
                // variables used to highlight a food item
               $highlight0 = "";
               $highlight1 = "";
               
                // logic to determine which food to highlight
               if ($food0score < $food1score) {
                  $highlight1 = "success";
               } else if ($food0score > $food1score) {
                  $highlight0 = "success";
               } else {
                  $highlight0 = "warning";
                  $highlight1 = "warning";
               }
               
               echo '
               <tbody>
                 <tr class='.$highlight0.'>
                   <td>' . $resultData[0]['food_name'] . '</td>
                   <td>' . $food0amount . ' ' . $resultData[0]['metric_serving_unit'] . '</td>
                   <td>' . $food0calories . ' kcal</td>
                   <td>' . $food0fat . ' g</td>
                   <td>' . $food0sugar . ' g</td>
                   <td>' . $food0sodium . ' mg</td>
				   <td>' . $food0protein . ' g</td>
				   <td>' . $food0cholesterol . ' mg</td>
				   <td>' . $food0carbs . ' g</td>
                 </tr>
               
                 <tr class='.$highlight1.'>
                   <td>' . $resultData[1]['food_name'] . '</td>
                   <td>' . $food1amount . ' ' . $resultData[1]['metric_serving_unit'] . '</td>
                   <td>' . $food1calories . ' kcal</td>
                   <td>' . $food1fat . ' g</td>
                   <td>' . $food1sugar . ' g</td>
                   <td>' . $food1sodium . ' mg</td>
				   <td>' . $food1protein . ' g</td>
				   <td>' . $food1cholesterol . ' mg</td>
				   <td>' . $food1carbs . ' g</td>
                 </tr>
               </tbody>
               ';
               
               // normalizes field to 100 grams
               function normalizeWeight($field, $resultData) {
                  $serving_amt_grams = 0;
                  if($resultData['metric_serving_unit'] == "g") {
                     $serving_amt_grams = $resultData['metric_serving_amount'];
                  }
                  else if($resultData['metric_serving_unit'] == "oz") {
                     $serving_amt_grams = $resultData['metric_serving_amount'] * 28.35;
                  }
                  else {
                     echo "unknown unit";
                  }
               
                  return round(($field / $serving_amt_grams) * 100);
               }
            ?>
         </table>
     
      </div>

   </div>
</div>
<div align="center">
   <?php
            // print out the healthier food item
            if ($food0score < $food1score) {
                echo '<p>' . $resultData[1]['food_name'] . ' is healthier than ' . $resultData[0]['food_name'] . '</p>';
            } else if ($food0score > $food1score) {
                echo '<p>' . $resultData[0]['food_name'] . ' is healthier than ' . $resultData[1]['food_name'] . '</p>';
            } else {
                echo '<p>' . $resultData[0]['food_name'] . ' is about the same as ' . $resultData[1]['food_name'] . '</p>';
            }
?>
   <a href="index.php" type="submit" class="btn btn-primary">Change Food Items</a>
</div>
<?php include "footer.php" ?>