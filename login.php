<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>
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
<body>
  <h2>ログインフォーム</h2>
  <!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
  <form name="form1" action="login_act.php" method="post">
  ID:<input type="text" name="lid" />
  PW:<input type="password" name="lpw" />
  <input type="submit" value="LOGIN" />
  </form>
</body>
</html>