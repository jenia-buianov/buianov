<?
include('bd.php');

?>
<h4><? echo language('active chats',$lang); ?><small> <? $sql_chat = mysql_query("SELECT DISTINCT `FROM` FROM admin_chat WHERE viewed='n' and `FROM`<>'chatroom'"); echo '('.mysql_num_rows($sql_chat).')'; ?></small></h4>
            						<?
									if (mysql_num_rows($sql_chat)>0)
									{
										$chat_users = mysql_fetch_array($sql_chat);
										do
										{
												
												if ($chat_users['FROM']!=='chatroom')
											{
												$sql_ms = mysql_query("SELECT id FROM admin_chat WHERE `from`='$chat_users[FROM]' and viewed='n'");
												$ss = mysql_fetch_array($sql_ms);
												echo '<li data-stats="offline" onclick=$("#send_id").val("'.$ss[id].'");$("#loading").css("display","block"); style="margin-bottom:8px;cursor:pointer"><span>'.$chat_users['FROM'].' <span class="badge badge-primary" id="mess'.$ss[id].'" style="position:absolute;right:5px;psdding-right:3px">'.mysql_num_rows($sql_ms).'&nbsp</span></span></li>';
											}
										}
										while($chat_users = mysql_fetch_array($sql_chat));
									}
									?>