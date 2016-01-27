<div class="panel panel-midnightblue">
  
     <div class="panel-heading">
                <h2><? echo language('editing admin user',$lang); ?></h2>
          </div>
          <div class="panel-body">
		  <?
		  $sql_user = mysql_query("SELECT * FROM admin_users WHERE user='$arr[1]'");
		  IF (mysql_num_rows($sql_user)>0){
			  $user_ = mysql_fetch_array($sql_user);
		  ?>
			<input type="text" style="margin-top:20px;" class="form-control" value="<? echo $user_[user]; ?>" placeholder="<? echo language('login',$lang); ?>" id="user">
			<input type="text" style="margin-top:20px;" class="form-control" value="<? echo $user_[name]; ?>" placeholder="<? echo language('name',$lang); ?>" id="name">
			<? if ($admin_user[group]=='Admin'){?>
			<input type="password" style="margin-top:20px;" class="form-control" value="<? echo $user_[password]; ?>" placeholder="<? echo language('password',$lang); ?>" id="password">
			<? } ?>
			<input type="text" style="margin-top:20px;" class="form-control" value="<? echo $user_[email]; ?>" placeholder="<? echo language('email',$lang); ?>" id="email">
			<select id="group" class="form-control" style="margin-top:20px;"<? if ($admin_user[group]=='Moder') echo 'disabled'; ?>><option value="Admin">Admin</option><option value="Moder" <? if ($user_[group]=='Moder') echo ' selected'; ?>>Moder</option></select>
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
			<input id="elements" type="hidden" value="user,name,<? if ($admin_user[group]=='Admin'){echo'password,';} ?>email,group,lang">
			<input id="add_to_lng" type="hidden" value="">
			<input id="rows" type="hidden" value="user,name,<? if ($admin_user[group]=='Admin'){echo'password,';} ?>email,group,lang">
			<input id="classes" type="hidden" value="">
			<input id="icon" type="hidden" value="fa-user">
			<input type="hidden" value="<? echo language('login',$lang).','.language('name',$lang);
			if ($admin_user[group]=='Admin'){echo ','.language('password',$lang);}
			echo','.language('email',$lang).','.language('group',$lang).','.language('language',$lang).','.language('not found',$lang).','.language('editing admin user',$lang).','.language('admin user edited',$lang).','.language('error edited',$lang); ?>" id="tts">
			<div style="text-align:center;margin-top:20px;"><button class="btn-success btn" onclick=main('admin_users','edit')><? echo language('edit',$lang); ?></button></div>
			<div id="loading" style="text-align:center;display:none;margin:30px;"><img src="<? echo $admin_page;?>assets/img/load.gif"></div>
		  <? } ?>
		  </div>
</div>
