<?php
session_start();
include("funcs.php");
loginCheck();
admin();

$id = $_GET["id"]; //?id~**を受け取る

$pdo = db_conn();

//データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM tl_user_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
if($status==false) {
    sql_error();
}else{
    $row = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー詳細</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="header-wrapper">
    <div class="page-logo">
      <img src="img/logo.png" alt="header-logo">
    </div>
    <div class="top-menu">
      <?php include("menu.php") ?>
    </div>
  </div>

  <form method="post" action="user_list.php">
    <div>
      <fieldset>
        <label>ユーザID：<input type="text" name="lid" value="<?=$row["lid"]?>"></label><br>
        <input type="submit" value="戻る">
      </fieldset>
    </div>
  </form>

</body>
</html>