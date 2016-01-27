<?

session_start();
include('bd.php');

	if (!empty($_SESSION[s]))
	{
		$sql_admins = mysql_query("SELECT uid FROM admin_code WHERE session='$_SESSION[s]'");
		$adms = mysql_fetch_array($sql_admins);
		$upd = mysql_query("SELECT password FROM admin_users WHERE id='$adms[uid]'");
		$amds = mysql_fetch_array($upd);
		if ($amds[password]==$_POST[opass])
		{
			$upd = mysql_query("UPDATE admin_users SET password='$_POST[pass]' WHERE id='$adms[uid]'");
			if ($upd) echo 'ok'; else echo mysql_error();
		}else{echo 'Старый пароль указан не верно';}
		
	}else{ echo 'No Session Id';}	

?>