<!-- 30行目まではコピー -->
<?php
//「||」⇒または
if (!isset($_POST["lid"]) || $_POST["lid"] == "" ||
  !isset($_POST["lpw"]) || $_POST["lpw"] == "" ||
  !isset($_POST["name"]) || $_POST["name"] == "") {
  exit('ParamError');
}


//1. POSTデータ取得
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$name = $_POST["name"];

//2. DB接続します
include("function.php");
$pdo = db_conn();

$stmt = $pdo->query("SELECT * FROM gs_user_table");
while ($item = $stmt->fetch()) {
  if ($item['name'] == $name) {
    exit('この名前はすでに登録されてます');
  } else {
    $name = $name;
  }
}

//３．データ登録SQL作成※VALUES設定時「:」は先に設置する必要あり
$sql = "INSERT INTO gs_user_table(lid,lpw,name)VALUES(:a1,:a2,:a3)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $lid, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $lpw, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $name, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("sqlError:" . $error[2]);
}

//５. 抽出データを取得
$val = $stmt->fetch();

$_SESSION["chk_ssid"] = session_id();
// $_SESSION["kanri_flg"] = $val['kanri_flg'];
$_SESSION["name"] = $val['name'];
header("location: login.php");

// //６. 該当レコードがあればSESSIONに値を代入
// if ($val["lid","lpw"] != "") {
// $_SESSION["chk_ssid"] = session_id();
//   // $_SESSION["kanri_flg"] = $val['kanri_flg'];
//   $_SESSION["name"] = $val['name'];
// header("location: select.php");
// } else {
//   header("location: newlogin.php");
// }

//処理終了
// exit();
?>
