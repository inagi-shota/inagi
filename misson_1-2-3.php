<?php
$hensu="base ball";
 $filename="misson_1-2.txt";
 $fp=fopen($filename,"a");//u‚—v
 fwrite($fp,$hensu);
 fclose($fp);
?>