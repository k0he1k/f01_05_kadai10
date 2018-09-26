<?php
//入力チェック(受信確認処理追加)
if (!isset($_POST["bookname"]) || $_POST["bookname"] == "" ||
  !isset($_POST["bookurl"]) || $_POST["bookurl"] == "" ||
  !isset($_POST["rank"]) || $_POST["rank"] == "" ||
  !isset($_POST["comment"]) || $_POST["comment"] == "") {
  exit('ParamError');
}

//1. POSTデータ取得
//$name = filter_input( INPUT_GET, "name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$id = $_POST['id'];
$bookname = $_POST["bookname"];
$bookurl = $_POST["bookurl"];
$rank = $_POST["rank"];
$comment = $_POST["comment"];

//2. DB接続します(エラー処理追加)
include('function.php');
$pdo = db_conn();


//3．データ登録SQL作成
// $stmt = $pdo->prepare('UPDATE gs_bm_table SET bookname=:a1,bookurl=:a2,comment=:a3,rank=:a4 WHERE id=:id');
// $stmt->bindValue(':a1', $bookname, PDO::PARAM_STR);
// $stmt->bindValue(':a2', $bookurl, PDO::PARAM_STR);
// $stmt->bindValue(':a3', $comment, PDO::PARAM_STR);
// $stmt->bindValue(':a4', $rank, PDO::PARAM_INT);
// $stmt->bindValue(':id', $id, PDO::PARAM_INT);
// $status = $stmt->execute();

$sql = "UPDATE gs_bm_table SET bookname=:a1,bookurl=:a2,comment=:a3,rank=:a4 WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $bookname, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $bookurl, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $rank, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


//4．データ登録処理後
if ($status == false) {
  errorMsg($stmt);
} else {
  header('location: select.php');
  exit;
}
?>
