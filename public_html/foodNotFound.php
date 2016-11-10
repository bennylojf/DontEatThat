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

            if($_SESSION['food0_id'] == 0 && $_SESSION['food1_id'] == 0) {
                echo "Sorry, we could not find " . $searchTerm1 . " or " . $searchTerm2; 
            } else if ($_SESSION['food0_id'] == 0) {
                echo "Sorry, we could not find " . $searchTerm1; 
            } else if ($_SESSION['food1_id'] == 0) {
                echo "Sorry, we could not find " . $searchTerm2; 
            } 

            echo "<br>";
            ?>

            <font face="Helvetica"><b>You will be redirected in <p style="display:inline" id="number"></p> Seconds</b>

            <script type="text/javascript">
                var targetURL="http://donteatthat.ca";
                var count = 5;
                countdown(count);

                function countdown(timer) {
                    //Keeps the interval ID for later clear
                    var intervalID;
                    intervalID = setInterval(function () {
                
                        display(timer);
                        timer = timer - 1;
                
                        if (timer < 0) {
                            clearTimeout(intervalID);

                            window.location=targetURL;
                            return;
                        }
                    }, 1000);
                }
                
                //Modifies the countdown display
                function display(timer) {
                    document.getElementById("number").innerHTML = timer;
                }
                </script>
       </div>
    </div>
</div>

<?php include "footer.php" ?>
