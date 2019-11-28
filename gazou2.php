<html>
<meta charset="UTF-8">
<body>
<?php	

// セッション開始

session_start();
$db['host'] = "localhost";  // DBサーバのURL
$db['user'] = "tb-210315";  // ユーザー名
$db['pass'] = "6hTB8RsxKc";  // ユーザー名のパスワード
$db['dbname'] = "tb210315db";  // データベース名
$dsn = 'mysql:dbname=tb210315db;host=localhost';
$pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

 
if (isset($_GET['name'])) {
  $name = $_GET['name'];
}
 
function getPDO() {
  // PHP Data Object を返す
  $dsn = 'mysql:dbname=tb210315db;host=localhost';
  $db['user'] = "tb-210315"; 
  $db['pass'] = "6hTB8RsxKc";
 
  return new PDO($dsn, $db['user'], $db['pass'] );
}
 
// 拡張子によってMIMEタイプを切り替えるための配列
$MIMETypes = array(
   'png'  => 'image/png',
   'jpg'  => 'image/jpeg',
   'jpeg' => 'image/jpeg',
   'gif'  => 'image/gif',
   'bmp'  => 'image/bmp',
);
 
try {
 
  $pdo = getPDO();
 
  $tableName = "ImageData";
 
  // データベースから条件に一致する行を取り出す
  $data = $pdo->query('SELECT * FROM ' . $tableName . ' WHERE name = "' . $name . '"')->fetch(PDO::FETCH_ASSOC);
 
  // 画像として扱うための設定
  header('Content-type: ' . $MIMETypes[$data['extension']]);
 
  echo $data['image'];
 
} catch (Exception $e) {
  echo "load failed: " . $e;
}
?>