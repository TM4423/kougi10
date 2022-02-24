<?php
session_start();
include("funcs.php");
loginCheck();

//1.GETでidを取得
$id = $_GET["id"];

//2.DB接続
$pdo = db_connect();

//3.UPDATE unit_table SET ....データ削除(bindValue)
$sql = 'DELETE FROM unit_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4.データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);

}else{
    //select.phpへリダイレクト
    header("Location: select.php");
    exit;
}



?>