<?php
//入力チェック(受信確認処理追加)
if (!isset($_POST["name"]) || $_POST["name"] == "" ||
  !isset($_POST["lid"]) || $_POST["lid"] == "" ||
  !isset($_POST["lpw"]) || $_POST["lpw"] == "" ||
  !isset($_POST["kanri_ﬂg"]) || $_POST["kanri_ﬂg"] == "" ||
  !isset($_POST["life_ﬂg"]) || $_POST["life_ﬂg"] == "") {
  exit('ParamError');
}

//1. POSTデータ取得
//$name = filter_input( INPUT_GET, "name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$id = $_POST['id'];
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$kanri_ﬂg = $_POST["kanri_ﬂg"];
$life_ﬂg = $_POST["life_ﬂg"];

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

$sql = "UPDATE gs_user_table SET name=:a1,lid=:a2,lpw=:a3,kanri_ﬂg=:a4,life_ﬂg=:a5 WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $lid, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $kanri_ﬂg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a5', $life_ﬂg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


//4．データ登録処理後
if ($status == false) {
  errorMsg($stmt);
} else {
  header('location: selectuser.php');
  exit;
}
?>
