<?php
//共通で使うものを別ファイルにしておきましょう。

//DB接続関数（PDO）
function db_conn()
{
  try {
    return new PDO('mysql:dbname=gs_f01_db05;charset=utf8;host=localhost', 'root', '');
  } catch (PDOException $e) {
    exit('DbConnectError:' . $e->getMessage());
  }
}

// テーブル名※今回は一つだけ
$table = 'gs_bm_table';

//SQL処理エラー
function errorMsg($stmt)
{
  $error = $stmt->errorInfo();
  exit('ErrorQuery:' . $error[2]);
}

/**
 * XSS
 * @Param:  $str(string) 表示する文字列
 * @Return: (string)     サニタイジングした文字列
 */
function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//login check
function logincheck()
{
  if (!isset($_SESSION["chk_ssid"]) ||
    $_SESSION["chk_ssid"] != session_id()) {
    echo "Login Error!";
    exit();
  } else {
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
  }
}

?>
