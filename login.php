<?php
    require('database.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: Home.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登入</title>
    <link rel="icon" href="img/favicon-32x32.png">
    <style>
    body {
        background: white;
        font-family: Arial, Helvetica, sans-serif;
    
    }
    .container {
        margin-right: auto;
        margin-left: auto;
        max-width: 1140px;
        }

    .form {
        margin: 50px auto;
        width: 300px;
        padding: 30px 25px;
        background: white;
        border: 1px solid #ccc;
    }    

    h1.login-title {
        color: #666;
        margin: 0px auto 25px;
        font-size: 25px;
        font-weight: 300;
        text-align: center;
    }

    .login-input {
        font-size: 15px;
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 25px;
        height: 25px;
        width: calc(100% - 23px);
    }
  
    .login-input:focus {
        border-color: #6e8095;
        outline: none;
    }

    .login-button {
        color: #fff;
        background: #5e3b25;
        border: 0;
        outline: 0;
        width: 100%;
        height: 50px;
        font-size: 16px;
        text-align: center;
        cursor: pointer;
        border-radius: 5px;
    }

    .link {
        color: #666;
        font-size: 15px;
        text-align: center;
        margin-bottom: 0px;
    }

    .link a {
        color: #706e6c;
    }

    h3 {
    　　font-weight: normal;
    　　text-align: center;
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

    <form class="form" method="post" name="login">
        <h1 class="login-title">會員登入</h1>
        <input type="text" class="login-input" name="username" placeholder="會員帳號" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="密碼"/>
        <input type="submit" value="登   入" name="submit" class="login-button"/>
        <p class="link">還沒有帳戶嗎? <a href="registration.php">立刻註冊</a></p>
  </form>
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
<?php
    }
?>

</body>
</html>