<html>
<meta charset="UTF-8">

<body>
<?php
$filename = "mission_3-3!.txt"; 
if (file_exists($filename)){　　　//file存在チェック
$file =file($filename)；
$comnum =count($file) + 1;
} else {
$comnum = 0;
}
?>
<form method="post">
<input type="text" name="name" size="" value="名前"> <br>
<input type="text" name="comment" size="" value="コメント"> <br>
<input type = "submit" name = "add" value ="Submit">
</form>
<form method="post">
<input type="number" name="ID" size="" value="0" min=0 max=<?php echo $comnum; ?> > <br>
<input type = "submit" name = "delete" value ="Delete">
</form>
<?php
//Processing of submit
if (isset($_POST["add"])){
$name = $_POST["name"];
$word = $_POST["comment"]; //get comment
$time = date("Y/m/d H:i:s");
//Count array
if (file_exists($filename)){
$commentarray =file($filename);
$num = count($commentarray) + 1;
} else {
$num = 1;
}
//Display
echo ($name . "さん<br>" );
if ($word == null){
echo "何も入力されていません。<br>";
} elseif ($word == "完成！"){
echo "[" . $word . "] を受け付けました。<br>おめでとう！<br>"; 
} else {
echo "[" . $word . "] を受け付けました。<br>"; 
}
//save text file
$moji = ($num . "<>" . $name . "<>" . $word . "<>" . $time);
$fp = fopen($filename, "a"); 
fwrite($fp, $moji . PHP_EOL);
fclose($fp);
$ary = file($filename);
for ($i = 0; $i < $num; $i = $i + 1){
echo "<hr>";
$exp = explode("<>", $ary[$i]);
foreach ($exp as $comp){
echo $comp . "<br/>";
}
}
}
//Processing of delete
if (isset($_POST["delete"])){
$ID = $_POST["ID"]; //get ID which need to be deleted
if ($ID == 0){
echo "正しい番号を選んでください";
} else { 
if (file_exists($filename)){ // if file exist
$commentarray =file($filename);
$fp = fopen($filename, "w"); //format text fille
fwrite($fp, "");
fclose($fp);
echo "ID " . $ID . "を削除しました<br>";
foreach ($commentarray as $ary){ 
$exp = explode("<>", $ary); 
if ($exp[0] !=$ID){ //save the lines which are not targeted 
echo "<hr>";
$fp = fopen($filename, "a"); 
fwrite($fp, $ary);
fclose($fp);
foreach ($exp as $comp){
echo $comp . "<br/>";
}
} else {
echo "<hr>";
$fp = fopen($filename, "a"); 
fwrite($fp, $exp[0] . "<>" . "削除されました". PHP_EOL);
fclose($fp);
echo $exp[0] . "<br>";
echo "削除されました<br>";
}				
}
} else {// if file does not exsit
echo "ファイルが見つかりません";
} 
}
} 
?>
</body>

<html>



