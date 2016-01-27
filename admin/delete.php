<?
include("bd.php");
$del = mysql_query("DELETE FROM ".$_POST[type]." WHERE id='$_POST[id]'");
if ($del){echo 'ok';}else{echo mysql_error();}
?>