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
            <br><br>
            These recommendations are made using an algorithm based on recommended daily values for calories, carbohydrates, protein, fat, cholesterol, sodium, potassium, fiber,
            sugar, Vitamin A, Vitamin C, calcium, and iron. During the planning phase of this project, much research about recommended eating habits was performed to help us develop 
            the most accurate recommendation algorithm possible. We consulted the following sources: <br><br>
            1) https://www.eatforhealth.gov.au/food-essentials/fat-salt-sugars-and-alcohol <br>
            2) https://health.gov/dietaryguidelines/dga2005/healthieryou/html/chapter8.html <br>
            3) https://www.healthychildren.org/English/healthy-living/nutrition/Pages/Fat-Salt-and-Sugar-Not-All-Bad.aspx <br>
            4) http://www.albertahealthservices.ca/assets/Infofor/hp/if-hp-ed-cdm-ns-3-1-3-food-drink-high-cal-fat-sugar-salt.pdf <br>
            5) https://www.healthlinkbc.ca/healthy-eating/high-potassium <br>
            <br>
            The above sources recommended diets low in fat, salt, cholesterol, and sugar, but high in protein, iron, fiber, and vitamins. Our system reflects
            these recommendations and tries to produce a recommendation that is low in sodium, sugar, fat, and calories, but high in protien, iron, fiber, and vitamins. 
			The algorithm can be customized by the user to recommend foods that best fit the user's needs. 
        </p>
    </div>
</div>
<!-- End of Feedback content -->
<?php include "layout/footer.php" ?>
