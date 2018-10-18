<!-- 30行目まではコピー -->
<?php
//「||」⇒または
if (!isset($_POST["lid"]) || $_POST["lid"] == "" ||
  !isset($_POST["lpw"]) || $_POST["lpw"] == "") {
  exit('ParamError');
}

//1. POSTデータ取得
session_start();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//2. DB接続します
include("function.php");
$pdo = db_conn();

//３．データ登録SQL作成※VALUES設定時「:」は先に設置する必要あり
$sql = "SELECT * FROM gs_user_table WHERE lid=:lid AND lpw=:lpw";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("sqlError:" . $error[2]);
};

//５. 抽出データを取得
$val = $stmt->fetch();

//６. 該当レコードがあればSESSIONに値を代入
if ($val["id"] != "") {
  $_SESSION["chk_ssid"] = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["life_flg"] = $val['life_flg'];
  $_SESSION["name"] = $val['name'];
  header("location: select.php");
  // if ($_SESSION["kanri_flg"] = 1) {
  //   header("locatipn: selectuser.php");
// }
} else {
  // alert("Unregistered");
  exit('そのID・PWではログインできません');
}

//処理終了
exit();
?>
