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
	}
if ($_POST['from_']==0) { $name = $buianov_name.' '.$buianov_lastname;$subj = $buianov_name.' '.$buianov_lastname; $contact = $mymail; } else{ $subj = $admin_user[name]; $contact = $email.'<br>'.$_POST[phone]; $name = $subj;}
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
	<td valign=middle align=left>'.$contact.'</td>
	</tr></table>
	<div style="margin-top:15px;color:white;padding:10px;border:1px solid #ccc;padding-top:30px;padding-bottom:30px;background-color:#37474f;font-size:18px;text-align:center;">'.$_POST[subj].'</div>
	<div style="color:#999;font-size:15px;border:1px solid #ccc;padding:10px;padding-top:30px;padding-bottom:30px;text-align:left;">
	<p align=Center>'.$_POST[text].'</p>
	<p align=Center style="color:#00bcd4">'.language('thank_lang','ru').'</p></div>
	</div>
</body>

</html>';
$body = mb_convert_encoding($body, mb_detect_encoding($body), 'UTF-8');
$subj.=': '.$_POST[subj];
$email= 'jeniabuianov@gmail.com';
$send = send_mail($email,$mymail,$name,$title_mail,$mail_host,$mail_type,$mail_port,$mypassword,$subj,$body);
sleep(2);
echo $send;	
?>