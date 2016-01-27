<?php
include('bd.php');
$title = htmlspecialchars($_POST[module],ENT_QUOTES);
$values = htmlspecialchars($_POST[values],ENT_QUOTES);
$rows = htmlspecialchars($_POST[rows],ENT_QUOTES);
$cls = htmlspecialchars($_POST[cls],ENT_QUOTES);
$lng = htmlspecialchars($_POST[lng],ENT_QUOTES);
$icon = htmlspecialchars($_POST[icon],ENT_QUOTES);
$adms = htmlspecialchars($_POST[adms],ENT_QUOTES);

$expl_values = explode(',',trim($values));
$expl_cls = explode('(?)',trim($cls));
$expl_lng = explode('(?)',trim($lng));
$expl_rows = explode(',',trim($rows));
$k=0; $vs = '';
do
{
	$vs.=",'".$expl_values[$k]."'";
	$k++;
}
while($k<count($expl_values));
$vs = mb_substr($vs,1,mb_strlen($vs,"UTF-8"),"UTF-8");

$k=0; $rows = '';
do
{
	$rows.=",`".$expl_rows[$k]."`";
	$k++;
}
while($k<count($expl_rows));
$rows = mb_substr($rows,1,mb_strlen($rows,"UTF-8"),"UTF-8");

$query = "SELECT id FROM ".$title." WHERE ".$expl_rows[0]."='".$expl_values[0]."'";
$sql_page =  mysql_query($query);
if (mysql_num_rows($sql_page)>0)
{
	echo 'Страница уже добавленна';
	exit;
}
if ($adms!=='y') {$lgg= 'lang'; $translation = 'translation'; $language_ = 'languages';} else{$lgg= 'abb'; $translation = 'admin_translation'; $language_ = 'admin_languages';}
$page = $expl_values[0];
if (count($expl_lng)>1)
{
	
	$find_translation =  mysql_query("SELECT id FROM ".$translation." WHERE title='$page'");
if (mysql_num_rows($find_translation)>0)
{
	$page.=rand(0,10000);
	
}
	$text = $page.'_t';
	$lng_s = mysql_query("SELECT * FROM ".$language_);
	if (mysql_num_rows($lng_s)>0)
	{
		$langs = mysql_fetch_array($lng_s);
		$k=0;
		do
		{
			$langs[lang] = $langs[$lgg];
			$ins_translation = mysql_query("INSERT INTO ".$translation."(lang,text,title)VALUES('$langs[lang]','$expl_lng[$k]','$page')");
			if (!empty($expl_cls[$k])) $ins_translation = mysql_query("INSERT INTO ".$translation."(lang,text,title)VALUES('$langs[lang]','$expl_cls[$k]','$text')");
			$k++;
		}
		while($langs = mysql_fetch_array($lng_s));
		$vs.=",'".$page."'";
		if (count($expl_cls)>1){$vs.=",'".$text."'";}
	}else{echo mysql_error();}
}
$query = "INSERT INTO `".$title."` 
(".$rows.") VALUES 
(".$vs.")";
//echo $query;
//exit;
$ins = mysql_query($query);
if ($ins&&$title!=='admin_inbox_list')
{
	$text = $page.'_added';

	$lng_s = mysql_query("SELECT * FROM `".$language_."`");
	if (mysql_num_rows($lng_s)>0)
	{
		$langs = mysql_fetch_array($lng_s);
		$k=0;
		do
		{
			$langs[lang] = $langs[$lgg];
			$title = language($title.' added',$langs[lang]).' <b>';
			if (count($expl_lng)>1) $title.=lang($page,$langs[lang]);
			else $title.=$page;
			$title.='</b>';
			
			$ins_translation = mysql_query("INSERT INTO admin_translation(lang,text,title)VALUES('$langs[lang]','$title','$text')");
			$k++;
		}
		while($langs = mysql_fetch_array($lng_s));
		
	}else{echo mysql_error();}
	$open_window = $home_url.$page;
	$ins_notific = mysql_query("INSERT INTO admin_notifications(viewed,title_lang,icon,type,open_window,val,time,date)VALUES('n','$text','$icon','info','$open_window','$visit','$t_now','$date')");
	if ($ins_notific) {echo 'ok';} else{ echo mysql_error();}
}else{echo mysql_error();}

?>