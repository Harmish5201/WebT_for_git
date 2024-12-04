<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Gazelle
    </title>
    <link rel="stylesheet" href="../styles/ProductStyles.css">
    <link rel="stylesheet" href="../styles/mystyles.css">
    <link rel="icon" href="../img/icon.png">
    <script src="../js/global.js"></script>
</head>

<body class="ProductBody">
    <div class="BackgroundImage"></div> <!-- Background image container -->
    <div class="Navigation" id="navbar">
        <h1><a href="../index.php" class="homeLink">StepX</a></h1>
        <div class="ClassForNav">

            <!-- Hidden when widht > 480px -->
            <div class="ListForNav">
                <img src="../img/icon.png" style="display: none;" onload="checkDarkMode()"> <!--Dummy image load-->
                <select id="navSelect" onchange="navigateToPage()">
                    <option value="" hidden style="text-align: right;">Goto</option>
                    <option value="../login.php">Login</option>
                    <option value="../categories.php">Categories</option>
                    <option value="../catalog.php">Catalog</option>
                    <option value="../about.php">About Us</option>
                    <option value="../cart.php">Cart</option>
                </select>
            </div>


            <table class="TableForNav">
                <tr>
                    <td><a href="../login.php">Login</a></td>
                    <td><a href="../catalog.php">Catalog</a></td>
                    <td><a href="../cart.php">Cart</a></td>
                    <td><button onclick="DarkMode()" class="inputButton ToggleDarkModeButton">🌗</button></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="BoxForContents" id="box">
        <h2>GAZELLE</h2>
        <table class="ProductTable">
            <tr>
                <td class="ProductImg">
                    <div id="productSlider">
                        <div id="sliderWrapper">
                            <img src="../img/adidas Gazelle.jpeg" alt="adidas Gazelle 1">
                            <img src="../img/adidas Gazelle 2.jpeg" alt="adidas Gazelle 2">
                        </div>
                        <button id="prevBtn" onclick="scrollPrevImg()">❮</button>
                        <button id="nextBtn" onclick="scrollNextImg()">❯</button>
                    </div>
                </td>
                
                <td class="ProductInfo">A TIMELESS SNEAKER WITH CASUAL STYLE FOR EVERY DAY<br>
                    Originally designed as an indoor shoe, the adidas Gazelle has become a timeless must-have in
                    streetwear. With an upper made of high-quality, soft suede and muted colors, the classic sneaker
                    goes perfectly with any outfit. Whether you're running errands or meeting up with friends, this
                    retro design pays homage to the adidas archives and adds a stylish touch to your look.<br>
                    <form action="#" class="ProductForm">
                        <table>
                            <tr>
                                <td>Quantity</td>
                                <td>:<input type="number" value="1" min="1" max="5" step="1"><br></td>
                            </tr>
                            <tr>
                                <td>Size[EU] </td>
                                <td>:
                                    <select name="size" id="size">
                                        <option value="none" selected disabled>Select Size</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="46">46</option>
                                        <option value="47">47</option>
                                        <option value="48">48</option>
                                        <option value="49">49</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Price wihout taxes</td>
                                <td>:<input type="number" placeholder=" Euro(€)" id="priceWOTax" min="50"
                                        oninput="getTotalPrice(this.value)"></td>
                            </tr>
                            <tr>
                                <td>Price with Taxes</td>
                                <td>:<label id="product_price"></label></td>
                            </tr>
                            <tr>
                                <td>Currency</td>
                                <td>:<select id="currencySelect" onchange="convertCurrency()">
                                    <option value="EUR" selected>Euro (€)</option>
                                    <option value="USD">US Dollar ($)</option>
                                    <option value="GBP">British Pound (£)</option>
                                    <option value="INR">Indian Rupee (₹)</option>
                                </select></td>
                            </tr>
                            <tr>
                                <td>Converted Price</td>
                                <td>:<label id="convertedPrice">--</label></td>
                            </tr>
                        </table>
                        <button type="submit" id="AddToCartButton" disabled>Add to Cart</button>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>