<?php
session_start();
include('function.php');
logincheck();

// getで送信されたidを取得
$id = $_GET['id'];
echo "GET:" . $id;


//1.  DB接続します
// include('function.php');
$pdo = db_conn();


//２．データ登録SQL作成，指定したidのみ表示する
$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if ($status == false) {
  // エラーのとき
  errorMsg($stmt);
} else {
  // エラーでないとき
  $rs = $stmt->fetch();
  // fetch()で1レコードを取得して$rsに入れる
  // $rsは配列で返ってくる．$rs["id"], $rs["name"]などで値をとれる
  // var_dump()で見てみよう
}

// $error_msg = '';
// $check = isset($_POST['kanri_flg']) ? $_POST['kanri_flg'] : '';
// if ($check === "") {
//   $error_msg .= "選択されていません<br />";
// }
// print $error_msg;
?>

?>

<!-- htmlは「index.php」とほぼ同じです -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>更新ページ</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="selectuser.php">user_list</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<p><div align=center>user mark</div></p>
<form method="post" action="updateuser.php">
  <div class="jumbotron">
   <fieldset>
    <legend>update</legend>
     <label>name：<input type="text" name="name" value="<?= $rs["name"] ?>"></label><br> 
     <label>loginid：<input type="text" name="lid" value="<?= $rs["lid"] ?>"></label><br>
     <label>loginPW：<input type="text" name="lpw" value="<?= $rs["lpw"] ?>"></label><br>
     <label>kanri_flag：<div class="ran"><input type="radio" name="kanri_ﬂg" value="1" >管理
                                        <input type="radio" name="kanri_ﬂg" value="0">ユーザー</div></label>
     <label>life_flag：<div class="ran"><input type="radio" name="life_ﬂg" value="0" checked="checked" >入会
                                        <input type="radio" name="life_ﬂg" value="1" >退会</div></label>
     <input type="submit" value="save"><br>
     <!-- idは変えたくない = ユーザーから見えないようにする-->
     <input type="hidden" name="id" value="<?= $rs["id"] ?>">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
<style>
.jumbotron{
  text-align: center
}
label{
  display: flex;
  justify-content: center;
}
.ran{
  width:200px;
}
</style>

</body>
</html>
