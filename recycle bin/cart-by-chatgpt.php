<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StepX | Advanced Cart</title>
    <link rel="stylesheet" href="styles/mystyles.css">
    <link rel="icon" href="img/icon.png">
    <script src="js/global.js"></script>
    <style>
        /* Add some advanced styling */
        .CartBody {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
        }
        .CartTable {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        .CartTable th, .CartTable td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        .CartTable th {
            background-color: #efefef;
        }
        .ToastNotification {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #333;
            color: #fff;
            padding: 15px;
            border-radius: 5px;
            animation: fadeInOut 4s ease-in-out;
        }
        @keyframes fadeInOut {
            0%, 100% { opacity: 0; transform: translateY(10px); }
            10%, 90% { opacity: 1; transform: translateY(0); }
        }
        .RelatedProducts {
            margin: 20px 0;
            display: flex;
            justify-content: space-around;
            gap: 20px;
        }
        .ProductCard {
            padding: 10px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .ProductCard img {
            width: 100px;
            height: auto;
        }
        .ProductCard:hover {
            transform: translateY(-5px);
        }
        .Button {
            background: #007bff;
            color: #fff;
            padding: 8px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .Button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body class="CartBody">
    <div class="BackgroundImage"></div>
    <div class="Navigation" id="navbar">
        <h1><a href="index.php">StepX</a></h1>
        <nav class="ClassForNav">
            <a href="login.php">Login</a>
            <a href="categories.php">Categories</a>
            <a href="catalog.php">Catalog</a>
            <a href="about.php">About Us</a>
            <a href="cart.php">Cart</a>
            <button onclick="DarkMode()" class="Button">🌗 Toggle Dark Mode</button>
        </nav>
    </div>

    <div class="BoxForContents">
        <h1>Your Cart</h1>
        <table class="CartTable">
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
            <tbody id="cartItems">
                <!-- Cart items dynamically rendered here -->
            </tbody>
        </table>
        <p id="totalPrice">Total: $0.00</p>
        <button class="Button" onclick="proceedToCheckout()">Proceed to Checkout</button>
        <div id="emptyCartMessage" hidden>
            <h2>Your cart is empty!</h2>
            <div class="RelatedProducts">
                <div class="ProductCard">
                    <img src="img/air force.jpeg" alt="Air Force">
                    <p>Air Force</p>
                    <button class="Button" onclick="addToCart('Air Force', 50, 'img/air force.jpeg')">Add to Cart</button>
                </div>
                <div class="ProductCard">
                    <img src="img/adidas Samba.jpeg" alt="Samba">
                    <p>Samba</p>
                    <button class="Button" onclick="addToCart('Samba', 30, 'img/adidas Samba.jpeg')">Add to Cart</button>
                </div>
                <div class="ProductCard">
                    <img src="img/adidas Stan Smith.jpeg" alt="Stan Smith">
                    <p>Stan Smith</p>
                    <button class="Button" onclick="addToCart('Stan Smith', 40, 'img/adidas Stan Smith.jpeg')">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <div id="toast" class="ToastNotification"></div>

    <script>
        const cart = JSON.parse(localStorage.getItem('cart')) || [];

        function renderCart() {
            const cartItems = document.getElementById('cartItems');
            const totalPrice = document.getElementById('totalPrice');
            cartItems.innerHTML = '';
            let total = 0;

            if (cart.length === 0) {
                document.getElementById('emptyCartMessage').hidden = false;
                totalPrice.textContent = '';
                return;
            }

            document.getElementById('emptyCartMessage').hidden = true;

            cart.forEach((item, index) => {
                const subtotal = item.price * item.quantity;
                total += subtotal;

                cartItems.innerHTML += `
                    <tr>
                        <td><img src="${item.image}" alt="${item.name}" style="width: 50px;"></td>
                        <td>${item.name}</td>
                        <td>
                            <button onclick="updateQuantity(${index}, -1)">-</button>
                            ${item.quantity}
                            <button onclick="updateQuantity(${index}, 1)">+</button>
                        </td>
                        <td>$${item.price.toFixed(2)}</td>
                        <td class="subtotal">$${subtotal.toFixed(2)}</td>
                        <td><button class="Button" onclick="removeItem(${index})">Remove</button></td>
                    </tr>
                `;
            });

            totalPrice.textContent = `Total: $${total.toFixed(2)}`;
        }

        function updateQuantity(index, change) {
            cart[index].quantity += change;

            if (cart[index].quantity < 1) cart[index].quantity = 1;

            saveCart();
            renderCart();
        }

        function removeItem(index) {
            cart.splice(index, 1);
            saveCart();
            renderCart();
        }

        function saveCart() {
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        function addToCart(name, price, image) {
            const existing = cart.find(item => item.name === name);
            if (existing) {
                existing.quantity += 1;
            } else {
                cart.push({ name, price, image, quantity: 1 });
            }

            showToast(`${name} added to cart!`);
            saveCart();
            renderCart();
        }

        function showToast(message) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.style.display = 'block';
            setTimeout(() => { toast.style.display = 'none'; }, 4000);
        }

        function proceedToCheckout() {
            if (cart.length === 0) {
                showToast('Your cart is empty!');
                return;
            }

            alert('Proceeding to checkout...');
        }

        renderCart();
    </script>
</body>
</html>
