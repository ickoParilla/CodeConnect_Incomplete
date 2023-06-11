<?php
session_start();

include("classes/connect.php"); // Include the database connection file
include("classes/login.php"); // Include the Login class

$email = "";
$password = "";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $login = new Login(); // Create an instance of the Login class
    $result = $login->evaluate($_POST); // Call the evaluate method to handle the login

    if($result != "")
    {
        // Display error message if login was unsuccessful
        echo "<div style='text-align: center; font-size: 12px; color: white; background-color: grey;'>";   
        echo "<br>The following Error occurred<br><br>";
        echo $result;
        echo "</div>";
    } else {
        header("Location: profile.php"); // Redirect to the profile page if login was successful
    }

    $email = $_POST['email']; // Retrieve the entered email for displaying in the input field
    $password = $_POST['password']; // Retrieve the entered password for displaying in the input field
}
?>
<html>
    <head>
        <title>Login</title>
    </head>
    <style>
        *{
            margin: 0px;
        }
        #design{
            height:100%; 
            width: 60%;
            color: #d9dfeb; 
            float: left;
            background-image: url('images/loginimg.png');
            background-repeat: no-repeat;
            background-attachment: fixed;  
            background-size: 60% 110%;
        }
        #login{
            background-color: white;
            width: 40%;
            height: 100%;
            margin: auto;
            text-align: center;
            float: right;
            background-color: #262626;  
        }
        #bar{
            padding-top: 10%;
            border-style: ridge;
            border-color: #424242;
            background-color: #262626;
            width: 60%;
            height: 50%;
            margin: auto;
            text-align: center;
            position: relative;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }
        #signup_button{
            background-color: #42b72a;
            width: 70px;
            text-align: center;
            padding: 4px;
            border-radius: 4px;
            float: right;
        }
        #text{
            height: 40px;
            width: 300px;
            border-radius: 4px;
            border: solid 1px #aaa;
            padding: 4px;
            font-size: 14px;
        }
        #button{
            width: 300px;
            height: 40px;
            border-radius: 4px;
            font-weight: bold;
            border: none;
            background-color: #492A86;
        }
                /* Darker background on mouse-over */
        .button:hover {
            color: white;
        }
        .btn {
            height: 100%;
            border: none;
            color: white;
        }
    </style>
<body style="font-family: tahoma; background-color: #e9ebee;">
    <!-- Main body of the page with specified font and background color -->

    <div id="design"></div>

    <div id="login">
        <!-- Login section -->

        <div id="bar">
            <!-- Header section with logo and login title -->

            <img src="upload\Logo.png" style="color: white; width:120px; height:120px;">
            <!-- Logo image -->

            <br><br>

            <h1 style="color: white;">Login to CC</h1>
            <!-- Login title -->

            <br><br>

            <form method="POST">
                <!-- Login form -->

                <input name="email" value="<?php echo $email?>" type="text" id="text" placeholder="Email">
                <!-- Input field for email -->

                <br><br>

                <input name="password" value="<?php echo $password?>" type="password" id="text" placeholder="Password">
                <!-- Input field for password -->

                <br><br>

                <button class="button" type="submit" id="button">Login</button>
                <!-- Submit button for login -->

            </form>

            <br><br>

            <a class="btn" href="signup.php">Don't have an account yet?</a>
            <!-- Link to the signup page -->

        </div>
    </div>
</body>
</html>