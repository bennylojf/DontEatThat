<?php
    $title = "Results";
    include("header.php"); 
    ?>
<div style="padding-left: 5%;padding-right:5%;">
    <div class="container-fluid">
        <div style="padding-top: 30px;" align="center">
            Sorry, the items you entered were the same. Please enter two different food items. <br>
            <font face="Helvetica">
            <b>
                You will be redirected in 
                <p style="display:inline; padding:0px;" id="number"></p>
                seconds
            </b>
            <script type="text/javascript" src="js/countdown.js"></script>
        </div>
    </div>
</div>
<?php include "footer.php" ?>