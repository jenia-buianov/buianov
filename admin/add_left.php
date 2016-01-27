<div class="panel panel-midnightblue">
  
     <div class="panel-heading">
                <h2><? echo language('left_menu',$lang); ?></h2>
          </div>
          <div class="panel-body">
		  
			<input type="text" style="margin-top:20px;" class="form-control" placeholder="<? echo language('title',$lang); ?>" id="href">
			<select id="module" class="form-control" style="margin-top:20px;">
			<option value="modules"><? echo language('modules',$lang); ?></option>
			<option value="apps"><? echo language('apps',$lang); ?></option>
			<option value="tamplates"><? echo language('templates',$lang); ?></option>
			</select>
			<div class="tab-container tab-default" style="margin-top:20px">
		
		
			
			<?
			$sql_lang = mysql_query("SELECT * FROM languages");
			if (mysql_num_rows($sql_lang)>0)
			{
				$k=1; $list=''; $tabs = '';$lst = ''; $lt = ''; $ltt='';
				$lng = mysql_fetch_array($sql_lang);
				do
				{
					if ($k==1) $tabs.= '<li class="active"><a href="#lang_'.$k.'" data-toggle="tab" aria-expanded="true">'.$lng[title].'</a></li>';
					else $tabs.= '<li><a href="#lang_'.$k.'" data-toggle="tab" aria-expanded="false">'.$lng[title].'</a></li>';
					if ($k==1) $list.='<div class="tab-pane active" id="lang_'.$k.'">';
					else $list.='<div class="tab-pane" id="lang_'.$k.'">';
					$lt.=',title'.$k;
					$ltt.=','.language('title',$lang).' ('.$lng[title].')';
					
					$list.= '<input style="margin-top:20px;margin-bottom:20px;" id="title'.$k.'" type="text" class="form-control" placeholder="'.language('title page',$lang).' ('.$lng[title].')"></div>';
					$k++;
				}
				while($lng = mysql_fetch_array($sql_lang));
				$lt = substr($lt,1,strlen($lt));
				echo'<ul class="nav nav-tabs">
			<li class="dropdown pull-right tabdrop hide"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-angle-down"></i> </a><ul class="dropdown-menu"></ul></li>
			'. $tabs.'</ul>
			
			<div class="tab-content">'.$list.'	
			</div>';
			}
			?>
			</div>
			
			<select id="vs" class="form-control" style="margin-top:20px;">
			<?
			$sql_icon = mysql_query("SELECT * FROM icons");
			if (mysql_num_rows($sql_icon)>0)
			{
				$icons = mysql_fetch_array($sql_icon);
				do
				{
					echo '<option value="fa-'.substr($icons['class'],1,strlen($icons['class'])).'">'.$icons['class'].'</option>';
				}
				while($icons = mysql_fetch_array($sql_icon));
			}
			?>
			</select>
			<input id="adms" type="hidden" value="y">
			<input id="elements" type="hidden" value="href,module,vs">
			<input id="add_to_lng" type="hidden" value="<? echo $lt;?>">
			<input id="rows" type="hidden" value="href,type,icon,title_lang">
			<input id="classes" type="hidden" value="">
			<input id="icon" type="hidden" value="fa-chevron-left">
			<input type="hidden" value="<? echo language('href',$lang).','.language('modules',$lang).','.language('icon',$lang).$ltt.','.language('not found',$lang).','.language('adding left',$lang).','.language('left added',$lang).','.language('error added',$lang); ?>" id="tts">
			<div style="text-align:center;margin-top:20px;"><button class="btn-success btn" onclick=main('admin_blocks','add')><? echo language('add',$lang); ?></button></div>
			<div id="loading" style="text-align:center;display:none;margin:30px;"><img src="<? echo $admin_page;?>assets/img/load.gif"></div>
		  </div>
</div>
