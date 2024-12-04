<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Air Force
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
        <nav class="ClassForNav">
			    <?php include "nav.html"; ?>
		</nav>
    </div>

    <div class="BoxForContents" id="box">
        <?php
        if (isset($_GET["pid"])) {
            // variables
            $product_id = $_GET["pid"];
            $product_data = null;
            $json = file_get_contents('json/products.json');

            // converting json to array
            $products = json_decode($json, true);

            foreach ($products as $product) {
                // searcbh the required product
                if ($product["pid"] == $product_id) {
                    $product_data = $product;
                    break;
                }
            }

            if ($product_data) {
                // Show product on html if product found!
                echo '
                        <h2>' . $product_data['name'] . '</h2>
                        <table class="ProductTable">
                            <tr>
                                <td class="ProductImg">
                                    <div id="productSlider">
                                        <div id="sliderWrapper">
                                            <img src="' . $product_data['img_path_1'] . '" alt="' . $product_data['name'] . ' 1">
                                            <img src="' . $product_data['img_path_2'] . '" alt="' . $product_data['name'] . ' 2">
                                        </div>
                                        <button id="prevBtn" onclick="scrollPrevImg()">❮</button>
                                        <button id="nextBtn" onclick="scrollNextImg()">❯</button>
                                    </div>
                                </td>

                                <td class="ProductInfo">' . $product_data['description'] . '<br>
                                    <form action="#" class="ProductForm">
                                        <table>
                                            <tr>
                                                <td>Quantity</td>
                                                <td>:<input type="number" value="1" min="1" max="5" step="1" required><br></td>
                                            </tr>
                                            <tr>
                                                <td>Size[EU] </td>
                                                <td>:
                                                    <select name="size" id="size" onchange="document.getElementById(\'AddToCartButton\').removeAttribute(\'disabled\');" required>
                                                        <option value="none" selected hidden>Select Size</option>
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
                                                <td>:<input 
                                                        type="text" 
                                                        placeholder=" Euro(€)" 
                                                        id="priceWOTax" 
                                                        value="' . $product_data['price'] . ' €" 
                                                        disabled></td>
                                            </tr>
                                            <tr>
                                                <td>Price with Taxes</td>
                                                <td>:<label id="product_price"></label></td>
                                            </tr>
                                            <tr>
                                                <td>Currency</td>
                                                <td>:
                                                    <select id="currencySelect" onchange="convertCurrency()">
                                                        <option value="EUR" selected>Euro (€)</option>
                                                        <option value="USD">US Dollar ($)</option>
                                                        <option value="GBP">British Pound (£)</option>
                                                        <option value="INR">Indian Rupee (₹)</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Converted Price</td>
                                                <td>:<label id="convertedPrice">--</label></td>
                                            </tr>
                                        </table>
                                        <button type="submit" id="AddToCartButton" disabled>Add to Cart</button>
                                        <script>
                                            getTotalPrice(document.getElementById("priceWOTax").value);
                                        </script>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    ';
            } else {
                echo "<h3>Product Not Found! <br> Please <a href='../categories.php' class='loginLink'>Go Back</a> to select a product.</h3>";
            }
        } else {
            // pid attribute missing!
            $products = json_decode(file_get_contents('json/products.json'), true);
            echo '
                <h2>Our Catalog</h2>
                <table>
            ';

            foreach ($products as $product) {
                // display all the products
                    echo '
                        <tr class="CatalogRow" onclick="window.location.href=\'products.php?pid='.$product["pid"].'\'">
                            <td class="CatalogImg"><button onclick="window.location.href=\'products.php?pid='.$product["pid"].'\'"><img src="'.$product["img_path_1"].'"></button></td>
                            <td class="CatalogInfo"><span>'.$product["name"].'</td>
                        </tr>
                    ';
                }

                echo '
                </table>
            ';
            }
        ?>
    </div>
</body>

</html>