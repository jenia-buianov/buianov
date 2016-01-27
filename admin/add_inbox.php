<div class="panel panel-midnightblue">
  
     <div class="panel-heading">
                <h2><? echo language('add inbox',$lang); ?></h2>
          </div>
          <div class="panel-body">
		  
			<input type="text" style="margin-top:20px;" class="form-control" placeholder="E-mail" id="email">
			<input type="password" style="margin-top:20px;" class="form-control" placeholder="<? echo language('password',$lang);?>" id="pass">
			<input type="text" style="margin-top:20px;" class="form-control" placeholder="<? echo language('host',$lang);?>" id="host">
			<input type="text" style="margin-top:20px;" class="form-control" placeholder="<? echo language('port',$lang);?>" id="port">
			<input type="hidden" value="<? 
			$sql_uid = mysql_query("SELECT uid FROM admin_code WHERE CODE='$_SESSION[s]'");
			$uid = mysql_fetch_array($sql_uid);
			echo $uid[uid];
			?>" id="uid">
			<input id="adms" type="hidden" value="y">
			<input id="elements" type="hidden" value="email,pass,host,port,uid">
			<input id="add_to_lng" type="hidden" value="">
			<input id="rows" type="hidden" value="email,password,host,port,uid">
			<input id="classes" type="hidden" value="">
			<input id="icon" type="hidden" value="fa-inbox">
			<input type="hidden" value="E-mail,<? echo language('password',$lang).','.language('host',$lang).','.language('port',$lang).',UID,'.language('not found',$lang).','.language('adding inbox',$lang).','.language('inbox added',$lang).','.language('error added',$lang); ?>" id="tts">
			<div style="text-align:center;margin-top:20px;"><button class="btn-success btn" onclick=main('admin_inbox_list','add')><? echo language('add',$lang); ?></button></div>
			<div id="loading" style="text-align:center;display:none;margin:30px;"><img src="<? echo $admin_page;?>assets/img/load.gif"></div>
		  </div>
</div>
