<html>
<form method="POST"action="mission_2-2.php">
<input type="text" name="name" value="�R�����g"/> 
<input type="submit" value="���M"/> 
</form>

<?php
$name=$_POST['name'];
if($name=$_POST['name']){
echo $name."���󂯎��܂���";
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