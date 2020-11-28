<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>註冊</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/favicon-32x32.png">
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            margin-right: auto;
            margin-left: auto;
            max-width: 1140px;
        }
         .topForm {
            height: 27px;
            width: 1180px;
        }
        
        .Search_btn {
            width: 40px;
            height: 27px;
            background: transparent url("img/btn_search.gif")no-repeat center center;
            border: none;
            cursor: pointer;
            float: right;
        }
        
        .Keyword {
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
    </style>
</head>
<body>
<?php
    require('database.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <div class="container">
            <form action="" class="topForm">
            <input type="text" placeholder="SEARCH" class="Keyword">
            <input type="submit" class="Search_btn" value="" style="margin-right:-190px;">
        </form>
        <div class="navWrapper">
            <a href="Home.php"><img src="img/logo.png" style="width: 122px;height: 48px;"></a>
            <ul style="margin-left: 50px;">
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
            <ul class="topnav" style="margin-left: 380px; color: #4d3126;">
                <li><a href="">訂閱電子報</a></li>
                <li class="boundary"></li>
                <li>
                <?php
                if (isset($_SESSION['username'])) {
                echo " <a href=Member.html>會員</a>/<a href=logout.php>登出</a>";
                }else {
                echo "<a href=registration.php>註冊</a>/<a href=login.php>登入</a>";
                }
                ?>
                </li>
            </ul>
        </div>
        <form class="form" action="" method="post">
        <h1 class="login-title">會員註冊</h1>
        <input type="text" class="login-input" name="username" placeholder="會員帳號" required />
        <input type="text" class="login-input" name="email" placeholder="E-mail信箱">
        <input type="password" class="login-input" name="password" placeholder="密碼">
        <input type="submit" name="submit" value="註    冊" class="login-button">
        <p class="link">已經有帳戶了嗎? <a href="login.php">由此登入</a></p>
        </form>
        <div class="footer">
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
</div>
<?php
    }
?>
</body>
</html>