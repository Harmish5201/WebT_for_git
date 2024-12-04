<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            StepX
        </title>
        <link rel="stylesheet" href="styles/mystyles.css">
        <link rel="icon" href="img/icon.png">
        <script src="js/global.js"></script>
    </head>

    <body class="CategoryBody">
        <div class="BackgroundImage"></div> <!-- Background image container -->
        <div class="Navigation" id="navbar">
            <h1><a href="index.php">StepX</a></h1>
            <nav class="ClassForNav">

                <!-- Hidden when widht > 480px -->
                <div class="ListForNav">
                    <img src="img/icon.png" style="display: none;" onload="checkDarkMode()"> <!--Dummy image load-->
                    <select id="navSelect" onchange="navigateToPage()">
                        <option value="" hidden style="text-align: right;">Goto</option>
                        <option value="login.php">Login</option>
                        <option value="categories.php">Categories</option>
                        <option value="about.php">About Us</option>
                        <option value="cart.php">Cart</option>
                    </select>
                </div>

                
                <table class="TableForNav">
                    <tr>
                        <td><a href="login.php">Login</a></td>
                        <td><a href="categories.php">Categories</a></td>
                        <td><a href="about.php">About Us</a></td>
                        <td><a href="cart.php">Cart</a></td>
                        <td><button onclick="DarkMode()" class="inputButton ToggleDarkModeButton">🌗</button></td>
                    </tr>
                </table>
            </nav>
        </div>

        <div class="BoxForContents" id="box">
            <h2>Our Catalog</h2>
            <table>
                <?php
                $json = file_get_contents('products/products.json');
                $products = json_decode($json, true);
    
                foreach ($products as $product) {
                    echo '
                        <tr>
                            <td class="CatalogImg"><button onclick="window.location.href=\'products/products.php?pid='.$product["pid"].'\'"><img src="'.$product["img_path_1"].'"></button></td>
                            <td class="CatalogInfo">'.$product["name"].'</td>
                            <td class="CatalogAddto"><button onclick="addToCollection(this)">+ Add</button></td>
                        </tr>
                    ';
                }
                ?>

                <!--
                <tr>
                    <td class="CatalogImg"><button onclick="window.location.href='products/air force.php'"><img src="img/air force.jpeg"></button></td>
                    <td class="CatalogInfo">Air Force</td>
                    <td class="CatalogAddto"><button onclick="addToCollection(this)">+ Add</button></td>
                </tr>
                <tr>
                    <td class="CatalogImg"><button onclick="window.location.href='products/air max.php'"><img src="img/Air Max.jpeg"></button></td>
                    <td class="CatalogInfo">Air Max</td>
                    <td class="CatalogAddto"><button onclick="addToCollection(this)">+ Add</button></td>
                </tr>
                <tr>
                    <td class="CatalogImg"><button onclick="window.location.href='products/gazelle.php'"><img src="img/adidas Gazelle.jpeg"></button></td>
                    <td class="CatalogInfo">Gazelle</td>
                    <td class="CatalogAddto"><button onclick="addToCollection(this)">+ Add</button></td>
                </tr>
                <tr>
                    <td class="CatalogImg"><button onclick="window.location.href='products/roma.php'"><img src="img/puma roma.jpeg"></button></td>
                    <td class="CatalogInfo">Roma</td>
                    <td class="CatalogAddto"><button onclick="addToCollection(this)">+ Add</button></td>
                </tr>
                <tr>
                    <td class="CatalogImg"><button onclick="window.location.href='products/samba.php'"><img src="img/adidas Samba.jpeg"></button></td>
                    <td class="CatalogInfo">Samba</td>
                    <td class="CatalogAddto"><button onclick="addToCollection(this)">+ Add</button></td>
                </tr>
                <tr>
                    <td class="CatalogImg"><button onclick="window.location.href='products/stan smith.php'"><img src="img/adidas Stan Smith.jpeg"></button></td>
                    <td class="CatalogInfo">Stan Smith</td>
                    <td class="CatalogAddto"><button onclick="addToCollection(this)">+ Add</button></td>
                </tr>
            -->
            </table>
        </div>
        <div class="BoxForContents Collection" id="CatalogClass" hidden>
            <h2>
                Your Collection
            </h2>
            <table id="CatalogCollection">
            </table>
            <h3>Number of Products selected: <label id="CollectionCounter">0</label></h3>
        </div>
    </body>
</html>