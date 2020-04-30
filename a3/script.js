/* Insert your javascript here */


// SECTION FOR FUNCTIONS RELATED TO BOOKING FORM

// Variables
var SelectedMovieID = ""
var seatName = ["seats-STA", "seats-STP", "seats-STC", "seats-FCA", "seats-FCP", "seats-FCC"];
var seatOGPrice = [19.80, 17.50, 15.30, 30.00, 27.00, 24.00];
var seatDiscounted = [14.00, 12.50, 11.00, 24.00, 22.50, 21.00];
var currentQuant = [0, 0, 0, 0, 0, 0]
var subTotal = 0

// get movie title and update synopsis
document.querySelectorAll(".synopsis").forEach(item => {
    item.addEventListener("click",
        function () {
            // When user have selected a movie previously
            if (SelectedMovieID != "") {
                // Hide old movie title in booking
                document.getElementById(SelectedMovieID).setAttribute("hidden", true)
                // Hide old movie synopsis
                document.getElementById(SelectedMovieID+"synopsis").setAttribute("hidden", true)

                newSelectedMovieID = this.value
                // update movie id hidden field
                document.getElementById("movie-id").value= newSelectedMovieID
                console.log(document.getElementById("movie-id").value)
                // Unhide new movie title in booking
                document.getElementById(newSelectedMovieID).removeAttribute("hidden")
                // Unhide new movie synopsis
                document.getElementById(newSelectedMovieID+"synopsis").removeAttribute("hidden")
                SelectedMovieID = newSelectedMovieID
            }
            // When user have not selected a movie previously
            else {
                newSelectedMovieID = this.value
                // Unhide selected movie title in booking form
                document.getElementById(newSelectedMovieID).removeAttribute("hidden")
                // Unhide selected movie synopsis
                document.getElementById(newSelectedMovieID+"synopsis").removeAttribute("hidden")
                SelectedMovieID = newSelectedMovieID
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


