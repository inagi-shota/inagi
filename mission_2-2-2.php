<html>
<form method="POST"action="mission_2-2.php">
<input type="text" name="name" value="コメント"/> 
<input type="submit" value="送信"/> 
</form>

<?php
$name=$_POST['name'];
if($name=$_POST['name']){
echo $name."を受け取りました";
}
?>
<?php
$name=$_POST['name'];
$filename='mission_2-2-2.txt';
$fp=fopen($filename,'w');
fwrite($fp,$name);
fclose($fp);
?>
<html>