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
  // $view_kanri .= '<a class="navbar-brand" href="indexuser.php">user_add</a>';
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
    <div class="navbar-header">
    <a class="navbar-brand" href="index.php">book_mark</a>
    <a class="navbar-brand" href="select.php">book_list</a><?= $view_kanri ?>
    <a class="navbar-brand" href="logout.php" ><font color="#A9A9A9">log_out</font></a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- <p><div align=center><?= $_SESSION['name'] ?>'s mark</div></p> -->
<form method="post" action="insertuser.php">
  <div class="jumbotron">
   <fieldset>
    <legend>user_add</legend>
    <label>NAME：<input type="text" name="name"></label><br>  
     <label>ID：<input type="text" name="lid"></label><br> 
     <label>PW：<input type="text" name="lpw"></label><br>
     <label>kanri_flag：<div class="ran"><input type="radio" name="kanri_ﬂg" value="1" >管理
                                         <input type="radio" name="kanri_ﬂg" value="0" checked="checked">ユーザー</div></label>
     <label>life_flag：<div class="ran"><input type="radio" name="life_ﬂg" value="0" checked="checked" >入会
                                        <input type="radio" name="life_ﬂg" value="1" >退会</div></label>
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
