<html>
<meta charset="UTF-8">
<body>
<?php	
session_start();
$db['host'] = "localhost";  // DBサーバのURL
$db['user'] = "tb-210315";  // ユーザー名
$db['pass'] = "6hTB8RsxKc";  // ユーザー名のパスワード
$db['dbname'] = "tb210315db";  // データベース名
$dsn = 'mysql:dbname=tb210315db;host=localhost';
$pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
$sql="CREATE TABLE IF NOT EXISTS ImageData"
."("
."name varchar(20) NOT NULL,"
."image  blob NOT NULL,"
."extension varchar(5) NOT NULL"
.")";
$stmt=$pdo->query($sql);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>MySQLに画像を保存するサンプル</title>
</head>
<body>
  <img src="testImage.png" alt="保存する画像">
 
  <form action="save.php" method="post">
    <input type="text" name="imageName" placeholder="名前">
    <input type="submit" value="送信">
  </form>
</body>
</html>
 
<?php
 
// 送信ボタンが押されたら、入力を受け取ってデータベースに画像を送信
if (isset($_POST['imageName'])) {
  $name = $_POST['imageName'];
} else {
  echo '名前を入力して送信ボタンを押してください。';
  exit;
}
 
function getPDO() {
  // PHP Data Object を返す
$db['host'] = "localhost";  // DBサーバのURL
$db['user'] = "tb-210315";  // ユーザー名
$db['pass'] = "6hTB8RsxKc";  // ユーザー名のパスワード
$db['dbname'] = "tb210315db";  // データベース名
$dsn = 'mysql:dbname=tb210315db;host=localhost';
 
  return new PDO($dsn, $db['user'],$db['pass'] );
}
 
// 送信する画像の中身と拡張子を取得
$imagePath = "./testImage.png";
$image = file_get_contents($imagePath);
$extension = pathinfo($imagePath, PATHINFO_EXTENSION);
 
try {
 
  $pdo = getPDO();
 
  $tableName = "ImageData";
 
  $insert = $pdo->prepare('INSERT INTO ' . $tableName . ' (name, image, extension) VALUES (:name, :image, :extension)');
  $insert->bindValue(':name', $name, PDO::PARAM_STR);
  $insert->bindValue(':image', $image, PDO::PARAM_LOB);
  $insert->bindValue(':extension', $extension, PDO::PARAM_STR);
  $insert->execute();
 
  echo "登録完了: $name <br>";
  echo '<a href="load.php?name='.$name.'">送信した画像を確認する</a>';
 
} catch (Exception $e) {
  echo "insert failed: " . $e;
}
?>