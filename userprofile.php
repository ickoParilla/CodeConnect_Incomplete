<?php
session_start();

include("classes/connect.php"); // Include the database connection file
include("classes/user.php"); // Include the User class
include("classes/login.php"); // Include the Login class


// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $login = new Login();
    $login->check_login($id);

    $result = $login->check_login($id);

    if ($result) {
        $user = new User();
        $user_data = $user->get_data($id);

        $name = isset($user_data['name']) ? $user_data['name'] : "Guest";
        $name = isset($user_data['username']) ? $user_data['username'] : $name;
        $date = isset($user_data['date']) ? $user_data['date'] : "";

        $loginText = "Logout";
    } else {
        $loginText = "Login";
    }
} else {
    $loginText = "Login";
}

// Handle username change
if (isset($_POST['update_username'])) {
    $newUsername = $_POST['new_username'];

    // Update the username in the database
    $user->updateUsername($id, $newUsername);

    // Update the username in the session and user_data array
    $_SESSION['username'] = $newUsername;
    $user_data['username'] = $newUsername;

    // Redirect to the profile page or display a success message
    header("Location: userprofile.php");
    exit;
}

?>

<html>
<head>
    <title>Edit Profile</title>
    <style type="text/css">
        * {
            margin: 0;
        }

        body {
            font-family: tahoma;
            background-color: #141414;
        }

        #top_bar {
            height: 5%;
            background-color: #070707;
            color: #d9dfeb;
            padding: 5px;
            padding-top: 20px;
            padding-bottom: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #logo {
            width: 130px;
            height: 130px;
            object-fit: cover;
            margin-top: -50px;
            margin-bottom: -55px;
        }

        .btn {
            background-color: #070707;
            height: 100%;
            border: none;
            color: white;
            padding: 12px 16px;
        }

        .btn:hover {
            color: #492A86;
        }

        #bar {
            width: 100%;
            font-size: 30px;
            text-align: center;
        }

        #user_info {
            display: flex;
            align-items: center;
            margin-top: 20px;
            padding: 20px;
            background-color: #0c0c0c;
            border-radius: 10px;
        }

        #profile_pic {
            height: 150px;
            width: 150px;
            border-radius: 50%;
            border: solid 2px black;
            object-fit: cover;
            margin-right: 20px;
        }

        #user_details {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        #user_details h1 {
            margin-bottom: 10px;
            color: white;
        }

        #user_details p {
            color: #a0a0a0;
            margin-bottom: 5px;
        }

        #edit_profile {
            margin-top: 20px;
        }

        #edit_profile label {
            display: block;
            color: white;
            margin-bottom: 5px;
        }

        #edit_profile input[type="text"] {
            width: 100%;
            height: 30px;
            padding: 5px;
            font-size: 16px;
            margin-bottom: 10px;
        }

        #edit_profile input[type="submit"] {
            background-color: #405d9b;
            color: #d9dfeb;
            padding: 8px 15px;
            border-radius: 5px;
            border: none;
            font-weight: bold;
            cursor: pointer;
        }

        #edit_profile input[type="submit"]:hover {
            background-color: #492A86;
        }
    </style>
</head>
<body>

<script src="https://kit.fontawesome.com/030fc512c4.js" crossorigin="anonymous"></script>

<!-- Top Bar -->
<div id="top_bar">
    <div id="bar">
        <!-- Logo -->
        <img src="upload/LogoWithName.png" id="logo">
        <a class="btn" href="homepage.php"><i class="fa fa-home fa-fw" aria-hidden="true"></i></a>
        <a class="btn" href="profile.php"><i class="fa fa-user fa-fw" aria-hidden="true"></i></a>
        <a class="btn" href="message.php"><i class="fa fa-comments fa-fw" aria-hidden="true"></i></a>
        <a class="btn" href="signout.php" style="float: right;"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i></a>
        <a class="btn" href="userprofile.php" style="float: right;"><i class="fa fa-cog fa-fw" aria-hidden="true"></i></a>
    </div>
</div>

<!-- User Info -->
<div id="user_info">
    <img src="upload/defaultimg.jpg" id="profile_pic">
    <div id="user_details">
        <!-- User username -->
        <h1>
            <?php
                if (isset($user_data['username'])){
                    echo $user_data['username'];
                } 
                else {
                    echo "Guest";
                }
            ?>
        </h1>
        <!-- User Name -->
        <p>
            <?php
                if (isset($user_data['name'])) {
                    echo $user_data['name'];
                } else {
                    echo "Guest";
                }
            ?>
        </P>
        <!-- Date User Joined -->
        <p>
            Joined:             
            <?php
                if (isset($date)){
                    echo $date;
                } else {
                    echo "Guest";
                }
            ?>
        </p>
        <!-- User Status -->
        <p>
            <?php
                if (isset($user_status)){
                echo $user_status;
                } else {
                echo "You don't have a status";
                }
            ?>  
        </p>
    </div>
</div>

<!-- Edit Profile -->
<div id="edit_profile">
    <div style="display: flex; justify-content: center; align-items: center;">
        <div style="text-align: center;">
            <h2 style="color: white;">Update Username</h2>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="width: 100%;">
                <label for="new_username" style="color: white;">New Username:</label>
                <input type="text" id="new_username" name="new_username" required>
                <br>
                <input type="submit" name="update_username" value="Update Username" style="color: white;">
            </form>
        </div>
    </div>
</div>




</body>
</html>
