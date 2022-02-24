<?php
session_start();
include('funcs.php');
loginCheck();

/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得

$title = $_POST['title'];
$url = $_POST['url'];
$comment = $_POST['comment'];

// 表示、表示確認したら全てコメントアウト🤗
// echo $title;
// echo $url;
// echo $comment;

//2. DB接続します
$pdo = db_connect();

//３．データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO unit_table(id, title, url, comment, indate)VALUES(NULL, :title, :url, :comment, sysdate())");

//  2. バインド変数を用意
$stmt->bindValue(':title', $title, PDO:: PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url ,PDO:: PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO:: PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: inputdata.php");
  exit;

}
?>