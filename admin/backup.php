<content>
<div id="loading" style="text-align:center;display:none;margin:30px;"><img src="<? echo $admin_page;?>assets/img/load.gif"></div>

<?

echo '<div style="text-align:right;margin-bottom:20px;margin-top:20px;"><button class="btn-success btn" onclick=add_backup()>'.language('create backup',$lang).'</button></div>';

$sql_backup = mysql_query("SELECT * FROM admin_version WHERE backup_folder<>''");
if (mysql_num_rows($sql_backup)>0)
{
	$back = mysql_fetch_array($sql_backup);
	do
	{
		echo '<div class="ltable">'.language('version admin panel',$lang).' '.$back[version].'<font style="display:inline-block;right:25px;position:absolute;"><button class="btn-primary btn" onclick=backup("'.$back[backup_folder].'")>'.language('use backup',$lang).'</button></font></div>';
	}
	while($back = mysql_fetch_array($sql_backup));
}?>

</content>