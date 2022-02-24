<?php
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($val){
    return htmlspecialchars($val,ENT_QUOTES);
}

//LOGIN認証チェック関数
function loginCheck(){
    if (!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
        echo "LOGIN Error!";
        echo $_SESSION["chk_ssid"];
        header("Location: login.php");
        exit();
    }else{
        session_regenerate_id(true);
        $_SESSION["chk_ssid"] = session_id();
    }
}

//DB接続する
function db_connect(){
    try {
        //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=kougi7;charset=utf8;host=localhost','root','root');
    } catch (PDOException $e) {
    exit('データベースに接続できませんでした'.$e->getMessage());
    }
    return $pdo;  //これで関数の外へ出す
} 
?>