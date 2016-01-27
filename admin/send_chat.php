<?
include('bd.php');

$sql_from = mysql_query("SELECT `from` FROM admin_chat WHERE id='$_POST[mid]'");
if (mysql_num_rows($sql_from)>0)
{
	$froms = mysql_fetch_array($sql_from);
	$from = $froms[from];
	$_POST[message] = htmlspecialchars($_POST[message],ENT_QUOTES);
	$ins = mysql_query("INSERT INTO `admin_chat`(`viewed`,`message`,`date`,`time`,`from`,`to`)VALUES('n','$_POST[message]','$date','$t_now','chatroom','$from')");
	if ($ins) echo 'ok'; else echo mysql_error();
}else{echo 'No message';}
?>