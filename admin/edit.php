<?php
include('bd.php');
$id = htmlspecialchars($_POST[id],ENT_QUOTES);
$title = htmlspecialchars($_POST[module],ENT_QUOTES);
$values = htmlspecialchars($_POST[values],ENT_QUOTES);
$rows = htmlspecialchars($_POST[rows],ENT_QUOTES);
$cls = htmlspecialchars($_POST[cls],ENT_QUOTES);
$lng = htmlspecialchars($_POST[lng],ENT_QUOTES);
$icon = htmlspecialchars($_POST[icon],ENT_QUOTES);

$expl_values = explode(',',trim($values));
$expl_cls = explode('(?)',trim($cls));
$expl_lng = explode('(?)',trim($lng));
$expl_rows = explode(',',trim($rows));
$k=0; $vs = '';
do
{
	$vs.=",`".$expl_rows[$k]."`='".$expl_values[$k]."'";
	$k++;
}
while($k<count($expl_values));
$vs = mb_substr($vs,1,mb_strlen($vs,"UTF-8"),"UTF-8");

$query = "SELECT * FROM ".$title." WHERE ".$expl_rows[0]."='".$id."'";
$sql_page =  mysql_query($query);
if (mysql_num_rows($sql_page)>0)
{
	$inf = mysql_fetch_array($sql_page);
	$page = $inf[title_lang];
	$text = $inf[text_lang];
	if (count($expl_lng)>1)
	{
	$lng_s = mysql_query("SELECT * FROM `languages`");
	if (mysql_num_rows($lng_s)>0)
	{
		$langs = mysql_fetch_array($lng_s);
		$k=0;
		do
		{
			$update = mysql_query("UPDATE translation SET text='$expl_lng[$k]' WHERE title='$page' and lang='$langs[lang]'");
			$update = mysql_query("UPDATE translation SET text='$expl_cls[$k]' WHERE title='$text' and lang='$langs[lang]'");
			$k++;
		}
		while($langs = mysql_fetch_array($lng_s));
		$vs.=",`title_lang`='".$page."',`text_lang`='".$text."'";
	}else{echo mysql_error();}
	}
	$page = $expl_values[0];
}
//echo $vs;
$query = "UPDATE `".$title."` SET ".$vs." WHERE id='".$inf[id]."'";
//echo $query;
//exit;
$upd= mysql_query($query);
if ($upd)
{
	$text = $page.'_edited';

	$title = language($title.' edited',$lang).' <b>';
			if (count($expl_lng)>1) $title.=lang($page,$lang);
			else $title.=$page;
			$title.='</b>';
			$ins_translation = mysql_query("INSERT INTO admin_translation(lang,text,title)VALUES('$lang','$title','$text')");
	$open_window = $home_url.$page;
	$sql_last = mysql_query("SELECT * FROM admin_notifications ORDER BY id DESC LIMIT 1");
	if  (mysql_num_rows($sql_last)>0)
	{
		$last = mysql_fetch_array($sql_last);
		if ($open_window!==$last[open_window])
		{
			$ins_notific = mysql_query("INSERT INTO admin_notifications(viewed,title_lang,icon,type,open_window,val,time,date)VALUES('n','$text','$icon','info','$open_window','$visit','$t_now','$date')");
			if ($ins_notific) {echo 'ok';} else{ echo mysql_error();}
		}else{echo 'ok';}
	}
else{
	$ins_notific = mysql_query("INSERT INTO admin_notifications(viewed,title_lang,icon,type,open_window,val,time,date)VALUES('n','$text','$icon','info','$open_window','$visit','$t_now','$date')");
	if ($ins_notific) {echo 'ok';} else{ echo mysql_error();}
}
	
}else{echo mysql_error();}
?>