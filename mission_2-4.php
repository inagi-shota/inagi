<html>
<form method="POST"action="mission_2-4.php">
<input type="text" name="name" value="コメント"/> 
<input type="submit" value="送信"/> 
</form>

<?php
$name=$_POST['name'];
if($_POST['name']=='完成'){
echo "おめでとう"."<br>";
}else{
echo $name."を受け取りました";
}
?>
<?php
if(isset($_POST['name'])){
$name=$_POST['name'];
$filename='mission_2-4.txt';
$fp=fopen($filename,'a');
fwrite($fp,$name."\n");
fclose($fp);
}
?>
<?php
$file_name="mission_2-4.txt";
var_dump(file($file_name));
?>
<?php
$array=file($file_name);
foreach($array as $word){
echo $word."</br>";
}
?>
<html>