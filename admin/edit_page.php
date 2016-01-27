<?
$sql_page = mysql_query("SELECT * FROM pages WHERE page='$arr[1]'");
if (mysql_num_rows($sql_page)>0)
{
	$page = mysql_fetch_array($sql_page);
}
else
{
	error('fatal',404);
}
?>
<div class="panel panel-midnightblue">
  
     <div class="panel-heading">
                <h2><? echo language('editing page',$lang); ?></h2>
          </div>
          <div class="panel-body">
		  
			<input type="text" style="margin-top:20px;" class="form-control" value="<? echo $page[page]; ?>" placeholder="<? echo language('page',$lang); ?>" id="page">
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
					$list.= '<input style="margin-top:20px;margin-bottom:20px;" id="title'.$k.'" type="text" class="form-control" value="'.lang($page[title_lang],$lng[lang]).'" placeholder="'.language('title page',$lang).' ('.$lng[title].')"><div class="composer_'.$k.'" id="text'.$k.'">'.lang($page[text_lang],$lng[lang]).'</div>

       
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
			
			<select id="vs" class="form-control" style="margin-top:20px;"><option value="y"><? echo language('visible',$lang);?></option><option value="n" <? if ($page[shown]=='n') echo ' selected'; ?>><? echo language('not visible',$lang);?></option></select>
			
			<input id="adms" type="hidden" value="n">
			<input id="elements" type="hidden" value="page,vs">
			<input id="add_to_lng" type="hidden" value="<? echo $lt;?>">
			<input id="rows" type="hidden" value="page,shown,title_lang,text_lang">
			<input id="classes" type="hidden" value="note-editable">
			<input id="icon" type="hidden" value="fa-files-o">
			<input type="hidden" value="<? echo language('page',$lang).','.language('visible',$lang).$ltt.','.language('not found',$lang).','.language('editing page',$lang).','.language('page edited',$lang).','.language('error edited',$lang); ?>" id="tts">
			<div style="text-align:center;margin-top:20px;"><button class="btn-success btn" onclick=main('pages','edit')><? echo language('edit',$lang); ?></button></div>
			<div id="loading" style="text-align:center;display:none;margin:30px;"><img src="<? echo $admin_page;?>assets/img/load.gif"></div>
		  </div>
</div>
