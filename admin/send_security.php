<?

session_start();
include('bd.php');

$sql_admins = mysql_query("SELECT uid FROM admin_code WHERE session='$_SESSION[s]'");
	$adms = mysql_fetch_array($sql_admins);
	$sql_admin_user = mysql_query("SELECT * FROM admin_users WHERE id='$adms[uid]'");
	if (mysql_num_rows($sql_admin_user)>0)
	{
		$admin_user = mysql_fetch_array($sql_admin_user);
		
		$email = $admin_user[email];
		$lang = $admin_user[lang];
		$body = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body style="width:100%;text-align:center;padding:0px;margin:0px;">
	<div style="background:none;width:60%;margin-left:20%;">
	<table width=100%><tr>
	<td valign=middle width=50% align=right><a href="http://buianov.com/"><img src="http://j-buianov.500mb.net/images/system/logo.png" width="50" height="50""></a></td>
	<td valign=middle align=left>'.$buianov_name.' '.$buianov_lastname.'</td>
	</tr></table>
	<div style="margin-top:15px;color:white;padding:10px;border:1px solid #ccc;padding-top:30px;padding-bottom:30px;background-color:#37474f;font-size:18px;text-align:center;">'.language('code_en',$lang).'</div>
	<div style="color:#999;font-size:15px;border:1px solid #ccc;padding:10px;padding-top:30px;padding-bottom:30px;text-align:left;">
	<p align=Center>'.language('follow link',$lang).'</p>
	<p align=Center><a href="'.$admin_page.'follow_lnk" style="color:#e51c23">'.language('change_pass',$lang).'</a></p>
	<p align=Center style="color:#00bcd4">'.language('thank_lang',$lang).'</p></div>
	</div>
</body>

</html>';
$body = mb_convert_encoding($body, mb_detect_encoding($body), 'UTF-8');

$send = send_mail($email,$mymail,$admin_user[name],$title_mail,$mail_host,$mail_type,$mail_port,$mypassword,language('code_sec',$lang),$body);
sleep(2);
echo $send;
	}else
	{
		echo 'Error:';
	}
?>