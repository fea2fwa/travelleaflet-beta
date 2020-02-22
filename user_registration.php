<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー登録</title>
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

  <form method="post" action="user_insert.php">
    <div class="">
      <fieldset>
        <legend>ユーザ登録</legend>
        <label>ユーザID：<input type="text" name="lid"></label><br>
        <label>パスワード：<input type="password" name="lpw"></label><br>
        <input type="submit" value="送信">
      </fieldset>
    </div>
  </form>

</body>
</html>
