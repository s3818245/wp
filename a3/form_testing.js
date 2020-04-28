function getQuantity(id){
    var seatType = document.getElementById(id);
    var quantity = seatType.options[seatType.selectedIndex].value;
    return quantity
}


var seatName = ["seats-STA", "seats-STP", "seats-STC", "seats-FCA", "seats-FCP", "seats-FCC"];
var seatOGPrice = [19.80, 17.50, 15.30, 30.00, 27.00, 24.00];
var seatDiscounted = [14.00, 12.50, 11.00, 24.00, 22.50, 21.00];
var subTotal = 0
//Update total when user select option


function findIndex(whichID){
    var i;
    for (i=0; i< seatName.length; i++){
        if (seatName[i] == whichID){
            return i
        }
    }    
}

function getPrice(id){
    var seatType = document.getElementById(id);
    var quantity = seatType.options[seatType.selectedIndex].value;
    var currentTotal = document.getElementById("total-amount")
    subTotal = (parseInt(currentTotal.innerHTML) + quantity*seatOGPrice[findIndex(id)]).toFixed(2);
    currentTotal.innerHTML = subTotal
    console.log(subTotal)
}




