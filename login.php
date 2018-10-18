<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>login</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="newlogin.php">new_login</a>
    <a class="navbar-brand" href="selectsub.php">list</a>
    </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="login_act.php">
  <div class="jumbotron">
   <fieldset>
    <legend>login</legend>
     <label>ID：<input type="text" name="lid"></label><br> 
     <label>PW：<input type="text" name="lpw"></label><br>
     <input type="submit" value="login"><br>

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
