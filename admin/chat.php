<content>
<script>
view_chat(1000);
</script>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2><? echo language('chat',$lang); ?></h2>
			</div>
			<div class="panel-body p-n">
				<div class="row">
					<div class="col-md-8 col-xs-12">
						<div class="panel-chat well m-n" id="chat" tabindex="5000" style="overflow-y: auto; outline: none; border-radius: 0;">
						<? echo language('select chat user',$lang); ?>	
						<div id="loading" style="text-align:center;display:none;margin:30px;"><img src="<? echo $admin_page;?>assets/img/load.gif"></div>
						</div>
					</div>
					<div class="col-md-4 hidden-xs">
						<div class="panel-body p-n">
							<ul class="chat-users mt-lg">
<font id="active_chats">						       
							   <h4><? echo language('active chats',$lang); ?><small> <? $sql_chat = mysql_query("SELECT DISTINCT `FROM` FROM admin_chat WHERE  viewed='n' and `FROM`<>'chatroom'"); echo '('.mysql_num_rows($sql_chat).')'; ?></small></h4>
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
									</font>
							<h4 style="margin-top:15px;"><? echo language('search',$lang); ?></h4>
							<li><input onchange=search_chat() type="text" id="ss" placeholder="<? echo language('enter username',$lang); ?>" class="form-control"></li>
							<font id="users" style="overflow-y:auto"><img src="<? echo $admin_page;?>assets/img/load.gif" id="loading2" style="display:none;width:220px">
							</font>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-footer p-md">
            	    <div class="input-group">
            	    	<input type="text" id="message" placeholder="<? echo language('enter message',$lang); ?>" class="form-control" onkeypress="runScript(event)">
						<input type="hidden" id="send_id">
            	    	<span class="input-group-btn">
            	    		<button type="button" class="btn btn-default"><i class="fa fa-arrow-right"></i></button>
            	    	</span>
            	    </div>

			</div>
		</div>

	</div>
</div>
</content>
