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
    <title>lativ米格國際</title>
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
        
        .cart-button {
            position: relative;
            display: inline-block;
        }
        
        .cart-dropdown {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px;
            z-index: 1;
        }
        
        .cart-button:hover .cart-dropdown {
            display: block;
        }
        /* Slideshow container */
        
        .slideshow-container {
            width: 1180px;
            position: relative;
            margin: auto;
        }
        /* Hide the images by default */
        
        .mySlides {
            display: none;
            width: 1180px;
        }
        /* Next & previous buttons */
        
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -22px;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }
        /* Position the "next button" to the right */
        
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }
        /* The dots/bullets/indicators */
        
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }
        
        .active,
        .dot:hover {
            background-color: #717171;
        }
        /* Fading animation */
        
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }
        
        @-webkit-keyframes fade {
            from {
                opacity: .4
            }
            to {
                opacity: 1
            }
        }
        
        @keyframes fade {
            from {
                opacity: .4
            }
            to {
                opacity: 1
            }
        }
        
        table {
            border: 0px;
            display: table-row-group;
        }
        
        td {
            padding: 15px;
        }
        
        .shopcartbtn {
            background-color: #83521e;
            color: white;
            width: 200px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        
        .shopcartbtn:hover {
            opacity: 0.6;
        }
        
        .Waterfall {
            width: 1180px;
            display: flex;
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
        <form action="">
            <input type="text" placeholder="SEARCH" class="Keyword">
            <input type="submit" class="Search_btn" value="" style="margin-right:-185px;">
        </form>
        <div class="navWrapper">
            <a href="#"><img src="img/logo.png" style="width: 122px;height: 48px;"></a>
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
            <ul class="topnav" style="margin-left: 390px; color: #4d3126;">
                <li><a href="">訂閱電子報</a></li>
                <li class="boundary"></li>
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

        <!-- ---輪播--- -->
        <div class="slideshow-container ">
            <!-- Full-width images with number and caption text -->

            <div class="mySlides slide ">
                <img src="img/43693_1P399_1180X630_200916_TW.jpg " style="width:100% ">
            </div>
            <div class="mySlides fade ">
                <img src="img/46301_3P399_1180X630_200918_TW.jpg " style="width:100% ">
            </div>
            <div class="mySlides fade ">
                <img src="img/46713_3P798_1180X630_200914_TW.jpg " style="width:100% ">
            </div>
            <div class="mySlides fade ">
                <img src="img/50027_SWEAT_1180X630_200910_TW.jpg " style="width:100% ">
            </div>
            <div class="mySlides fade ">
                <img src="img/50735_1P350UP_1180X630_200915_TW.jpg " style="width:100% ">
            </div>
            <div class="mySlides fade ">
                <img src="img/50761_OUTERWEAR_1180X630_200908_TW3_1.jpg " style="width:100% ">
            </div>
            <div class="mySlides fade ">
                <img src="img/51001_COTTON_1180X630_200908_TW2.jpg " style="width:100% ">
            </div>

            <!-- Next and previous buttons -->
            <a class="prev " onclick="plusSlides(-1) ">&#10094;</a>
            <a class="next " onclick="plusSlides(1) ">&#10095;</a>
            <div style="text-align:center; top: 100px; ">
                <span class="dot " onclick="currentSlide(1) "></span>
                <span class="dot " onclick="currentSlide(2) "></span>
                <span class="dot " onclick="currentSlide(3) "></span>
                <span class="dot " onclick="currentSlide(4) "></span>
                <span class="dot " onclick="currentSlide(5) "></span>
                <span class="dot " onclick="currentSlide(6) "></span>
                <span class="dot " onclick="currentSlide(7) "></span>
            </div>
        </div>

        <table class="middle_serves ">
            <tr>
                <td>
                    <a href="# "><img src="img/comments_icon220X70_190903_TW.gif " alt=" "></a>
                </td>
                <td>
                    <a href="# "><img src="img/icon_line_TW.gif " alt=" "></a>
                </td>
                <td>
                    <a href="# "><img src="img/app_icon220X70_190904_TW.gif " alt=" "></a>
                </td>
                <td>
                    <a href="# "><img src="img/icon_line_TW.gif " alt=" "></a>
                </td>
                <td>
                    <a href="# "><img src="img/icon_fb_161121_TW.gif " alt=" "></a>
                </td>
                <td>
                    <a href="# "><img src="img/icon_line_TW.gif " alt=" "></a>
                </td>
                <td>
                    <a href="# "><img src="img/icon_OVERSEAS_200520_TW.gif " alt=" "></a>
                </td>
            </tr>
        </table>

        <div class="Waterfall ">
            <div class="waterfall_layout_1 " style="width: 380px; ">
                <img src="img/50537_50762_50743_560_200901_2_TW1.jpg " style="width: 380px; margin-bottom: 15px; ">
                <img src="img/col1-1.jpg " style="margin-bottom: 15px; ">
                <img src="img/col1-2.jpg " style="margin-bottom: 15px; ">
                <img src="img/col1-3.jpg " style="margin-bottom: 15px; ">
                <img src="img/col1-4.jpg " style="margin-bottom: 15px; ">
                <img src="img/col1-5.jpg " style="margin-bottom: 15px; ">
                <img src="img/col1-6.jpg " style="margin-bottom: 15px; ">
                <img src="img/col1-7.jpg " style="margin-bottom: 15px; ">
                <img src="img/col1-8.jpg " style="margin-bottom: 15px; ">
                <img src="img/col1-9.jpg " style="margin-bottom: 15px; ">
                <img src="img/col1-10.jpg " alt=" ">
            </div>
            <div class="waterfall_layout_2 " style="width: 380px; margin-left:15px; ">
                <img src="img/50537_50762_50743_560_200901_2_TW2.jpg " style="width: 380px;margin-bottom: 15px; ">
                <img src="img/col2-1.jpg " style="margin-bottom: 15px; ">
                <img src="img/col2-2.jpg " style="margin-bottom: 15px; ">
                <img src="img/col2-3.jpg " style="margin-bottom: 15px; ">
                <img src="img/col2-4.jpg " style="margin-bottom: 15px; ">
                <img src="img/col2-5.jpg " style="margin-bottom: 15px; ">
                <img src="img/col2-6.jpg " style="margin-bottom: 15px; ">
                <img src="img/col2-7.jpg " style="margin-bottom: 15px; ">
                <img src="img/col2-8.jpg " style="margin-bottom: 15px; ">
                <img src="img/col2-9.jpg " style="margin-bottom: 15px; ">
                <img src="img/col2-10.jpg " alt=" ">
            </div>
            <div class="waterfall_layout_3 " style="width: 380px; margin-left:15px ">
                <img src="img/50537_50762_50743_560_200901_2_TW3.jpg " style="width: 380px;margin-bottom: 15px; ">
                <img src="img/col3-1.jpg " style="margin-bottom: 15px; ">
                <img src="img/col3-2.jpg " style="margin-bottom: 15px; ">
                <img src="img/col3-3.jpg " style="margin-bottom: 15px; ">
                <img src="img/col3-4.jpg " style="margin-bottom: 15px; ">
                <img src="img/col3-5.jpg " style="margin-bottom: 15px; ">
                <img src="img/col3-6.jpg " style="margin-bottom: 15px; ">
                <img src="img/col3-7.jpg " style="margin-bottom: 15px; ">
                <img src="img/col3-8.jpg " style="margin-bottom: 15px; ">
                <img src="img/col3-9.jpg " style="margin-bottom: 15px; ">
                <img src="img/col3-10.jpg " alt=" ">
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


    </div>



    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName(" mySlides ");
            var dots = document.getElementsByClassName("dot ");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none ";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active ", " ");
            }
            slides[slideIndex - 1].style.display = "block ";
            dots[slideIndex - 1].className += " active ";
        }
    </script>

</body>

</html>