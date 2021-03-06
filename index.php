<?php
session_start();
include('function.php');
logincheck();

//1.  DB接続します
// include('function.php');
$pdo = db_conn();

$view_kanri = '';
$sqll = "SELECT*FROM gs_user_table WHERE name = :a1";
$stmt_user = $pdo->prepare($sqll);
$stmt_user->bindValue(':a1', $_SESSION['name'], PDO::PARAM_STR);
$status = $stmt_user->execute();
$get = $stmt_user->fetch();
$get_kanri = $get['kanri_ﬂg'];
// echo ($get_kanri);

if ($get["kanri_ﬂg"] == 1) {
  $view_kanri .= '<a class="navbar-brand" href="selectuser.php">user_list</a>';
  $view_kanri .= '<a class="navbar-brand" href="indexuser.php">user_add</a>';
};
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>book_mark</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">book_list</a><?= $view_kanri ?></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- <p><div align=center><?= $_SESSION['name'] ?>'s mark</div></p> -->
<form method="post" action="insert.php" enctype="multipart/form-data">
  <div class="jumbotron">
   <fieldset>
    <legend>marking</legend>
     <label>title：<input type="text" name="bookname"></label><br> 
     <label>URL：<input type="text" name="bookurl"></label><br>
     <label>rank：<div class="ran"><input type="range" name="rank" min="1" max="5" value=3 step="1"
  oninput="document.getElementById('output1').value=this.value"/><output id="output1">3</output>
</div></label>
     <label>comment:<textArea name="comment" rows="4" cols="40"></textArea></label><br>
     <label><input type="file" name="upfile" accept="image/*" capture="camera"></label><br>
     <input type="submit" value="save"><br>

     <!-- <div><a href ="http://localhost/08_05_katokohei_ex/select3.php">mark_list</a></div> -->
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

<script>
</script>
</body>
</html>
