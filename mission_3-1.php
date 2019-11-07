<html>
<form action="mission_3-1.php" method="post">
<div>
<label for="name">名前</label>
<input type="text" id="name" name="name">
</div>
<div>
<label for="message">コメント</label>
<input type="text" id="message" name="message">
</div>
<input type="submit" name="send" value="送信">
</form>

<?php
$datafaile='mission3-1.txt';
if(isset($_POST["name"],$_POST["message"])){
$name=$_POST["name"];
$message=$_POST["message"];
$time=date('y')."年".date("m月d日 H:i:s");
$newdata=(count(file($datafaile))+1)."<>".$name."<>".$message."<>".$time."\n";
$fp=fopen("mission_3-1.txt","a");
fwrite($fp,$newdata);
fclose($fp);
}
?>

<html>

