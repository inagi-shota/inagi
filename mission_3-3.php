<html>
<form action="mission_3-3.php" method="post">
<div>
<label for="name">名前</label>
<input type="text" id="name" name="name">
</div>
<div>
<label for="message">コメント</label>
<input type="text" id="message" name="message">
</div>
<input type="submit" name="send" value="送信">
<input type="text" name="deleteNo" placeholder="削除対象番号">
<input type="sbmit" name="delete" value="削除">

</form>

<?php
$datafaile='mission_3-3.txt';
if(isset($_POST["name"],$_POST["message"])){
$name=$_POST["name"];
$message=$_POST["message"];
$time=date('y')."年".date("m月d日 H:i:s");
$newdata=(count(file($datafaile))+1)."<>".$name."<>".$message."<>".$time."\n";
$fp=fopen("mission_3-3.txt","a");
fwrite($fp,$newdata);
fclose($fp);
}
?>
<?php
$file_name='mission_3-3.txt';
$array=file($file_name);
foreach($array as $newdata){
$ret_array=explode("<>","$newdata");
echo $ret_array[0];
echo $ret_array[1];
echo $ret_array[2];
echo $ret_array[3];
}
?>
<?php




<html>