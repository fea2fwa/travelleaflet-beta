<?php
//最初にSESSIONを開始！！
session_start();

//POST値
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//DB接続します
include("funcs.php");
$pdo = db_conn();

$stmt = $pdo->prepare("SELECT * FROM tl_user_table WHERE lid=:lid");
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();

//SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

//抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法

//該当レコードがあればSESSIONに値を代入
if( password_verify($lpw, $val["lpw"]) ){
  //Login成功時
  $_SESSION["chk_ssid"] = session_id();
  $_SESSION["paid"] = $val['paid'];
  $_SESSION["admin"] = $val['admin'];
  header("Location: index.php");
}else{
  //Login失敗時(Logout経由)
  header("Location: login.php");
}

exit();


