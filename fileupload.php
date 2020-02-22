<?php

$leaflet_name = "テストその1";
$lat = 38.9888;
$lng = 876.9632578438;
$categories = "not-yet-given";
$price = 1000;
$paid_user = 0;

if( isset($_FILES["upfile"]) && $_FILES["upfile"]["error"]==0 ){
    $file_name = $_FILES["upfile"]["name"];
    $tmp_path = $_FILES["upfile"]["tmp_name"]; //一時保存先のパスを取得

    $extension = pathinfo($file_name, PATHINFO_EXTENSION); //拡張子を取得する
    $file_name = date("YmdHis").md5(session_id()).'.'.$extension; //ユニークな名前を作成、セッションIDはsession_startしていなくても呼び出せる！意図的に呼び出す必要がある場合もある
    // echo $extension;

    //アップロード処理
    $img="";
    $file_dir_path="leaflets/".$file_name; //保存場所と名前の指定

    if( is_uploaded_file($tmp_path) ){
        if( move_uploaded_file($tmp_path, $file_dir_path) ){
            chmod($file_dir_path,0644);
            $img = '<img src="'.$file_dir_path.'">';
        }else{
            echo "Error: ファイル移動失敗";
        }

        //DB接続します(エラー処理追加)
        include("funcs.php");
        $pdo = db_conn();


        //データ登録SQL作成
        $stmt = $pdo->prepare("INSERT INTO tl_content_table (lid,leaflet_name,lat,lng,content_url,categories,price,paid_user) VALUES(NULL,:leaflet_name,:lat,:lng,:content_url,:categories,:price,:paid_user)");
        $stmt->bindValue(':leaflet_name',$leaflet_name,PDO::PARAM_STR);
        $stmt->bindValue(':lat',$lat,PDO::PARAM_STR);
        $stmt->bindValue(':lng',$lng,PDO::PARAM_STR);
        $stmt->bindValue(':content_url',$img,PDO::PARAM_STR);
        $stmt->bindValue(':categories',$categories,PDO::PARAM_STR);
        $stmt->bindValue(':price',$price,PDO::PARAM_INT);
        $stmt->bindValue(':paid_user',$paid_user,PDO::PARAM_INT);
        $status = $stmt->execute();
    }

}else{
    echo "アップロード失敗";
}

//[FileUploadCheck--END--] 

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
            <?php echo $img; ?>
        </div>
    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- JavaScript -->
    <script src="js/main.js"></script> 
</body>
</html>