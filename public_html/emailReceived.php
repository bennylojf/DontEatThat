<?php 
   $title = "Contact";
   include("header.php"); 
?>


<div style="padding-left: 5%;padding-right:5%;">
   <div class="container-fluid">
        <div style="padding-top: 30px;" align="center">
        
            <h2>Thank you for your email.</h2>

            <font face="Helvetica"><b>You will be redirected in <p style="display:inline" id="number"></p> Seconds</b>

            <script type="text/javascript">
                var targetURL="http://donteatthat.ca";
                var count = 5;
                countdown(count);

                function countdown(timer) {
                    //Keeps the interval ID for later clear
                    var intervalID;
                    display(timer);
                    intervalID = setInterval(function () {
                
                        timer = timer - 1;
                        display(timer);
                
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
