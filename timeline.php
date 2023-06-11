<html>
    <head>
        <title>Home</title>
    </head>

    <style type="text/css">
        *{
            margin: 0;
        }
        #blue_bar{
            height: 50px;
            background-color: #405d9b;
            color: #d9dfeb;
            padding: 5px;
        }
        #bar{
            width: 800px;
            margin:auto;
            font-size: 30px;
        }
        #search_box{
            width: 400px;
            height: 25px;
            border-radius: 5px;
            border: none;
            padding: 4px;
            font-size:14px;
            background-image: url(images/search.png);
            background-repeat: no-repeat;
            background-position: right;
        }
        #img_box{
            width: 50px;
            float: right;
        }
        #cover_bar{
            width: 800px;
            margin: auto;
            min-height: 400px;
        }
        #cover{
            background-color: white;
            text-align: center;
            color: #405d9b;
        }
        #profile_pic{
            width: 150px;
            border-radius: 50%;
            border: solid 2px white;
        }
        #text{
            font-size: 20px;
        }
        #menu_buttons{
            width: 100px;
            display: inline-block;
            margin: 2px;
        }
        #display_feed{
            display: flex;
        }
        #friends_img{
            width: 75px;
            float: left;
            margin: 8px;
        }
        #friends_bar{
            min-height: 400px; 
            flex:1;
            min-height: 400px;
            margin-top: 20px;
            color: #aaa;
            padding: 8px;
            text-align: center;
            font-size: 20px;
            color: #405d9b;
        }
        #friends{
            clear: both;
            font-size: 12px;
            font-weight: bold;
            color: #405d9b;
        }
        textarea{
            width: 100%;
            border: none;
            font-family: tahoma;
            font-size: 14px;
            height: 50px;
        }
        #post_button{
            float: right;
            background-color: #405d9b;
            border: none;
            color: white;
            padding: 4px;
            font-size: 14px;
            border-radius: 2px;
            width: 50px;
        }
        #post_bar{
            min-height: 400px; 
            flex:2.5; 
            padding: 20px; 
            padding-right: 0px;
        }
        #post_bar2{
            border: solid thin #aaa; 
            padding: 10px; 
            background-color: white
        }
        #post_bar3{
            margin-top: 20px;
            background-color: white;
            padding: 10px;
        }
        #post{
            padding: 4px;
            font-size: 13px;
            display: flex;
            margin-bottom: 20px;

        }
        #post2{
            padding-left: 10px;
        }

    </style>

<body style="font-family: tahoma; background-color: #d0d8e4;">
        <!-- Top Bar -->
        <div id="blue_bar">
            <div id="bar">
                SOCIAL MEDIA &nbsp &nbsp
                <input type="text" id="search_box" placeholder="Search">
                <img src="images/selfie.jpg" id="img_box">
            </div>
        </div>

        <!-- Cover Page -->
        <div id="cover_bar">

            <!-- Below Cover Page -->
            <div id="display_feed">
                <!-- Friends area -->
                <div id="friends_bar">
                    <img src="images/selfie.jpg" id="profile_pic"><br>
                    Marry Ann
                </div>

                <!-- Posts area -->
                <div id="post_bar">
                    <div id="post_bar2">
                        
                        <textarea placeholder="Whats on your mind?"></textarea>
                        <br>
                        <input id="post_button" type="submit" value="Post">
                        <br>
                        
                    </div>
                    
                    <!-- Feeds area -->
                    <div id="post_bar3">
                        <!-- Post -->
                        <div id="post">
                            <div>
                                <img src="images/user1.jpg" width="75px">
                            </div>
                            <div id="post2">
                                <div id="friends">John Wick</div>
                                Hey!! thnx!! im back again and i just finished the last video and everything is working great! i also added some more code to make everything better :) You are amazing
                                <br><br>
                                <a href="#">Like</a> . <a href="#">Comment</a> . <span style="color: #999">April 23 2020</span>
                            </div>
                        </div>

                        <!-- Post -->
                        <div id="post">
                            <div>
                                <img src="images/user2.jpg" width="75px">
                            </div>
                            <div id="post2">
                                <div id="friends">Johnny Test</div>
                                Hey!! thnx!! im back again and i just finished the last video and everything is working great! i also added some more code to make everything better :) You are amazing
                                <br><br>
                                <a href="#">Like</a> . <a href="#">Comment</a> . <span style="color: #999">April 23 2020</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>