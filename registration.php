<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            StepX | Signup
        </title>
        <link rel="stylesheet" href="styles/mystyles.css">
        <link rel="icon" href="img/icon.png">
        <script src="js/global.js"></script>
    </head>

    <body class="registerationBody">
        <div class="BackgroundImage"></div> <!-- Background image container -->
        <div class="Navigation" id="navbar">
            <h1><a href="index.php">StepX</a></h1>
            <nav class="ClassForNav">
			    <?php include "nav.html"; ?>
		    </nav>
        </div>

        <div class="BoxForContents" id="box">
            <h2>Create an Account</h2>
            <div class="TableForLogin">
                <form action="#" method="get">
                    <table>
                        <tr>
                            <td>
                                <input 
                                type="text" 
                                placeholder="Username" 
                                class="inputBox" 
                                id="username"
                                oninput="checkInputForSignup()"
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
                                oninput="checkInputForSignup()"
                                required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input 
                                type="password" 
                                placeholder="Confirm password" 
                                class="inputBox" 
                                id="confirmPassword"
                                oninput="checkInputForSignup()"
                                required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit" class="inputButton" id="SubmitLogin" disabled>Register</button>
                                <button type ="button" class = "inputButton"><a href="login.php">Cancel</a></button>
                            </td>
                        </tr>
                        <tr class="LabelsForRequirements">
                            <td>
                                <label for="hasUserFiveChar">Username must consist atleast 5 characters!</label>
                                <label for="hasUpperLower">Username must contain atleast one capital letter and one lower case letter!</label>
                                <label for="hasPassTenChar">Password must consist atleast 10 characters!</label>
                                <label for="isBothPassSame">Both Passwords must be same!</label>
                            </td> 
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>