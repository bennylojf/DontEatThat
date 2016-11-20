<?php 
    $title = "How It Works";
    include("layout/header.php"); 
    ?>
<!-- Beginning of Feedback content -->
<div align="center">
    <div class="container-fluid">
        <h2>How It Works</h2>
        <p align="left" class="about-description">
            Don't Eat That! uses the FatSecret REST API, which graciously provides all the nutritional information used by this web application. 
			When you input two food products for comparison, Don't Eat That! draws the nutritional statistics of the food products from the API and displays the important statistics
			on two tables. The top table shows the nutritional statistics of 100 g portions while the bottom table shows the nutritional statistics of typically used portions.
			Similarly, two recommendations are provided. The first recommendation is based on 100 g portions, while the second recommendation is based on typically used portions. 
		</p>
		<p align="left" class="about-description">
			These recommendations are made using an algorithm based on recommended daily values for calories, carbohydrates, protein, fat, cholesterol, sodium, potassium, fiber,
			sugar, Vitamin A, Vitamin C, calcium, and iron. The algorithm aims to produce a recommendation that is low in sodium, sugar, fat, and calories. The algorithm can be customized
			by the user to recommend foods that best fit the user's needs. 
		</p>
    </div>
</div>
<!-- End of Feedback content -->
<?php include "layout/footer.php" ?>
