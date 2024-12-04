<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Stan Smith
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
                <select id="navSelect" onchange="navigateToPage()">
                    <img src="../img/icon.png" style="display: none;" onload="checkDarkMode()"> <!--Dummy image load-->
                    <option value="" hidden style="text-align: right;">Goto</option>
                    <option value="../login.php">Login</option>
                    <option value="../categories.php">Categories</option>
                    <option value="../catelog.php">Catelog</option>
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
            <h2>STAN SMITH</h2>
            <table class="ProductTable">
                <tr>
                    <td class="ProductImg">
                        <div id="productSlider">
                            <div id="sliderWrapper">
                                <img src="../img/adidas Stan Smith.jpeg" alt="adidas Stan Smith 1">
                                <img src="../img/adidas Stan Smith 2.jpeg" alt="adidas Stan Smith 2">
                            </div>
                            <button id="prevBtn" onclick="scrollPrevImg()">❮</button>
                            <button id="nextBtn" onclick="scrollNextImg()">❯</button>
                        </div>
                    </td>

                    <td class="ProductInfo">THESE SHOES TURN ANY LOOK INTO AN INSTANT CLASSIC <br>
                        These classics capture the essential style of the 1971 original, with a minimalist leather build
                        and clean trim.<br>
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
                                            <option value="38">38</option>
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