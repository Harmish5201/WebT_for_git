// uses: all pages for mobile view
function navigateToPage() {
    window.location.href = document.getElementById('navSelect').value;
}

// uses: catalog.html
var counter = 0;
var AirForceQty = 0;
var AirMaxQty = 0;
var GazelleQty = 0;
var RomaQty = 0;
var SambaQty = 0;
var StanSmithQty = 0;

function addToCollection(button) {
    // to show the div class
    document.getElementById('CatalogClass').removeAttribute('hidden');

    let productName = button.closest('tr').querySelector('.CatalogInfo').textContent;
    let productImg = button.closest('tr').querySelector('.CatalogImg').innerHTML;
    let productQty = 0;

    const table = document.getElementById('CatalogCollection');
    const collectRow = document.createElement('tr');
    const collectData = document.createElement('td');
    const collectImg = document.createElement('td');

    switch (productName) {
        case 'Air Force':
            AirForceQty += 1;
            productQty = AirForceQty;
            break;
        case 'Air Max':
            AirMaxQty += 1;
            productQty = AirMaxQty;
            break;
        case 'Gazelle':
            GazelleQty += 1;
            productQty = GazelleQty;
            break;
        case 'Roma':
            RomaQty += 1;
            productQty = RomaQty;
            break;
        case 'Samba':
            SambaQty += 1;
            productQty = SambaQty;
            break;
        case 'Stan Smith':
            StanSmithQty += 1;
            productQty = StanSmithQty;
            break;
    }

    // if productqty <= 1, the row doesnt exist yet
    if (productQty <= 1){
        // create the product row
        collectData.innerHTML = '<td> '+ productName + '<p class="ProductQty"> Qty: ' + productQty + '</p>';
        collectImg.innerHTML = productImg;
        collectRow.appendChild(collectImg);
        collectRow.appendChild(collectData);
        table.appendChild(collectRow);
    } else {
        // for each loop to find the existing row
        for (let row of table.rows) {
            // row which includes the product name in its 2nd <td> tag
            if (row.cells[1].textContent.includes(productName)) {
                existingRow = row;
                break;
            }
        }
        // update qty to existing row
        existingRow.querySelector('.ProductQty').textContent = 'Qty: ' + productQty;
    }
    counter++;
    document.getElementById('CollectionCounter').textContent = counter;
}


// uses: login.html
function checkInputForLogin() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    //flags
    let hasUpperCase = false;
    let hasLowerCase = false;
    let hasUserFiveChar = false;
    let hasPassTenChar = false;

    // check if username has five char
    if (username.length >= 5) {
        hasUserFiveChar = true;
    }

    // loop to check Uppercase in username
    for (let char of username) {
        if (char >= "A" && char <= "Z") {
            hasUpperCase = true;
            break;
        }
    }

    // loop to check Lowercase in password
    for (let char of username) {
        if (char >= "a" && char <= "z") {
            hasLowerCase = true;
            break;
        }
    }

    // check if password has 10 char
    if (password.length >= 10) {
        hasPassTenChar = true;
    }

    // check if all requirements met -> enables the button
    if (hasLowerCase && hasUpperCase && hasUserFiveChar && hasPassTenChar) {
        document.getElementById('SubmitLogin').removeAttribute('Disabled');
        document.querySelector('label[for="CheckLogin"]').style.display = 'none';
    } else {
        document.getElementById('SubmitLogin').disabled = true;
        document.querySelector('label[for="CheckLogin"]').style.display = 'inline-block';
    }
}


// uses: registration.html
function checkInputForSignup() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirmPassword").value;


    //flags
    let hasUpperCase = false;
    let hasLowerCase = false;
    let hasUserFiveChar = false;
    let hasPassTenChar = false;
    let isBothPassSame = false;


    // loop to check Uppercase in username
    for (let char of username) {
        if (char >= "A" && char <= "Z") {
            hasUpperCase = true;
            break;
        }
    }

    // loop to check Lowercase in password
    for (let char of username) {
        if (char >= "a" && char <= "z") {
            hasLowerCase = true;
            break;
        }
    }

    // check if username has five char
    if (username.length >= 5) {
        hasUserFiveChar = true;
        document.querySelector('label[for="hasUserFiveChar"]').style.color = 'green';
    } else {
        document.querySelector('label[for="hasUserFiveChar"]').style.color = 'red';
    }

    // check if password has 10 char
    if (password.length >= 10) {
        hasPassTenChar = true;
        document.querySelector('label[for="hasPassTenChar"]').style.color = 'green';
    } else {
        document.querySelector('label[for="hasPassTenChar"]').style.color = 'red';
    }

    // check if paswword matches
    if (password === confirmPassword && password !== "" && confirmPassword !== "") {
        isBothPassSame = true;
        document.querySelector('label[for="isBothPassSame"]').style.color = 'green';
    } else {
        document.querySelector('label[for="isBothPassSame"]').style.color = 'red';
    }

    // check for case change
    if (hasLowerCase && hasUpperCase) {
        document.querySelector('label[for="hasUpperLower"]').style.color = 'green';
    } else {
        document.querySelector('label[for="hasUpperLower"]').style.color = 'red';
    }


    // check if all requirements met -> enables the button
    if (hasLowerCase && hasUpperCase && hasUserFiveChar && hasPassTenChar && isBothPassSame) {
        document.getElementById('SubmitLogin').removeAttribute('Disabled');
    } else {
        document.getElementById('SubmitLogin').disabled = true;
    }
}

