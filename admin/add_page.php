<div class="panel panel-midnightblue">
  
     <div class="panel-heading">
                <h2><? echo language('adding page',$lang); ?></h2>
          </div>
          <div class="panel-body">
		  
			<input type="text" style="margin-top:20px;" class="form-control" placeholder="<? echo language('page',$lang); ?>" id="page">
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
					$ltt.=','.language('title page',$lang).' ('.$lng[title].')';
					$lst.='<script>
	$(".composer_'.$k.'").summernote({
		height: 350
	});
</script>';
					$list.= '<input style="margin-top:20px;margin-bottom:20px;" id="title'.$k.'" type="text" class="form-control" placeholder="'.language('title page',$lang).' ('.$lng[title].')"><div class="composer_'.$k.'" id="text'.$k.'">'.language('page text',$lang).' ('.$lng[title].')</div>

       
	</div>';
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

			<input id="adms" type="hidden" value="n">			
			<select id="vs" class="form-control" style="margin-top:20px;"><option value="y"><? echo language('visible',$lang);?></option><option value="n"><? echo language('not visible',$lang);?></option></select>
			<input id="elements" type="hidden" value="page,vs">
			<input id="add_to_lng" type="hidden" value="<? echo $lt;?>">
			<input id="rows" type="hidden" value="page,shown,title_lang,text_lang">
			<input id="classes" type="hidden" value="note-editable">
			<input id="icon" type="hidden" value="fa-files-o">
			<input type="hidden" value="<? echo language('page',$lang).','.language('visible',$lang).$ltt.','.language('not found',$lang).','.language('adding page',$lang).','.language('page added',$lang).','.language('error added',$lang); ?>" id="tts">
			<div style="text-align:center;margin-top:20px;"><button class="btn-success btn" onclick=main('pages','add')><? echo language('add',$lang); ?></button></div>
			<div id="loading" style="text-align:center;display:none;margin:30px;"><img src="<? echo $admin_page;?>assets/img/load.gif"></div>
		  </div>
</div>
