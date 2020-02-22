<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TravelLeaflet</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header-wrapper">
        <div class="page-logo">
            <a href="index.php"><img src="img/logo.png" alt="header-logo"></a>
        </div>
        <div class="top-menu">
            <?php session_start(); ?>
            <?php include("menu.php") ?>
        </div>
    </div>

    <div class="two-column-design">
        <div class="left-pane">
            <div class="searchbar">
                <form method="get" action="map_search.php">
                <p><input type="search" size="30" name="searched_address" placeholder="住所を検索" required> <input type="submit" value="検索"></p>
                </form>
            </div>
            <div class="conditions-menu">
                <div class="categories">
                    <div class="menu-items">
                        <h1>カテゴリ</h1>
                        <p><a href="#temple">寺院・神社</a></p>
                        <p><a href="#historic-site">史跡・城</a></p>
                        <p><a href="#museum">博物館</a></p>
                        <p><a href="#gallery">美術館</a></p>
                        <p><a href="#landscape">景観</a></p>
                        <p><a href="#amusement">アトラクション</a></p>
                    </div>
                </div>
                <div class="prices">
                    <div class="menu-items">
                        <h1>価格指定</h1>
                        <p><a href="#free">無料（0円）</a></p>
                        <p><a href="#five-hundred">～500円</a></p>
                        <p><a href="#one-thousand">～1,000円</a></p>
                        <p><a href="#three-shousand">～3,000円</a></p>
                        <input type="text" name="price-from" size="8">～<input type="text" name="price-to" size="8">円
                    </div>
                </div>
            </div>
        </div>
    
        <div class="right-pane">
            <div class="main-area">
                <div id="mainmap"></div>
            </div>
        </div>
    </div>
   

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- JavaScript -->
    <script src="js/main.js"></script> 
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php include("keys/googlemap.php"); ?>&callback=initMap"></script>
</body>
</html>