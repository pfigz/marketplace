
function updateCart() {

    // Get the product ids in an array
    let productIds = [];
    document.querySelectorAll(".productID").forEach(function (element) {
        let id = element.value;
            productIds.push(id);
            return productIds;
    });

    // Get the product quantities from shopping cart in an array
    let quantities = [];
    document.querySelectorAll(".quantity").forEach(function (element) {
        let quantity = element.value;
            quantities.push(quantity);    
    });

    // Get the product prices in an array
    let prices = [];
    document.querySelectorAll(".price").forEach(function (item) {
        let price = item.innerHTML;
        prices.push(price);
    });

    // Multiply the quantities * prices arrays
    let totals = [];
    for (let i = 0; i < Math.min(quantities.length, prices.length); i++) {
        totals[i] = quantities[i] * prices[i];
    }

    // Get sum of totals array items
    let subtotal = 0;
    for (let i = 0; i < totals.length; i++) {
        subtotal += totals[i];
    }

    // Display new Subtotal
    document.getElementById("subtotal").innerHTML = subtotal;

    // Map a new object using productIds and updated quantities
    function updatedQuantities(productIds, quantities) {
        if (productIds.length != quantities.length || productIds.length == 0 || quantities.length == 0) {
            return null;
        }
        let updatedArray = {};

        productIds.forEach((k, i) => {updatedArray[k] = quantities[i]})
        return updatedArray;
    }

    // Set new object as variable to be passed in Ajax request
    let newQuantities = updatedQuantities(productIds, quantities);

    // JQuery Ajax Request
    $.ajax({
        type: "POST",
        url: "/../../func/update_quantity.php",
        dataType: 'json',
        data: newQuantities,
        success: function() {
        }
    });
}




