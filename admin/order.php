<?
include("bd.php");

$module = htmlspecialchars($_POST[type],ENT_QUOTES);
$id = htmlspecialchars($_POST[id],ENT_QUOTES);
$ord = htmlspecialchars($_POST['ord'],ENT_QUOTES);

$sql_left = mysql_query("SELECT type,orders FROM admin_blocks WHERE id='$id'");
$rr = mysql_fetch_array($sql_left);
$type = $rr[type];
$ords = $rr[orders];


$sql_ = mysql_query("SELECT id FROM admin_blocks WHERE orders='$ord' and type='$type'");
	$mm = mysql_fetch_array($sql_);
	$upd1 = mysql_query("UPDATE admin_blocks SET orders='$ords' WHERE id='$mm[id]'");
	
$upd = mysql_query("UPDATE admin_blocks SET orders='$ord' WHERE id='$id'");

if ($upd) echo 'ok';
?>