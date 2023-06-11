<?php
session_start();

include("classes/connect.php"); // Include the database connection file
include("classes/user.php"); // Include the User class
include("classes/login.php"); // Include the Login class

global $user;

if (isset($_SESSION['user_id'])) {
    // Check if user is logged in
    $id = $_SESSION['user_id'];
    $login = new Login();
    $login->check_login($id);

    $result = $login->check_login($id);

    if ($result) {
        // If user is logged in
        $user = new User();
        $user_data = $user->get_data($id);

        $name = isset($user_data['name']) ? $user_data['name'] : '';
        $username = isset($user_data['username']) ? $user_data['username'] : '';

        $loginText = "Logout";
    } else {
        // If user is not logged in
        $loginText = "Login";
    }
} else {
    // If session user_id is not set
    $loginText = "Login";
}
?>

<html>
<head>
    <title>Profile</title>
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
            min-height: 100%;
            height: auto;
            width: 20%;
            padding: 1%;
            float: left;
            background-color: #0c0c0c;
        }
        
        #user_desciption{
            padding-top: 30px;
            margin-bottom: -25px;
            color: white;
            font-size: 30px;
            text-align: center;
        }
        
        #userName {
            padding-top: 10px;
            margin-bottom: -25px;
            color: white;
            font-size: 40px;
            text-align: center;
        }
        
        #profile_pic {
            height: 150px;
            width: 150px;
            border-radius: 50%;
            border: solid 2px black;
            object-fit: cover;
            display: block;
            margin: 0 auto;
        }
        
        #display_feed {
            position: relative;
        }
        
        #friends_list {
            min-height: 100%;
            height: auto;
            width: 20%;
            padding: 1%;
            float: right;
            background-color: #0c0c0c;
        }

        #friends_bar {
            height: auto;
            flex: 1;
            background-color: #0c0c0c;
            margin-top: 20%;
            color: #aaa;
            padding: 8px;
            border-radius: 10px;
            border-style: outset;
            border-color: #202020;
        }
        
        #friends_img {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            float: left;
            margin: 8px;
        }

        .friend {
            margin-top: 20px;
            height: 65px;
            background-color: #141414;
            clear: both;
            font-size: 12px;
            font-weight: bold;
            color: white;
            border-radius: 10px;
            text-align: center;
            border-style: outset;
            border-color: #202020;
        }
            
        #post_bubble {
            display: inline-block;
            float: center;
            vertical-align: top;
            width: 100%;
            max-width: 600px;
            padding: 20px;
            background-color: #0c0c0c;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            height: 50px;
            border-radius: 10px;
            text-align: left;
            font-family: tahoma;
            font-size: 14px;
            resize: none;
            box-sizing: border-box;
            border: 2px solid #ccc;
        }

        #post_button {
            display: inline-block;
            background-color: #405d9b;
            border: none;
            color: white;
            padding: 13px 35px;
            border-radius: 10px;
            font-size: 20px;
            vertical-align: top;
            margin-top: 20px;
        }
        
        #post_button:hover {
            color: #492A86;
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

<!-- Prints User info like Name and Profile Picture -->
<div id="user_info">
    <img src="upload/defaultimg.jpg" id="profile_pic">

    <!-- Prints name and Username -->
    <div id="userName">
        <?php
        if (!empty($username)) {
            echo $username;
        } elseif (!empty($name)) {
            echo $name;
        } else {
            echo "Guest";
        }
        ?>
    </div>

    <!-- Prints user Status -->
    <div id="user_desciption">
        <?php
            if (isset($user_status)){
            echo "Status:";
            echo $user_status;
            } else {
            echo "You don't have a status";
            }
        ?>  
    </div>
</div>

<!-- Prints User Friends -->
<div id="friends_list">
    <!-- Makes a window for the users Friends -->
    <div id="friends_bar">
        <h2 style="text-align: center; color: white;">Friends</h2>
        <div class="friend">
            <img src="images/user1.jpg" id="friends_img"><br>
            <h2>asasdasd</h2>
        </div>
        <!-- Repeat the above HTML block for each friend -->
    </div>
</div>

<!-- Display Feed -->
<div id="display_feed">

    <!-- Post Bubble -->
    <div id="post_bubble">
        <textarea placeholder="What's on your mind?"></textarea>
    </div>

    <!-- Post Button -->
    <button id="post_button">Post</button>

    <!-- Posts -->
    <div id="post_area">
        <!-- Display user posts here -->
    </div>

</div>

</body>
</html>
