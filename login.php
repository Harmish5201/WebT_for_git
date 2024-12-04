<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            StepX | Login
        </title>
        <link rel="stylesheet" href="styles/mystyles.css">
        <link rel="icon" href="img/icon.png">
        <script src="js/global.js"></script>
    </head>

    <body class="loginBody">
        <div class="BackgroundImage"></div> <!-- Background image container -->
        <div class="Navigation" id="navbar">
            <h1><a href="index.php">StepX</a></h1>
            <nav class="ClassForNav">
			    <?php include "nav.html"; ?>
		    </nav>
        </div>

        <div class="BoxForContents" id = "box">
            <h2>Login</h2>
            <div class="TableForLogin">
                <form action="#" method="get">
                    <table>
                        <th>
                            <label for="CheckLogin">Invalid Username or Password!</label>
                        </th>
                        <tr>
                            <td>
                                <input 
                                type="text" 
                                placeholder="Username" 
                                class="inputBox" 
                                id="username" 
                                oninput="checkInputForLogin()" 
                                required 
                                autofocus>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input 
                                type="password" 
                                placeholder="Password" 
                                class="inputBox" 
                                id="password" 
                                oninput="checkInputForLogin()" 
                                required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit" class="inputButton" id="SubmitLogin" disabled>Sign in</button>
                                <button class="inputButton" onclick="window.location.href='registration.php'">Register</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>