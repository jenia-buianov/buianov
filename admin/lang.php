<?

session_start();
include('bd.php');

	if (!empty($_SESSION[s]))
	{
		$sql_admins = mysql_query("SELECT uid FROM admin_code WHERE session='$_SESSION[s]'");
		$adms = mysql_fetch_array($sql_admins);
		$upd = mysql_query("UPDATE admin_users SET lang='$_POST[vl]' WHERE id='$adms[uid]'");
		if ($upd) echo 'ok'; else echo 'Error: '.mysql_error();
	}else{ echo 'No Session Id';}	

?>