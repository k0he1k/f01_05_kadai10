<!-- 30行目まではコピー -->
<?php
//「||」⇒または
if (!isset($_POST["bookname"]) || $_POST["bookname"] == "" ||
  !isset($_POST["bookurl"]) || $_POST["bookurl"] == "" ||
  !isset($_POST["rank"]) || $_POST["rank"] == "" ||
  !isset($_POST["comment"]) || $_POST["comment"] == "") {
  exit('ParamError');
}

//1. POSTデータ取得
//$name = filter_input( INPUT_GET, "name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$bookname = $_POST["bookname"];
$bookurl = $_POST["bookurl"];
$rank = $_POST["rank"];
$comment = $_POST["comment"];

//2. DB接続します
include("function.php");
$pdo = db_conn();

//３．データ登録SQL作成※VALUES設定時「:」は先に設置する必要あり
// $sql ="INSERT INTO gs_php02_table(id,name,email,detail,indate)
// VALUES(NULL,:a1,:a2,:a3,sysdate())";
$sql = "INSERT INTO gs_bm_table(id,bookname,bookurl,comment,indate,rank)
VALUES(NULL,:a1,:a2,:a3,sysdate(),:a4)";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $bookname, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $bookurl, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $rank, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("sqlError:" . $error[2]);
} else {
  //５．index.phpへリダイレクト※locationの次にスペースが必須
  header("location: index.php");
}
?>
