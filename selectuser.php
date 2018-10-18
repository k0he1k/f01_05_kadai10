<?php
session_start();
include('function.php');
logincheck();

//1.  DB接続します
// include('function.php');
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT*FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status == false) {
  errorMsg($stmt);
} else {
  //Selectデータの数だけ自動でループしてくれる
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $view .= '<p>';
    $view .= '<a href="detailuser.php?id=' . $result['id'] . '">';  //更新ページへのaタグを作成
    $view .= $result['name'];
    $view .= '</a>';
    $view .= '　';
    $view .= '<a href="delete.php?id=' . $result['id'] . '">';  //削除用aタグを作成
    $view .= '［削除］';
    $view .= '</a>';
    $view .= '</p>';
  }
}

$view_kanri = '';
$sqll = "SELECT*FROM gs_user_table WHERE name = :a1";
$stmt_user = $pdo->prepare($sqll);
$stmt_user->bindValue(':a1', $_SESSION['name'], PDO::PARAM_STR);
$status = $stmt_user->execute();
$get = $stmt_user->fetch();
$get_kanri = $get['kanri_ﬂg'];
// echo ($get_kanri);

if ($get["kanri_ﬂg"] == 1) {
  $view_kanri .= '<a class="navbar-brand" href="indexuser.php">user_add</a>';
};
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>mark_list</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">book_mark</a>
      <a class="navbar-brand" href="select.php">book_list</a>
      <?= $view_kanri ?>
      <a class="navbar-brand" href="logout.php" ><font color="#A9A9A9">log_out</font></a>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<p><div align=center>user list</div></p>
<div>
    <div class="container jumbotron"><?= $view ?></div>
  </div>
</div>
<!-- Main[End] -->

</body>
</html>
