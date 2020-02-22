<?php
session_start();
include("funcs.php");

$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//パスワードのハッシュ化
$hash = password_hash($lpw, PASSWORD_DEFAULT);

//DB接続します
$pdo = db_conn();

//データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO tl_user_table(id,lid,lpw)VALUES(NULL,:lid,:lpw)");
// bindValueはセキュリティ対策のお作法
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $hash, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $statusには成功か失敗(falseとか）が入ってくる
$status = $stmt->execute();

//データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  // $error[2]を指定するのは、これくらいが人間がみて理解できるエラーなので：全部表示すると全然わからない！
  exit("QuerryError:".$error[2]);
}else{
  //index.phpへリダイレクト
  header('Location: index.php');


}
?>