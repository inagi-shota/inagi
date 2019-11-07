<html>
<meta charset="UTF-8">
<body>
<?php
//get previous post number
$filename = "mission_3-4.txt"; 
$tempfile = "mission_3-4_temp.txt";
if (file_exists($filename)){
$file =file($filename);
$comnum =count($file)+1;
$judgeID = $comnum + 1;
} else {
$comnum = 1;
$judgeID = 1;
}
//get edit number
if (file_exists($tempfile)){
$temp = file($tempfile);
} else {
$temp = 0;
}
//form input
$formname = "氏名";
$formcomment = "コメント";
?>
<?php
//read id for edit
if (isset($_POST["add"])){
$judgeid = $_POST["judge"];
}
//Processing of submit as edit
if (isset($_POST["add"]) && $judgeid == $temp[0]){
$name = $_POST["name"]; //get name
$word = $_POST["comment"]; //get comment
$time = date("Y/m/d H:i:s"); //get date
//Count array
if (file_exists($filename)){
$commentarray =file($filename);
}
$fp = fopen($filename, "w"); //format text fille
fwrite($fp, "");
fclose($fp);
foreach ($commentarray as $ary){ // process each post
$exp = explode("<>", $ary); 
if ($exp[0] !=$temp[0]){ //save text which are not targeted 
$fp = fopen($filename, "a"); 
fwrite($fp, $ary);
fclose($fp);
} else {// delete text which is targeted
$fp = fopen($filename, "a"); 
fwrite($fp, $temp[0] . "<>" . $name . "<>" . $word . "<>" . $time . "<>" . PHP_EOL);
fclose($fp);
}				
}
}
//Processing of submit
if (isset($_POST["add"]) && $judgeid != $temp[0]){
$name = $_POST["name"]; //get name
$word = $_POST["comment"]; //get comment
$time = date("Y/m/d H:i:s"); //get date
//Count array
if (file_exists($filename)){
$commentarray =file($filename);
$num = count($commentarray) + 1;
} else {
$num = 1;
}
//Display input text
echo ($name . "さん<br>" );
if ($word == null){
echo "何も入力されていません。<br><br>";
} elseif ($word == "完成！"){
echo "[" . $word . "] を受け付けました。<br>おめでとう！<br><br>"; 
} else {
echo "[" . $word . "] を受け付けました。<br><br>"; 
}
//save text file
$moji = ($num . "<>" . $name . "<>" . $word . "<>" . $time);
$fp = fopen($filename, "a"); 
fwrite($fp, $moji . PHP_EOL);
fclose($fp);
}

//Processing of delete
if (isset($_POST["delete"])){
$ID = $_POST["delID"]; //get ID which need to be deleted
if (file_exists($filename)){ // if file exists
$commentarray =file($filename); //get previous post
unlink($filename); //format text fille
echo "ID " . $ID . "を削除しました<br>";
foreach ($commentarray as $ary){ // process each post
$exp = explode("<>", $ary); 
if ($exp[0] !=$ID){ //save text which are not targeted 
$fp = fopen($filename, "a"); 
fwrite($fp, $ary);
fclose($fp);
} else {// delete text which is targeted
$fp = fopen($filename, "a"); 
fwrite($fp, $exp[0] . "<>unknown<>deleted<>".$exp[3]);
fclose($fp);
}				
}
} else {// if file does not exsit
echo "ファイルが見つかりません";
} 
}
//Processing of edit
if (isset($_POST["edit"])){
$ID = $_POST["ediID"]; //get ID which need to be deleted
if (file_exists($filename)){ // if file exists
$commentarray =file($filename); //get previous post
echo "ID " . $ID . "を読み込みました。編集してください。<br>";
foreach ($commentarray as $ary){ // process each post
$exp = explode("<>", $ary); 
if ($exp[0] ==$ID){ //get name & comment for display
$judgeID = $exp[0]; 
$formname = $exp[1]; 
$formcomment = $exp[2];
$fp = fopen($tempfile, "w"); //make judgeID file
fwrite($fp, $judgeID);
fclose($fp);
}				
}
} else {// if file does not exsit
echo "ファイルが見つかりません";
} 
}
?>
コメント
<form method="post">
<input type="text" name="name" size="" value=<?php echo $formname; ?> > <br>
<input type="text" name="comment" size="" value=<?php echo $formcomment; ?> > <br>
<input type="hidden" name="judge" size="" value=<?php echo $judgeID; ?> ><br>
<input type = "submit" name = "add" value ="Submit">
</form>
削除
<form method="post">
<input type="number" name="delID" size="" value="1" min=1 max= <?php echo $comnum; ?> ><br>
<input type = "submit" name = "delete" value ="Delete">
</form>
編集
<form method="post">
<input type="number" name="ediID" size="" value="1" min=1 max=<?php echo $comnum; ?> > <br>
<input type = "submit" name = "edit" value ="Edit">
</form>
<?php
//display posts
if (file_exists($filename)){
$ary = file($filename);
foreach ($ary as $arycomp){
echo "<hr>";
$exp = explode("<>", $arycomp);
foreach ($exp as $comp){
echo $comp . "<br/>";
}
}
}
?>
</body>

<html>



