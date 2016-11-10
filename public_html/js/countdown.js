var targetURL="http://donteatthat.ca";
var count = 5;
countdown(count);

function countdown(timer) {
    //Keeps the interval ID for later clear
    var intervalID;
    display(timer);
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
