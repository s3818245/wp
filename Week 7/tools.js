function calculatePrice() {
    alert("Calculate Price");
}

function calculatePrice2() {
    alert("Calculate Price 2");
}        

function clickP3() {
    alert("P3 Clicked")
}

var myButton = document.getElementById("price2");
myButton.onclick = calculatePrice2;

var myButton = document.getElementById("price3");
myButton.addEventListener("click", calculatePrice);
myButton.addEventListener("click", calculatePrice2);

var myButton = document.getElementById("p3");
myButton.addEventListener("click", clickP3, true);

function checkInput(){
    var patt = /^Steve [a-zA-Z]+$/;
    name = document.getElementById("text1").value;
    if (patt.test(name))
        alert("Good")
    else
        alert("Try again")    
}