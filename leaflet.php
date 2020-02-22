<?php
$lid = $_GET['lid'];

// データベース接続
include("funcs.php");
$pdo = db_conn();

//リーフレット取得SQL作成
$stmt = $pdo->prepare("SELECT content_url FROM tl_content_table WHERE lid=:lid");
$stmt->bindValue(':lid',$lid,PDO::PARAM_INT);
$status = $stmt->execute();

$row = $stmt->fetch();

// 保存されているイメージのパス情報を取得
$str = $row['content_url'];
$img_path_temp = preg_match('/\".*\"/', $str, $matches);
$img_path = trim($matches[0], '"');

?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>leaflet</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <div class="leaflet-header-wrapper">
        <a class="leaflet-letter-button" href="index.php">戻る</a>
        </div>
        
        <div class="leaflet-main">
            <?php echo $row['content_url'];?>
            <!-- キャンバス -->
            <canvas id="drawarea" width=600px height=700px></canvas>
            <nav>
                <!-- 線の色を変更するHTML要素 -->
                <input type="color", name="", id="changecolor">
        
                <!-- 線の太さを変更するHTML要素 -->
                <input type="range" name="" id="range" min="0" max="30">
        
                <p class="leaflet-letter-button" id="clear_btn">クリア
                <p class="leaflet-letter-button" id="download_btn">ダウンロード
            </nav>
        </div>
    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- JavaScript -->
    <script src="js/main.js"></script> 
</body>
</html>