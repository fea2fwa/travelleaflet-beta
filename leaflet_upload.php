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
                        <h1>リーフレットをアップロード</h1>
                        <p>地図上から目的地をクリックで選択して、リーフレットをアップロードしてください</p>
                        <br>
                        <form method="post" action="fileupload.php" enctype="multipart/form-data">
                            <fieldset>
                                <input type="file" name="upfile" accept="image/*">
                                <!-- <input type="submit" class="btn btn-success btn-sm" value="Fileアップロード"> -->
                                <input type="submit" value="アップロード">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="right-pane">
            <div class="main-area"></div>
                <div id="mainmap"></div>
            </div>
    </div>
   

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- JavaScript -->
    <script src="js/main.js"></script> 
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj8T-1MUPlosqCygMb8Boc982E7kK5Kb0&callback=initMap"></script>
</body>
</html>