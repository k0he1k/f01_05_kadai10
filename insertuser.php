<!-- 30行目まではコピー -->
<?php
//「||」⇒または
if (!isset($_POST["name"]) || $_POST["name"] == "" ||
  !isset($_POST["lid"]) || $_POST["lid"] == "" ||
  !isset($_POST["lpw"]) || $_POST["lpw"] == "" ||
  !isset($_POST["kanri_ﬂg"]) || $_POST["kanri_ﬂg"] == "" ||
  !isset($_POST["life_ﬂg"]) || $_POST["life_ﬂg"] == "") {
  exit('ParamError');
}

//1. POSTデータ取得
$id = $_POST['id'];
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$kanri_ﬂg = $_POST["kanri_ﬂg"];
$life_ﬂg = $_POST["life_ﬂg"];

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
$sql = "INSERT INTO gs_user_table(name,lid,lpw,kanri_ﬂg,life_ﬂg)VALUES(:a1,:a2,:a3,:a4,:a5)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $lid, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $kanri_ﬂg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a5', $life_ﬂg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("sqlError:" . $error[2]);
} else {
  //５．index.phpへリダイレクト※locationの次にスペースが必須
  header("location: indexuser.php");
}
?>
