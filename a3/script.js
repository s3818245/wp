/* Insert your javascript here */


// SECTION FOR FUNCTIONS RELATED TO BOOKING FORM

// Variables
var movieTitleID = ""
var seatName = ["seats-STA", "seats-STP", "seats-STC", "seats-FCA", "seats-FCP", "seats-FCC"];
var seatOGPrice = [19.80, 17.50, 15.30, 30.00, 27.00, 24.00];
var seatDiscounted = [14.00, 12.50, 11.00, 24.00, 22.50, 21.00];
var currentQuant = [0, 0, 0, 0, 0, 0]
var subTotal = 0

// get movie title
document.querySelectorAll(".synopsis").forEach(item => {
    item.addEventListener("click",
        function () {
            if (movieTitleID != "") {
                document.getElementById(movieTitleID).setAttribute("hidden", true)
                newMovieTitleID = this.value
                document.getElementById(newMovieTitleID).removeAttribute("hidden")
                movieTitleID = newMovieTitleID
            }
            else {
                newMovieTitleID = this.value
                document.getElementById(newMovieTitleID).removeAttribute("hidden")
                movieTitleID = newMovieTitleID
            }
        }
    )
})

// get quantity user selected
function getselectedQuany(id) {
    var seatType = document.getElementById(id);
    var selectedQuant = seatType.options[seatType.selectedIndex].value;
    return selectedQuant
}

//Functions to update total
function findIndex(whichID) {
    var i;
    for (i = 0; i < seatName.length; i++) {
        if (seatName[i] == whichID) {
            return i
        }
    }
}

function getPrice(id) {
    var seatType = document.getElementById(id);
    var selectedQuant = seatType.options[seatType.selectedIndex].value;
    var index = findIndex(id)
    var currentTotal = document.getElementById("total-amount")
    if (selectedQuant > currentQuant[index]) {
        subTotal = (parseFloat(currentTotal.innerHTML) + (selectedQuant - currentQuant[index]) * seatOGPrice[index]).toFixed(2);
        currentTotal.innerHTML = subTotal
        currentQuant[index] = selectedQuant
        console.log(subTotal)
        console.log(currentQuant)
    }
    if (selectedQuant < currentQuant[index]) {
        subTotal = (parseFloat(currentTotal.innerHTML) - (currentQuant[index] - selectedQuant) * seatOGPrice[index]).toFixed(2);
        currentTotal.innerHTML = subTotal
        currentQuant[index] = selectedQuant
        console.log(subTotal)
        console.log(currentQuant)
    }
}


