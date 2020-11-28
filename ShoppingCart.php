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
    <title>WOMAN-新品</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon-32x32.png">
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        
        body {
            margin: 8px;
        }
        
        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 15px;
        }
        
        .container {
            margin-right: auto;
            margin-left: auto;
            width: 1180px;
        }
        
        form {
            height: 27px;
            width: 180px;
            margin-top: 8px;
            display: flex;
            float: right;
            margin-right: 30px;
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
            width: 100%;
            padding-top: 8px;
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
        
        h4 {
            font-size: medium;
            font-weight: bold;
        }
        
        .show-cart li {
            display: flex;
        }
        
        .card {
            margin-bottom: 20px;
            border: none;
        }
        
        .card-img-top {
            width: 220px;
            height: 330px;
            align-self: center;
        }
        
        .add-to-cart {
            background-color: #83521e;
            color: white;
            width: 150px;
            height: 40px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        
        .add-to-cart:hover {
            color: white;
            opacity: 0.6;
        }
        
        .footer {
            display: flex;
            width: 1180px;
            border-top: 1px #f0f0f0 solid;
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
        
        .saleMenu {
            width: 165px;
            font-size: 12px;
        }
        
        li {
            list-style-type: none;
        }
        
        ul {
            padding-left: 0px;
        }
        
        .newproducts {
            color: #83521e;
            text-decoration: none;
        }
        
        .newproducts:hover {
            text-decoration: underline;
            color: #83521e;
        }
    </style>
</head>

<body>

</body>
<img src="img/icon_top.png" onclick="topFunction()" id="myBtn" title="Go to top">
<div class="container">
    <!-- Nav -->
    <form action="">
        <input type="text" placeholder="SEARCH" class="Keyword">
        <input type="submit" class="Search_btn" value="" style="margin-left:-20px;">
    </form>
    <div class="navWrapper">
        <a href="Home.php"><img src="img/logo.png" style="width: 122px;height: 48px;"></a>
        <ul style="margin-left: 50px;">
            <li>
                <a href="#">WOMEN</a>
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
        <ul class="topnav" style="color: #4d3126; margin-left: 330px;">
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
            <li class="boundary"></li>
            <li><a style="cursor: pointer;" data-toggle="modal" data-target="#cart"><span class="total-count"></span>個商品</a></li>

        </ul>
    </div>
    <div class="exhibiteContainer" style="display: flex;">
        <div class="saleMenu">
            <h4 style="margin-top:10px;">女裝新品 & 熱銷</h4>
            <ul style="padding-left: 0px;padding-bottom: 21px ;margin-right: 20px;border-bottom: 1px #f0f0f0 solid; ">
                <li>
                    <a href=" " class="newproducts ">>溫差推薦．2件85折起</a>
                </li>
                <li>
                    <a href=" " class="newproducts ">>超值特惠．2件660</a></li>
                <li>
                    <a href=" " class="newproducts ">>驚喜優惠．2件398</a></li>
                <li>
                    <a href=" " class="newproducts ">>零碼出清．5折起</a></li>
                <li>
                    <a href=" " class="newproducts ">>人氣大賞．任選75折</a></li>
                <li>
                    <a href=" " class="newproducts ">>百搭衣著．3件399</a></li>
                <li>
                    <a href=" " class="newproducts ">>精選單品．99元起</a></li>
            </ul>
            <h4>上衣類</h4>
            <ul style="padding-left: 0px; ">
                <li>>聯名印花長T</li>
                <li>>聯名印花短T</li>
                <li>>設計印花T</li>
                <li>>棉質短袖</li>
                <li>>五/七分袖</li>
                <li>>棉質長袖</li>
                <li>>針織衫</li>
                <li>>快乾系列</li>
                <li>>polo系列</li>
                <li>>莫代爾系列</li>
                <li>>條紋系列</li>
                <li>>長版上衣</li>
                <li>>輕涼系列</li>
                <li>>Bra系列</li>
                <li>>細肩帶/背心</li>
                <li>>厚棉系列</li>
                <li>>Fleece系列</li>
                <li>>立領/高領</li>
            </ul>
            <h4>襯衫類</h4>
            <ul style="padding-left: 0px; ">
                <li>>商務襯衫</li>
                <li>>法蘭絨襯衫</li>
                <li>>嫘縈/雪紡</li>
                <li>>休閒襯衫</li>
                <li>>亞麻/棉麻襯衫</li>
                <li>>格紋襯衫</li>
            </ul>
            <h4>外套類</h4>
            <ul>
                <li>>風衣外套</li>
                <li>>休閒外套</li>
                <li>>針織外套</li>
                <li>>極輕羽絨</li>
                <li>>抗UV系列</li>
                <li>>Fleece系列</li>
            </ul>
            <h4>下身類</h4>
            <ul>
                <li>>短褲</li>
                <li>>七/九分褲</li>
                <li>>牛仔系列</li>
                <li>>寬褲系列</li>
                <li>>休閒長褲</li>
                <li>>連身/吊帶褲</li>
                <li>>緊身褲</li>
                <li>>保暖褲</li>
                <li>>裙子</li>
                <li>>家居褲</li>
                <li>>內搭褲</li>
            </ul>
            <h4>洋裝</h4>
            <ul>
                <li>>襯衫式洋裝</li>
                <li>>無袖洋裝</li>
                <li>>短袖洋裝</li>
                <li>>七分/長袖洋裝</li>
                <li>>Bra系列</li>
                <li>>吊帶裙</li>
            </ul>
            <h4>內衣類</h4>
            <ul>
                <li>>無鋼圈內衣</li>
                <li>>Bra系列</li>
                <li>>內褲系列</li>
                <li>>細肩帶/背心</li>
                <li>>輕涼系列</li>
                <li>>heatup系列</li>
            </ul>
            <h4>家居服</h4>
            <ul>
                <li>>家居套裝</li>
                <li>>家居洋裝</li>
                <li>>家居褲</li>
                <li>>家居毯</li>
            </ul>
            <h4>配件</h4>
            <ul>
                <li>>皮帶</li>
                <li>>圍巾/帽子</li>
                <li>>襪子系列</li>
                <li>>鞋類</li>
            </ul>
        </div>
        <!-- Main -->

        <div class="row">
            <div class="col">
                <div class="card" style="width: 220px;height: 500px;">
                    <img class="card-img-top" src="img/p01.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">史努比Fleece寬鬆上衣</h6>
                        <p class="card-text">NT$350</p>
                        <button href="#" data-name="史努比Fleece寬鬆上衣" data-price="350" class="add-to-cart" style="color: white;">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p02.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">毛圈寬版連帽衫</h6>
                        <p class="card-text">NT$490</p>
                        <button href="#" data-name="毛圈寬版連帽衫" data-price="490" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p03.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">高腰印花長裙</h6>
                        <p class="card-text">NT$490</p>
                        <button href="#" data-name="高腰印花長裙" data-price="490" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p04.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">迪士尼Fleece寬鬆上衣</h6>
                        <p class="card-text">NT$399</p>
                        <button href="#" data-name="迪士尼Fleece寬鬆上衣" data-price="399" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p05.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">迪士尼Fleece造型連帽衫</h6>
                        <p class="card-text">NT$490</p>
                        <button href="#" data-name="迪士尼Fleece造型連帽衫" data-price="490" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p06.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">鋪棉飛行外套</h6>
                        <p class="card-text">NT$690</p>
                        <button href="#" data-name="鋪棉飛行外套" data-price="690" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p07.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">刷毛圓領衫</h6>
                        <p class="card-text">NT$399</p>
                        <button href="#" data-name="刷毛圓領衫" data-price="399" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p08.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">迪士尼Fleece寬鬆上衣</h6>
                        <p class="card-text">NT$350</p>
                        <button href="#" data-name="迪士尼Fleece寬鬆上衣" data-price="350" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
            </div>
            <div class="col" style="margin: auto;">
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p09.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">粗針混紡圓領毛衣</h6>
                        <p class="card-text">NT$490</p>
                        <button href="#" data-name="粗針混紡圓領毛衣" data-price="490" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p10.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">毛圈長版連帽衫</h6>
                        <p class="card-text">NT$590</p>
                        <button href="#" data-name="毛圈長版連帽衫" data-price="590" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p11.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">高腰卡其鈕釦長裙</h6>
                        <p class="card-text">NT$590</p>
                        <button href="#" data-name="高腰卡其鈕釦長裙" data-price="590" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p12.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">Fleece保暖脖圍</h6>
                        <p class="card-text">NT$149</p>
                        <button href="#" data-name="Fleece保暖脖圍" data-price="149" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p13.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">純色圍巾</h6>
                        <p class="card-text">NT$299</p>
                        <button href="#" data-name="純色圍巾" data-price="299" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p14.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">刷毛連帽衫</h6>
                        <p class="card-text">NT$499</p>
                        <button href="#" data-name="刷毛連帽衫" data-price="499" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p15.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">燈芯絨襯衫式洋裝</h6>
                        <p class="card-text">NT$690</p>
                        <button href="#" data-name="迪士尼Fleece寬鬆上衣" data-price="350" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p16.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">船型領綁帶長版毛衣</h6>
                        <p class="card-text">NT$590</p>
                        <button href="#" data-name="船型領綁帶長版毛衣" data-price="590" class="add-to-cart">加入購物車</button>
                    </div>
                </div>

            </div>
            <div class="col" style="margin:auto">
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p17.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">法蘭絨格紋襯衫</h6>
                        <p class="card-text">NT$399</p>
                        <button href="#" data-name="法蘭絨格紋襯衫" data-price="399" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p18.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">高腰百褶長裙</h6>
                        <p class="card-text">NT$590</p>
                        <button href="#" data-name="高腰百褶長裙" data-price="590" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p19.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">牛仔長袖襯衫</h6>
                        <p class="card-text">NT$490</p>
                        <button href="#" data-name="牛仔長袖襯衫" data-price="490" class="add-to-cart">加入購物車</a>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p20.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">嫘縈雙口袋襯衫</h6>
                        <p class="card-text">NT$490</p>
                        <button href="#" data-name="嫘縈雙口袋襯衫" data-price="490" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p21.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">高腰靴型九分牛仔褲</h6>
                        <p class="card-text">NT$590</p>
                        <button href="#" data-name="高腰靴型九分牛仔褲" data-price="590" class="add-to-cart">加入購物車</a>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p22.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">高腰收腹牛仔緊身褲</h6>
                        <p class="card-text">NT$399</p>
                        <button href="#" data-name="高腰收腹牛仔緊身褲" data-price="399" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p23.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">嫘縈V領寬版襯衫</h6>
                        <p class="card-text">NT$490</p>
                        <button href="#" data-name="嫘縈V領寬版襯衫" data-price="490" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p24.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">法蘭絨格紋洋裝</h6>
                        <p class="card-text">NT$690</p>
                        <button href="#" data-name="法蘭絨格紋洋裝" data-price="690" class="add-to-cart">加入購物車</button>
                    </div>
                </div>

            </div>
            <div class="col" style="margin:auto">
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p25.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">柔軟V領羅紋毛衣</h6>
                        <p class="card-text">NT$490</p>
                        <button href="#" data-name="柔軟V領羅紋毛衣" data-price="490" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p26.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">迪士尼系列提花毛衣</h6>
                        <p class="card-text">NT$490</p>
                        <button href="#" data-name="迪士尼系列提花毛衣" data-price="490" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p27.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">兩用圍巾</h6>
                        <p class="card-text">NT$490</p>
                        <button href="#" data-name="兩用圍巾" data-price="490" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p28.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">棉質羅紋長版T恤</h6>
                        <p class="card-text">NT$249</p>
                        <button href="#" data-name="棉質羅紋長版T恤" data-price="249" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p29.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">棉質羅紋V領長袖T恤</h6>
                        <p class="card-text">NT$249</p>
                        <button href="#" data-name="棉質羅紋V領長袖T恤" data-price="249" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p30.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">法蘭絨格紋長褲</h6>
                        <p class="card-text">NT$299</p>
                        <button href="#" data-name="法蘭絨格紋長褲" data-price="299" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p31.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">柔軟圓領毛衣</h6>
                        <p class="card-text">NT$490</p>
                        <button href="#" data-name="柔軟圓領毛衣" data-price="490" class="add-to-cart">加入購物車</button>
                    </div>
                </div>
                <div class="card" style="width: 220px; height: 500px;">
                    <img class="card-img-top" src="img/p32.jpg" style="min-width: 220px; height: 330px;">
                    <div class="card-block">
                        <h6 class="card-title">毛圈連帽外套</h6>
                        <p class="card-text">NT$490</p>
                        <button href="#" data-name="毛圈連帽外套" data-price="490" class="add-to-cart">加入購物車</button>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">購物車</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <table class="show-cart table">

                    </table>
                    <div>總金額: NT$<span class="total-cart"></span></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                    <button type="button" class="btn" style="background-color: #83521e;color: white;cursor: pointer;">現在下訂</button>
                </div>
            </div>
        </div>
    </div>
    <div class=" footer ">
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
    //Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction();
    }

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    };
</script>
<script src="ShoppingCart.js"></script>

</html>