
function updateCart() {

    // Get the quantities
    let quantities = [];
    document.querySelectorAll(".quantity").forEach(function (element) {
        let quantity = element.value;
            quantities.push(quantity);    
    });

    // Get the prices
    let prices = [];
    document.querySelectorAll(".price").forEach(function (item) {
        let price = item.innerHTML;
        prices.push(price);
    });

    // Multiply the quantities * price arrays
    let totals = [];
    for (let i = 0; i < Math.min(quantities.length, prices.length); i++) {
        totals[i] = quantities[i] * prices[i];
    }

    // Get sum of array items = Subtotal
    let subtotal = 0;
    for (let i = 0; i < totals.length; i++) {
        subtotal += totals[i];
    }

    // Display new Subtotal
    document.getElementById("subtotal").innerHTML = subtotal;

    // console.log(quantities);

    // JQuery Ajax Request
    $.ajax({
        type: "POST",
        url: "/func/update_quantity.php",
        data: $(quantities),
        success: function() {
            console.log(quantities);
        }
    });
}


