<?php
    include("classes/connect.php"); // Include the database connection file
    include("classes/signup.php"); // Include the signup class

    $name = "";
    $email = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $signup = new Signup();
        $result = $signup->evaluate($_POST);

        if($result != "")
        {
            // Display error message if there is a result
            echo "<div style='text-align: center; font-size: 12px; color: white; background-color: grey;'>";   
            echo "<br>The following Error occurred<br><br>";
            echo $result;
            echo "</div>";
        } else
        {
            // Redirect to the login page if signup is successful
            header("Location: login.php");
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
    }
?>
<html>
    <head>
        <title>Signup</title>
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
        #signup{
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
            height: 70%;
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
        <div id="design"></div>

        <div id="signup">
            <div id="bar">
                <!-- Logo -->
                <img src="upload\Logo.png" style="color: white; width:120px; height:120px;">
                <br><br>

                <h1 style="color: white;">Signup to CC</h1>
                <br><br>

                <form method="POST" action="">

                    <!-- Form inputs for signup -->
                    <input value="<?php echo $name ?>" name="name" type="text" id="text" placeholder="Name"><br><br>
                    <input value="<?php echo $email ?>" name="email" type="text" id="text" placeholder="Email"><br><br>
                    <input name="password" type="password" id="text" placeholder="Password"><br><br>
                    <input name="password2" type="Password" id="text" placeholder="Retype Password"><br><br>
                    <button class="button" type="submit" id="button">Login</button>  
                    <br><br><br>

                </form>
                <br><br>

                <a class="btn" href="login.php">Already have an account?</a>

            </div>
        </div>
    </body>
</html>