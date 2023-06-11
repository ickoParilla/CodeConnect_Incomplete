<?php
session_start();

include("classes/connect.php"); // Include the database connection file
include("classes/user.php"); // Include the User class
include("classes/login.php"); // Include the Login class

global $user;

if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $login = new Login(); // Create an instance of the Login class
    $login->check_login($id); // Check if the user is logged in

    $result = $login->check_login($id);

    if ($result) {
        $user = new User(); // Create an instance of the User class
        $user_data = $user->get_data($id); // Get user data from the database

        $name = $user_data['name']; // Get the user's name from the user data
        $login = "Logout";
    } else {
        $login = "Login";
    }
} else {
    $login = "Login";
}
?>

<html>
<head>
    <title>Profile</title>
</head>
<style type="text/css">
    * {
        margin: 0;
    }

    #logo {
        width: 130px;
        height: 130px;
        position: relative;
        object-fit: cover;
        float: left;
        margin-top: -50px;
        margin-bottom: -55px;
        margin-left: 50px;
        display: block;
    }

    #top_bar {
        height: 5%;
        background-color: #070707;
        color: #d9dfeb;
        padding: 5px;
        padding-top: 20px;
        padding-bottom: 10px;
        display: input;
    }

    .btn {
        background-color: #070707;
        height: 100%;
        border: none;
        color: white;
        padding: 12px 16px;
    }

    /* Darker background on mouse-over */
    .btn:hover {
        color: #492A86;
    }

    #searchbar {
        font-size: 30px;
    }

    #bar {
        width: 100%;
        font-size: 30px;
        text-align: center;
    }

    #bar a.btn {
        display: inline-block;
        margin: 0 10px;
    }

    #user_info {
        min-height: 100%;
        height: auto;
        width: 20%;
        padding: 1%;
        float: left;
        background-color: #0c0c0c;
    }

    #friends_list {
        min-height: 100%;
        height: auto;
        width: 20%;
        padding: 1%;
        float: right;
        background-color: #0c0c0c;
    }

    #userName {
        padding-top: 10px;
        margin-bottom: -25px;
        color: white;
        font-size: 40px;
        text-align: center
    }

    #profile_pic {
        height: 150px;
        width: 150px;
        border-radius: 50%;
        border: solid 2px black;
        object-fit: cover;
        float: center;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    #text {
        font-size: 20px;
    }

    #menu_buttons {
        width: 100px;
        display: inline-block;
        margin: 2px;
    }

    #display_feed {
        width: 80%;
        height: auto;
        float: center;
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

    #friends {
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
        padding: 10px;
        position: relative;
        width: 100%;
        float: center;
    }

    textarea {
        width: 60%;
        padding: 10;
        height: 50px;
        border-radius: 10px;
        text-align: left;
        font-family: tahoma;
        font-size: 14px;
        resize: none;
        box-sizing: border-box;
        border: 2px solid #ccc;
        vertical-align: middle;
    }

    #post_button {
        background-color: #405d9b;
        position: absolute;
        border: none;
        color: white;
        padding: 13px 35px;
        right: 90px;
        bottom: 10px;
        border-radius: 10px;
        font-size: 20px
    }

    /* Darker background on mouse-over */
    .post_button:hover {
        color: #492A86;
    }

    /* Styling for messaging section */
    #message_section {
        width: 60%;
        margin: 20px auto;
        background-color: #0c0c0c;
        border-radius: 10px;
        padding: 20px;
        color: white;
    }

    #message_section h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    #message_section .message {
        background-color: #141414;
        border-radius: 10px;
        padding: 10px;
        margin-bottom: 10px;
    }

    #message_section .message .sender {
        font-weight: bold;
        margin-bottom: 5px;
    }

    #message_section .message .content {
        margin-left: 20px;
    }

    #message_section textarea {
        width: 100%;
        margin-bottom: 10px;
    }

    #message_section button {
        background-color: #405d9b;
        border: none;
        color: white;
        padding: 10px 20px;
        border-radius: 10px;
    }
</style>
<body style="font-family: tahoma; background-color: #141414;">
    <script src="https://kit.fontawesome.com/030fc512c4.js" crossorigin="anonymous"></script>

    <!-- Top Bar -->
    <div id="top_bar">
        <div id="bar">
            <!-- Logo -->
            <img src="upload\LogoWithName.png" id="logo">
            <a class="btn" href="homepage.php"><i class="fa fa-home fa-fw" aria-hidden="true"></i></a>
            <a class="btn" href="profile.php"><i class="fa fa-user fa-fw" aria-hidden="true"></i></a>
            <a class="btn" href="message.php"><i class="fa fa-comments fa-fw" aria-hidden="true"></i></a>
        </div>
    </div>

    <!-- Prints User info like Name and Profile Picture -->
    <div id="user_info">
        <img src="upload\defaultimg.jpg" id="profile_pic">
        <div id="userName">
            <!-- Prints Name from database, if Name is unavailable, it will print "Guest" instead -->
            <?php
            if (isset($user_data['name'])) {
                echo $user_data['name'];
            } else {
                echo "Guest";
            }
            ?>
        </div>
    </div>

    <!-- Prints User Friends -->
    <div id="friends_list">
        <!-- Makes a window for the users Friends -->
        <div id="friends_bar">
            <h2 style="text-align: center; color: white;">Friends</h2>
            <div id="friends">
                <img src="images/user1.jpg" id="friends_img"><br>
                <h2>asasdasd</h2>
            </div>
            <!-- Repeat the above HTML block for each friend -->
        </div>
    </div>

    <div id="display_feed">
        <div id="post_bubble">
            <textarea placeholder="What's on your mind?"></textarea>
            <input id="post_button" type="submit" value="Post">
        </div>

        <!-- Posts -->
        <div id="post_area">
            <!-- Display user posts here -->
        </div>
    </div>

    <!-- Messaging Section -->
    <div id="message_section">
        <h2>Messages</h2>
        <div class="message">
            <div class="sender">John Doe</div>
            <div class="content">Hello, how are you?</div>
        </div>
        <div class="message">
            <div class="sender">Jane Smith</div>
            <div class="content">I'm doing great, thanks! How about you?</div>
        </div>
        <textarea placeholder="Type your message"></textarea>
        <button>Send</button>
    </div>
</body>
</html>
