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
  <nav class="navbar navbar-default" align="right">
    <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="login.php">For members login</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="newlogin_act.php">
  <div class="jumbotron">
   <fieldset>
    <legend>new_login_form</legend>
    <label>NAME：<input type="text" name="name"></label><br>  
     <label>ID：<input type="text" name="lid"></label><br> 
     <label>PW：<input type="text" name="lpw"></label><br>
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
