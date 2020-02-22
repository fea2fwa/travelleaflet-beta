<?php
session_start();

include("funcs.php");

loginCheck();

admin();


//２．データベース読み込み
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM tl_user_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
  sql_error($stmt);
}else{
  while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= '<p>';
    $view .= '<a href="user_details.php?id='.$r["id"].'">';
    $view .= $r["lid"]."|".$r["paid"];
    $view .= '</a>';
    $view .= "　";
    $view .= '<a class="" href="user_delete.php?id='.$r["id"].'">';
    $view .= '[<i class=""></i>削除]';
    $view .= '</a>';
    $view .= '</p>';
  }
}
?>



<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザリスト</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="header-wrapper">
    <div class="page-logo">
      <a href="index.php"><img src="img/logo.png" alt="header-logo"></a>
    </div>
    <div class="top-menu">
      <?php include("menu.php") ?>
    </div>
  </div>
  <div>
    <div><?=$view?></div>
  </div>
</body>
</html>