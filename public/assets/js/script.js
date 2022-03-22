
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
    // $.ajax({
    //     type: "POST",
    //     url: "/../../func/update_quantity.php",
    //     data: $(quantities),
    //     success: function() {
    //         console.log(quantities);
    //     }
    // });
}

$("#productForm").validate({
    rules: {
        productName: {
            required: true
        },
        stock: {
            required: true
        },
        price: {
            required: true
        },
        details: {
            required: true
        },
        image: {
            required: false
        }
    }
});

$("#signUp").validate({
    rules: {
        username: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        password: {
            required: true
        }
    }
});

$("#login").validate({
    rules: {
        username: {
            required: true
        },
        password: {
            required: true
        }
    }
});

$("#submitOrder").validate({
    rules: {
        address: {
            required: true
        },
        street: {
            required: true
        },
        zipcode: {
            required: true
        }
    }
});


