<?php 
require('database.php');
session_start();

if (isset($_SESSION["username"]))
  $sUserName = $_SESSION["username"];
else 
  $sUserName = "Guest";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員專區</title>
    <link rel="icon" href="img/favicon-32x32.png">
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        
        .container {
            margin-right: auto;
            margin-left: auto;
            max-width: 1140px;
        }
        
        form {
            height: 27px;
        }
        
        .Search_btn {
            width: 40px;
            height: 27px;
            background: transparent url("img/btn_search.gif")no-repeat center center;
            border: none;
            cursor: pointer;
            float: right;
        }
        
        #Keyword {
            color: #666;
            border: 1px #ccc solid;
            width: 183px;
            height: 27px;
            float: right;
            line-height: 2.2;
        }
        
        .boundary:after {
            content: "|";
            padding: 0 10px;
        }
        
        .navWrapper {
            display: flex;
            width: 1180px;
        }
        
        .navWrapper>ul li {
            list-style-type: none;
            display: inline;
        }
        
        .navWrapper>ul li>a {
            text-decoration: none;
            color: #706e6c;
        }
        
        .navWrapper>ul li>a:hover {
            color: #83521e;
        }
        
        .footer {
            display: flex;
            width: 1180px;
            border-top: 1px #f0f0f0 solid;
            margin-top: 50px;
        }
        
        .footer>ul li {
            display: inline;
        }
        
        .footer>ul li>a {
            color: #706e6c;
            text-decoration: none;
        }
        
        .footer>ul li>a:hover {
            color: black;
            text-decoration: underline;
        }
        
        .login {
            margin-top: 100px;
            margin-left: 130px;
        }
        
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            width: 190px;
            display: flex;
        }
        /* Style the buttons inside the tab */
        
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
            width: 200px;
        }
        /* Change background color of buttons on hover */
        
        .tab button:hover {
            background-color: #ddd;
        }
        /* Create an active/current tablink class */
        
        .tab button.active {
            background-color: #ccc;
        }
        /* Style the tab content */
        
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            height: auto;
            width: 900px;
        }
        
        .login_table {
            width: 500px;
        }
        
        .loginBtn {
            width: 280px;
            margin-top: 10px;
            padding-right: 0;
            border-radius: 5px;
            background-color: #5e3b25;
            color: #fff;
            cursor: pointer;
            line-height: 40px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="">
            <input type="text" placeholder="SEARCH" id="Keyword">
            <input type="submit" class="Search_btn" value="" style="margin-left: -50px;">
        </form>
        <div class="navWrapper">
            <a href="Home.php"><img src="img/logo.png" style="width: 122px;height: 48px;"></a>
            <ul>
                <li>
                    <a href="ShoppingCart.php">WOMEN</a>
                </li>
                <li class="boundary"></li>
                <li>
                    <a href="#">MAN</a>
                </li>
                <li class="boundary"></li>
                <li>
                    <a href="#">KID</a>
                </li>
                <li class="boundary"></li>
                <li>
                    <a href="#">BABY</a>
                </li>
                <li class="boundary"></li>
                <li>
                    <a href="#">SPORT</a>
                </li>
            </ul>
            <ul class="topnav" style="color: #4d3126; margin-left: 430px;">
                <li><a href="">訂閱電子報</a></li>
                <li>
                <?php
                if (isset($_SESSION['username'])) {
                echo " <a href=Member.php>會員</a>/<a href=logout.php>登出</a>";
                }else {
                echo "<a href=registration.php>註冊</a>/<a href=login.php>登入</a>";
                }
                ?>
                </li>
            </ul>
        </div>
        <div class="login">
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">消息中心</button>
            </div>
            <div id="London" class="tabcontent">
                <div style="text-align:center;">
                <div class="Messages" style="border:1px solid #eee;text-align: center;border-radius: 3px;margin-top:10px;">
                    <p style="font-weight: bolder;">維持美好體態 299起</p>
                    <img src="img/M01.jpg" alt="" style="">
                </div>
                <div class="Messages" style="border:1px solid #eee;text-align: center;border-radius: 3px;margin-top:10px">
                    <p style="font-weight: bolder;">連假出遊 穿搭推薦 490起</p>
                    <img src="img/M02.jpg" alt="">
                </div>
                <div class="Messages" style="border:1px solid #eee;text-align: center;border-radius: 3px;margin-top:10px">
                    <p style="font-weight: bolder;">初秋新品．人氣推薦 299起</p>
                    <img src="img/M03.jpg" alt="">
                </div>
                </div>
            </div>
        </div>
        <div class="footer ">
            <ul style="padding-left: 0px; ">
               <li>
                <a href="# ">聯絡lativ</a>
               </li>
               <li class="boundary "></li>
               <li>
                   <a href="# ">購物說明</a>
               </li>
               <li class="boundary "></li>
               <li>
                   <a href="# ">最新消息</a>
               </li>
               <li class="boundary "></li>
               <li>
                   <a href="# ">品牌日誌</a>
               </li>
        </ul>
            <ul style="padding-left: 390px; ">
            <li>
                <a href=" # ">網站使用條款</a>
            </li>
            <li class="boundary "></li>
            <li>
                <a href="# ">隱私權政策</a>
            </li>
            <li class="boundary "></li>
            <li>
                <a href="# ">免責聲明</a>
            </li>
            <li class="boundary "></li>
            <li>© 2020 lativ</li>
            </ul>
        </div>
    </div> 

    
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>

</body>

</html>