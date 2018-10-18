<?php
// session_start();
// include('function.php');
// // logincheck();

// // getで送信されたidを取得
$id = $_GET['id'];
// echo "GET:" . $id;


//1.  DB接続します
include('function.php');
$pdo = db_conn();


//２．データ登録SQL作成，指定したidのみ表示する
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id = :id');
// $stmt = $pdo->prepare('SELECT * FROM gs_bm_table');
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
    <div class="navbar-header"><a class="navbar-brand" href="selectsub.php">mark_list</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- <form method="post" action="update.php"> -->
  <div class="jumbotron">
   <fieldset>
    <legend>update</legend>
     <label>title：<?= $rs["bookname"] ?></label><br> 
     <label>URL：<?= $rs["bookurl"] ?></label><br>
     <label>rank：<?= $rs["rank"] ?></label>
     <label>comment:<?= $rs["comment"] ?></label><br>
     <!-- <input type="submit" value="save"><br> -->
     <!-- idは変えたくない = ユーザーから見えないようにする-->
    </fieldset>
  </div>
<!-- </form> -->
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
