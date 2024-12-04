<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            StepX | Cart
        </title>
        <link rel="stylesheet" href="styles/mystyles.css">
        <link rel="icon" href="img/icon.png">
        <!--<script src="js/global.js"></script>-->
        <script>
            // Increase quantity
            function increaseQuantity(rowId) {
                const qty = document.getElementById(`qty-${rowId}`);
                const subtotal = document.getElementById(`subtotal-${rowId}`);
                const price = parseFloat(document.getElementById(`price-${rowId}`).textContent.slice(1));
                qty.value = parseInt(qty.value) + 1;
                subtotal.textContent = `$${(price * parseInt(qty.value)).toFixed(2)}`;
                updateTotal();
            }

            // Decrease quantity
            function decreaseQuantity(rowId) {
                const qty = document.getElementById(`qty-${rowId}`);
                const subtotal = document.getElementById(`subtotal-${rowId}`);
                const price = parseFloat(document.getElementById(`price-${rowId}`).textContent.slice(1));
                if (parseInt(qty.value) > 1) {
                    qty.value = parseInt(qty.value) - 1;
                    subtotal.textContent = `$${(price * parseInt(qty.value)).toFixed(2)}`;
                    updateTotal();
                }
            }

            // Delete item from cart
            function deleteItem(rowId) {
                const row = document.getElementById(rowId);
                row.remove();
                updateTotal();
            }

            // Update total price
            function updateTotal() {
                const subtotals = document.querySelectorAll('.subtotal');
                let total = 0;
                subtotals.forEach(sub => {
                    total += parseFloat(sub.textContent.slice(1));
                });
                document.getElementById('totalPrice').textContent = `Total: $${total.toFixed(2)}`;
            }
        </script>
    </head>

    <body class="CartBody">
        <div class="BackgroundImage"></div> <!-- Background image container -->
        <div class="Navigation" id="navbar">
            <h1><a href="index.php">StepX</a></h1>
            <nav class="ClassForNav">
			    <?php include "nav.html"; ?>
		    </nav>
        </div>

        <div class="BoxForContents" id="box">
            <h1>Proceed to checkout?</h1>
            <div class="TableForCart">
                <table>
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="row1">
                            <td class="CatalogImg"><button onclick="window.location.href='products/air force.php'"><img src="img/air force.jpeg"></button></td>
                            <td>Air Force</td>
                            <td>
                                <button onclick="decreaseQuantity('row1')">-</button>
                                <input type="number" id="qty-row1" value="1" min="1" disabled>
                                <button onclick="increaseQuantity('row1')">+</button>
                            </td>
                            <td id="price-row1">$50.00</td>
                            <td id="subtotal-row1" class="subtotal">$50.00</td>
                            <td><button class="inputButton" onclick="deleteItem('row1')">Delete</button></td>
                        </tr>
                        <tr id="row2">
                            <td class="CatalogImg"><button onclick="window.location.href='products/samba.php'"><img src="img/adidas Samba.jpeg"></button></td>
                            <td>Samba</td>
                            <td>
                                <button onclick="decreaseQuantity('row2')">-</button>
                                <input type="number" id="qty-row2" value="2" min="1" disabled>
                                <button onclick="increaseQuantity('row2')">+</button>
                            </td>
                            <td id="price-row2">$30.00</td>
                            <td id="subtotal-row2" class="subtotal">$60.00</td>
                            <td><button class="inputButton" onclick="deleteItem('row2')">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
                <p id="totalPrice">Total: $110.00</p>
                <button class="inputButton" onclick="window.location.href='checkout.php'">Checkout</button>
            </div>
        </div>
    </body>
</html>
