/* Insert your javascript here */



// Variables
var SelectedMovieID = ""
var SelectedDayID = ""
var SelectedTimeID = ""
var seatName = ["seats-STA", "seats-STP", "seats-STC", "seats-FCA", "seats-FCP", "seats-FCC"];
var seatOGPrice = [19.80, 17.50, 15.30, 30.00, 27.00, 24.00];
var seatDiscounted = [14.00, 12.50, 11.00, 24.00, 22.50, 21.00];
var currentQuant = [0, 0, 0, 0, 0, 0]
var subTotal = 0

// Make the trailer stop playing when exit modal
$(function () {
    $('.modal').on('hidden.bs.modal', function (e) {
        $iframe = $(this).find("iframe");
        $iframe.attr("src", $iframe.attr("src"));
    });
});

// get movie title and update synopsis
document.querySelectorAll(".synopsis").forEach(item => {
    item.addEventListener("click",
        function () {
            // When user have selected a movie previously
            if (SelectedMovieID != "") {
                // Hide old movie title in booking
                document.getElementById(SelectedMovieID).setAttribute("hidden", true)
                // Hide old movie synopsis
                document.getElementById(SelectedMovieID + "synopsis").setAttribute("hidden", true)

                newSelectedMovieID = this.value
                // update movie id hidden field
                document.getElementById("movie-id").value = newSelectedMovieID
                console.log(document.getElementById("movie-id").value)
                // Unhide new movie synopsis
                document.getElementById(newSelectedMovieID + "synopsis").removeAttribute("hidden")
                SelectedMovieID = newSelectedMovieID
            }
            // When user have not selected a movie previously
            else {
                newSelectedMovieID = this.value
                // Unhide selected movie synopsis
                document.getElementById(newSelectedMovieID + "synopsis").removeAttribute("hidden")
                SelectedMovieID = newSelectedMovieID
            }
        }

    )
})

document.querySelectorAll(".date").forEach(item => {
    item.addEventListener("click",
        function () {
            // 
            if (SelectedDayID != "", SelectedTimeID != "") {
                //
                document.getElementById(SelectedDayID).setAttribute("hidden", true)
                console.log(getElementById(SelectedDayID))
                document.getElementById(SelectedDayID + "date").setAttribute("hidden", true)
                
                newSelectedDayID = this.value
                document.getElementById("movie-day").value = newSelecteDayID
                console.log(document.getElementById("movie-day").value)
                document.getElementById(newSelectedDayID).removeAttribute("hidden")
                SelectedDayID = newSelectedDayID
            }
            // 
            else {
                //
                newSelectedDayID = this.value
                document.getElementById(newSelectedDayID).removeAttribute("hidden")
                SelectedDayID = newSelectedDayID
            }
        }

    )
})

document.querySelectorAll(".time").forEach(item => {
    item.addEventListener("click",
        function () {
            // 
            if (SelectedTimeID != "") {
                //
                document.getElementById(SelectedTimeID).setAttribute("hidden", true)
                document.getElementById(SelectedTimeID + "time").setAttribute("hidden", true)

                newSelectedTimeID = this.value
                document.getElementById("movie-time").value = newSelecteDayID
                console.log(document.getElementById("movie-time").value)
                document.getElementById(newSelectedTimeID).removeAttribute("hidden")
                SelectedTimeID = newSelectedTimeID
            }
            // 
            else {
                newSelectedTimeID = this.value
                document.getElementById(newSelectedTimeID).removeAttribute("hidden")
                SelectedTimeID = newSelectedTimeID
            }
        }

    )
})

//
function toggleSynposis() {
    var showACT = document.getElementById("ACTsynopsis");
    var showAHF = document.getElementById("AHFsynopsis");
    var showRMC = document.getElementById("RMCsynopsis");
    var showANM = document.getElementById("ANMsynopsis");

    if (showACT.style.display == "block") {
        showACT.style.display = "none";
    }
    else if (showAHF.style.display == "block") {
        showAHF.style.display = "none";
    }
    else if (showRMC.style.display == "block") {
        showRMC.style.display = "none";
    }
    else if (showANM.style.display == "block") {
        showANM.style.display = "none";
    }
    else {
        showACT.style.display = "block";
        showAHF.style.display = "block";
        showRMC.style.display = "block";
        showANM.style.display = "block";
    }
}



// SECTION FOR FUNCTIONS RELATED TO BOOKING FORM

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


