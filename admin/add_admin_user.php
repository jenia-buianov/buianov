<div class="panel panel-midnightblue">
  
     <div class="panel-heading">
                <h2><? echo language('adding admin user',$lang); ?></h2>
          </div>
          <div class="panel-body">
		  
			<input type="text" style="margin-top:20px;" class="form-control" placeholder="<? echo language('login',$lang); ?>" id="user">
			<input type="text" style="margin-top:20px;" class="form-control" placeholder="<? echo language('name',$lang); ?>" id="name">
			<input type="password" style="margin-top:20px;" class="form-control" placeholder="<? echo language('password',$lang); ?>" id="password">
			<input type="text" style="margin-top:20px;" class="form-control" placeholder="<? echo language('email',$lang); ?>" id="email">
			<select id="group" class="form-control" style="margin-top:20px;"><option value="Admin">Admin</option><option value="Moder">Moder</option></select>
			<select id="lang" class="form-control" style="margin-top:20px;">
			<?
			$sql_languge = mysql_query("SELECT lang,abb FROM admin_languages WHERE active='y'");
							if (mysql_num_rows($sql_languge)>0)
							{
								$ln = mysql_fetch_array($sql_languge);
								do
								{
									echo '<option value="'.$ln[abb].'"';
									if ($lang==$ln[abb]) echo ' selected';
									echo'>'.$ln[lang].'</option>';
								}
								while($ln = mysql_fetch_array($sql_languge));
							}
							
			?>
			</select>
			

			<input id="adms" type="hidden" value="n">			
			<input id="elements" type="hidden" value="user,name,password,email,group,lang">
			<input id="add_to_lng" type="hidden" value="">
			<input id="rows" type="hidden" value="user,name,password,email,group,lang">
			<input id="classes" type="hidden" value="">
			<input id="icon" type="hidden" value="fa-user">
			<input type="hidden" value="<? echo language('login',$lang).','.language('name',$lang).','.language('password',$lang).','.language('email',$lang).','.language('group',$lang).','.language('language',$lang).','.language('not found',$lang).','.language('adding admin user',$lang).','.language('admin user added',$lang).','.language('error added',$lang); ?>" id="tts">
			<div style="text-align:center;margin-top:20px;"><button class="btn-success btn" onclick=main('admin_users','add')><? echo language('add',$lang); ?></button></div>
			<div id="loading" style="text-align:center;display:none;margin:30px;"><img src="<? echo $admin_page;?>assets/img/load.gif"></div>
		  </div>
</div>
