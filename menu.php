<?php

$menu = "";

if( !isset( $_SESSION["chk_ssid"] ) || $_SESSION["chk_ssid"] != session_id() ){
    $menu .= '<li class="nav-item"><a href="leaflet_upload.php">リーフレットをアップロード</a></li>';
    $menu .= '<li class="nav-item"><a href="user_registration.php">ユーザ登録</a></li>';
    $menu .= '<li class="nav-item"><a href="login.php">ログイン</a></li>';
}else if  ( $_SESSION["admin"] == 1){
    $menu .= '<li class="nav-item"><a href="leaflet_upload.php">リーフレットをアップロード</a></li>';
    $menu .= '<li class="nav-item"><a href="#mypage">Myページ</a></li>';
    $menu .= '<li class="nav-item"><a href="#view-history">閲覧履歴</a></li>';
    $menu .= '<li class="nav-item"><a href="user_list.php">ユーザ管理</a></li>';
    $menu .= '<li class="nav-item"><a href="">コンテンツ管理</a></li>';
    $menu .= '<li class="nav-item"><a href="user_registration.php">ユーザ登録</a></li>';
    $menu .= '<li class="nav-item"><a href="logout.php">ログアウト</a></li>';
}else if ( $_SESSION["paid"] == 1){
    $menu .= '<li class="nav-item"><a href="leaflet_upload.php">リーフレットをアップロード</a></li>';
    $menu .= '<li class="nav-item"><a href="#mypage">Myページ</a></li>';
    $menu .= '<li class="nav-item"><a href="#view-history">閲覧履歴</a></li>';
    $menu .= '<li class="nav-item"><a href="">コンテンツ管理</a></li>';
    $menu .= '<li class="nav-item"><a href="logout.php">ログアウト</a></li>';
}else{
    $menu .= '<li class="nav-item"><a href="leaflet_upload.php">リーフレットをアップロード</a></li>';
    $menu .= '<li class="nav-item"><a href="#mypage">Myページ</a></li>';
    $menu .= '<li class="nav-item"><a href="#view-history">閲覧履歴</a></li>';
    $menu .= '<li class="nav-item"><a href="logout.php">ログアウト</a></li>';
}


?>


<div class="top-menu">
    <?=$menu?>
</div>