// Dark mode for DesktopView
function DarkMode(){
    document.getElementById("navbar").classList.toggle("DarkMode");
    document.getElementById("navSelect").classList.toggle("DarkMode");
    try{
        document.getElementById("indexImg").classList.toggle("DarkMode")
        document.getElementById("popup2").classList.toggle("DarkMode");
        document.getElementById("popup").classList.toggle("DarkMode");
        
    } catch(e) {
        document.getElementById("box").classList.toggle("DarkMode");
        document.querySelector('.BackgroundImage').classList.toggle('DarkMode');

    }
}

// Dark mode for MobileView
function checkDarkMode(){
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches && window.innerWidth <= 479) {
        DarkMode();
        console.log("Mobile View. Dark mode Enabled")
    } else {
        console.log("Desktop View");
    }
}


// uses: products.html
function getTotalPrice(priceWOTax){
    const taxes = 0.19;
    priceWOTax = parseFloat(priceWOTax);
    console.log(priceWOTax);
    if(priceWOTax < 1 || isNaN(priceWOTax)){
        document.getElementById('product_price').innerText = " Invalid";
        document.getElementById('AddToCartButton').disabled = true;
        return;
    }
    let priceWithTax = priceWOTax + (priceWOTax * taxes);
    document.getElementById('product_price').innerText = " " + priceWithTax;
    document.getElementById('AddToCartButton').removeAttribute('disabled');
}


// Image slider on Product pages
document.addEventListener("DOMContentLoaded", () => {
    let currentIndex = 0; // Keeps track of the current slide
    const sliderWrapper = document.getElementById("sliderWrapper");
    const slides = sliderWrapper.children; // Get all slides
    const totalSlides = slides.length;

    document.getElementById("prevBtn").addEventListener("click", () => {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides; // Loop backward
        updateSlider();
    });

    document.getElementById("nextBtn").addEventListener("click", () => {
        currentIndex = (currentIndex + 1) % totalSlides; // Loop forward
        updateSlider();
    });

    function updateSlider() {
        const offset = -currentIndex * 300; // Slide width
        sliderWrapper.style.transform = `translateX(${offset}px)`; // Update position
    }
});

// Currency conversion rates
const conversionRates = {
    EUR: 1, // Base currency
    USD: 1.1, // 1 EUR = 1.1 USD
    GBP: 0.85, // 1 EUR = 0.85 GBP
    INR: 90, // 1 EUR = 90 INR
};

let currentPriceWithTax = 0; // Store the latest calculated price with taxes

// Calculate total price with taxes
function getTotalPrice(priceWOTax) {
    const taxes = 0.19; // 19% VAT
    priceWOTax = parseFloat(priceWOTax);

    if (priceWOTax < 1 || isNaN(priceWOTax)) {
        document.getElementById('product_price').innerText = "Invalid";
        document.getElementById('convertedPrice').innerText = "--";
        document.getElementById('AddToCartButton').disabled = true;
        return;
    }

    // Calculate price with tax
    currentPriceWithTax = priceWOTax + (priceWOTax * taxes);
    document.getElementById('product_price').innerText = `${currentPriceWithTax.toFixed(2)} €`;

    // Update converted price
    convertCurrency();
    document.getElementById('AddToCartButton').removeAttribute('disabled');
}

// Convert currency dynamically
function convertCurrency() {
    const currency = document.getElementById("currencySelect").value;
    const conversionRate = conversionRates[currency];

    // Calculate converted price
    const convertedPrice = (currentPriceWithTax * conversionRate).toFixed(2);
    const currencySymbol = {
        EUR: "€",
        USD: "$",
        GBP: "£",
        INR: "₹",
    }[currency];

    // Update converted price display
    document.getElementById("convertedPrice").innerText = `${convertedPrice} ${currencySymbol}`;
}