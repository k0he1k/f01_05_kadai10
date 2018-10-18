<?php
session_start();
// include('function.php');
// logincheck();

//1.  DB接続します
include('function.php');
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT*FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status == false) {
  errorMsg($stmt);
} else {
  //Selectデータの数だけ自動でループしてくれる
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $view .= '<p>';
    $view .= '<a href="detailsub.php?id=' . $result['id'] . '">';  //更新ページへのaタグを作成
    $view .= $result['bookname'] . '[' . $result['indate'] . ']';
    $view .= '</a>';
    $view .= '</p>';
    $view .= $result['image'];
  }
}
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
      <a class="navbar-brand" href="login.php">login</a>
      <!-- <a class="navbar-brand" href="logout.php" ><font color="#A9A9A9">log_out</font></a> -->
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?= $view ?></div>
  </div>
</div>
<!-- Main[End] -->

</body>
</html>
