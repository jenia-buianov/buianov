<content>
<?
$sql_ = mysql_query("SELECT * FROM admin_languages WHERE active='y'");
if (mysql_num_rows($sql_)>0)
{
	$ln = mysql_fetch_array($sql_);
	echo '<select id="lang" onchange=lang() class="form-control">';
	do
	{
		echo '<option value="'.$ln[abb].'"';
		if ($ln[abb]==$lang) echo ' selected';
		echo'>'.$ln[lang].'</option>';
	}
	while($ln = mysql_fetch_array($sql_));
	echo '</select>';
}
?>
</content>