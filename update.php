<?php
//入力チェック(受信確認処理追加)
if (!isset($_POST["bookname"]) || $_POST["bookname"] == "" ||
  !isset($_POST["bookurl"]) || $_POST["bookurl"] == "" ||
  !isset($_POST["rank"]) || $_POST["rank"] == "" ||
  !isset($_POST["comment"]) || $_POST["comment"] == "") {
  exit('ParamError');
}

//1. POSTデータ取得
//$name = filter_input( INPUT_GET, "name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$id = $_POST['id'];
$bookname = $_POST["bookname"];
$bookurl = $_POST["bookurl"];
$rank = $_POST["rank"];
$comment = $_POST["comment"];

// アップロード関連を追加
if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
    // ファイルをアップロードしたときの処理
    //アップロードしたファイルの情報取得
  $file_name = $_FILES['upfile']['name'];     //アップロードしたファイルのファイル名
  $tmp_path = $_FILES['upfile']['tmp_name']; //アップロード先のTempフォルダ
  $file_dir_path = 'upload/';                 //画像ファイル保管先のディレクトリ名，自分で設定する
    
    //File名の変更
  $extension = pathinfo($file_name, PATHINFO_EXTENSION);              //拡張子取得
  $uniq_name = date('YmdHis') . md5(session_id()) . "." . $extension;   //ユニークファイル名作成
  $file_name = $file_dir_path . $uniq_name;                             //ファイル名とパス

    // FileUpload [--Start--]
  $img = '';
  if (is_uploaded_file($tmp_path)) {
    if (move_uploaded_file($tmp_path, $file_name)) {
      chmod($file_name, 0644);
            // <img>を使って画像を出力しよう
      // $img = '<img src="' . $file_name . '">';
    } else {
      exit('Error:アップロードできませんでした．');
    }
  }
    // FileUpload [--End--]
} else {
    // ファイルをアップしていないときの処理
  $img = '画像が送信されていません'; //Error文字
}

//2. DB接続します(エラー処理追加)
include('function.php');
$pdo = db_conn();


//3．データ登録SQL作成
// $stmt = $pdo->prepare('UPDATE gs_bm_table SET bookname=:a1,bookurl=:a2,comment=:a3,rank=:a4 WHERE id=:id');
// $stmt->bindValue(':a1', $bookname, PDO::PARAM_STR);
// $stmt->bindValue(':a2', $bookurl, PDO::PARAM_STR);
// $stmt->bindValue(':a3', $comment, PDO::PARAM_STR);
// $stmt->bindValue(':a4', $rank, PDO::PARAM_INT);
// $stmt->bindValue(':id', $id, PDO::PARAM_INT);
// $status = $stmt->execute();

$sql = "UPDATE gs_bm_table SET bookname=:a1,bookurl=:a2,comment=:a3,rank=:a4,image=:image WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $bookname, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $bookurl, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $rank, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':image', $file_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


//4．データ登録処理後
if ($status == false) {
  errorMsg($stmt);
} else {
  header('location: select.php');
  exit;
}
?>
