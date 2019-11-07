<html>
<form method="POST"action="mission_2-1.php">
<input type="text" name="name" value="コメント"/> 
<input type="submit" value="送信"/> 
</form>

<?php
$name=$_POST['name'];
if($name=$_POST['name']){
echo $name."をうけとりました";//受け取った値を表示する
}
?>
<html>