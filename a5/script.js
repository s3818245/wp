

// Update Quantity + price
function plus(whichID, price){
    var whichQty = document.getElementById(whichID + "-qty");
    var whichSubtotal = document.getElementById(whichID + "-subtotal");
    whichQty.value = Number(whichQty.value) + 1;
    var newSubtotal = (whichQty.value)*price
    console.log(whichQty.getAttribute("name") + ' quantity is ' + whichQty.value);
    console.log(whichSubtotal.getAttribute("name") + ' is:$ ' + newSubtotal);
    whichSubtotal.innerHTML = newSubtotal.toFixed(2);
}

function minus(whichID, price){
    var whichQty = document.getElementById(whichID+"-qty");
    var whichSubtotal = document.getElementById(whichID+"-subtotal");
    if (whichQty.value > 1){
        whichQty.value = Number(whichQty.value) -1;
    }
    var newSubtotal = (whichQty.value)*price
    console.log(whichQty.getAttribute("name") + ' quantity is ' + whichQty.value);
    console.log(whichSubtotal.getAttribute("name") + ' is:$ ' + newSubtotal);
    whichSubtotal.innerHTML = newSubtotal.toFixed(2);
    whichSubtotal.value = newSubtotal.toFixed(2);
}

function updateQuantity(whichID, price) {
    console.log('check quantity function');
    var whichQty = document.getElementById(whichID+"-qty");
    var whichSubtotal = document.getElementById(whichID+"-subtotal");
    var format = new RegExp("^[0-9]+$");
    if (!format.test(whichQty.value))
    {
        alert('Wrong quantity');
        return;
    } 
    var newSubtotal = (whichQty.value) * price;
    console.log(whichQty.getAttribute("name") + ' quantity is ' + whichQty.value);
    console.log(whichSubtotal.getAttribute("name") + ' is:$ ' + newSubtotal);
    whichSubtotal.innerHTML = newSubtotal.toFixed(2);
    whichSubtotal.value = newSubtotal.toFixed(2);
}

function itemTotal(){
    var itemTotal = 0
    document.querySelectorAll(".subtotal").forEach(item =>{
        itemTotal += item.value
    }
    )
}