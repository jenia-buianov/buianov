<?
include('bd.php');
$name = htmlspecialchars($_POST[s],ENT_QUOTES);
?><img src="<? echo $admin_page;?>assets/img/load.gif" id="loading2" style="display:none;width:220px">		
<?
	if (!empty($name))
	{
		if (strtolower($name)=='all')
		{
			$sql_chat = mysql_query("SELECT DISTINCT `FROM` FROM admin_chat WHERE `FROM`<>'chatroom'");
		}
		else{$sql_chat = mysql_query("SELECT DISTINCT `FROM` FROM admin_chat WHERE `FROM` LIKE '%$name%' and `FROM`<>'chatroom'");}
 
									if (mysql_num_rows($sql_chat)>0)
									{
										$chat_users = mysql_fetch_array($sql_chat);
										do
										{
												
												if ($chat_users['FROM']!=='chatroom')
											{
												$sql_ms = mysql_query("SELECT id FROM admin_chat WHERE `from`='$chat_users[FROM]' or `to`='$chat_users[FROM]'");
												$ss = mysql_fetch_array($sql_ms);
												echo '<li data-stats="offline" onclick=$("#send_id").val("'.$ss[id].'");$("#loading").css("display","block"); style="margin-bottom:8px;cursor:pointer"><span>'.$chat_users['FROM'].' <span class="badge badge-primary" id="mess'.$ss[id].'" style="position:absolute;right:5px;psdding-right:3px">'.mysql_num_rows($sql_ms).'&nbsp</span></span></li>';
											}
										}
										while($chat_users = mysql_fetch_array($sql_chat));
									}
else {echo language('no found',$lang);}									
	}
									?>