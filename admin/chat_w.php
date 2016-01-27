<?
include('bd.php');
echo $_POST[mid].'<()>';
$sql_from = mysql_query("SELECT `from` FROM admin_chat WHERE id='$_POST[mid]'");
if (mysql_num_rows($sql_from)>0)
{
	$froms = mysql_fetch_array($sql_from);
	$from = $froms[from];
	
	$sql_messages = mysql_query("SELECT * FROM admin_chat WHERE `from`='$from' or `to`='$from'");
	if (mysql_num_rows($sql_messages)>0)
	{
		$messages = mysql_fetch_array($sql_messages);
		do
		{
			echo'<div class="chat-message '; if ($messages[from]=='chatroom') {echo 'me';}else{if ($messages['viewed']=='n'){echo 'chat-danger';}else{echo 'chat-primary';}} echo'">
								<div class="chat-contact">
									<img src="http://placehold.it/300&amp;text=Placeholder" alt="">
								</div>
								<div class="chat-text">'.$messages['message'].'
								<p style="font-size:9px;margin-top:10px;">'.$messages['date'].' '.$messages['time'].'</p></div>
							</div>';
		}
		while($messages = mysql_fetch_array($sql_messages));
		$sql_upd = mysql_query("UPDATE admin_chat SET viewed='y' WHERE `from`='$from'");
	}
	else{echo language('no chat',$lang);}
}


?>
<div id="loading" style="text-align:center;display:none;margin:30px;"><img src="<? echo $admin_page;?>assets/img/load.gif"></div>