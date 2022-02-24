<?php
session_start();
include("funcs.php");
loginCheck();

//1.POSTでid, title, url, comment を取得
$id = $_POST["id"];
$title = $_POST["title"];
$url = $_POST["url"];
$comment = $_POST["comment"];

//2.DB接続
$pdo = db_connect();

//3.UPDATE unit_table SET .... で更新（bindValue）
$sql = 'UPDATE unit_table SET title=:title, url=:url, comment=:comment WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //変更したいidを渡す
$status = $stmt->execute();

//4.データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);

} else {
    //select.phpへリダイレクト
    header("Location:select.php");
    exit;
}


?>