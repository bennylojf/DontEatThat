<?php
$title = "Results";
include("header.php");
?>

<div style="padding-left: 5%;padding-right:5%;">
   <div class="container-fluid">
        <div style="padding-top: 30px;" align="center">
        
            <?php
$searchTerm1 = $_SESSION['item1'];
$searchTerm2 = $_SESSION['item2'];

if ($_SESSION['food0_id'] == 0 && $_SESSION['food1_id'] == 0) {
    echo "Sorry, we could not find " . $searchTerm1 . " or " . $searchTerm2;
} else if ($_SESSION['food0_id'] == 0) {
    echo "Sorry, we could not find " . $searchTerm1;
} else if ($_SESSION['food1_id'] == 0) {
    echo "Sorry, we could not find " . $searchTerm2;
}

echo "<br>";
?>

            <font face="Helvetica"><b>You will be redirected in <p style="display:inline; padding:0px;" id="number"></p> seconds</b>

            <script type="text/javascript" src="js/countdown.js">
            </script>
       </div>
    </div>
</div>

<?php
include "footer.php";
?>
