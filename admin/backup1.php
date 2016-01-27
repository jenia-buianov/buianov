<?
session_start();
include("bd.php");
if (!empty($_SESSION[s]))
	{
		$sql_admins = mysql_query("SELECT uid FROM admin_code WHERE session='$_SESSION[s]'");
	$adms = mysql_fetch_array($sql_admins);
	$sql_admin_user = mysql_query("SELECT * FROM admin_users WHERE id='$adms[uid]'");
	if (mysql_num_rows($sql_admin_user)>0)
	{
		$admin_user = mysql_fetch_array($sql_admin_user);
		$lang = $admin_user[lang];
	}
	else{echo 'Erorr: '.$_SESSION[s]; exit;}
	}
// backup the db function
function backup_database_tables($host,$user,$pass,$name,$tables,$name)
{
        $link = mysql_connect($host,$user,$pass);
        mysql_select_db($name,$link);
        //get all of the tables
        if($tables == '*')
        {
                $tables = array();
                $result = mysql_query('SHOW TABLES');
                while($row = mysql_fetch_row($result))
                {
                        $tables[] = $row[0];
                }
        }
        else
        {
                $tables = is_array($tables) ? $tables : explode(',',$tables);
        }
        //cycle through each table and format the data
        foreach($tables as $table)
        {
                $result = mysql_query('SELECT * FROM '.$table);
                $num_fields = mysql_num_fields($result);
                $return.= 'DROP TABLE '.$table.';';
                $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
                $return.= "\n\n".$row2[1].";\n\n";
                for ($i = 0; $i < $num_fields; $i++)
                {
                        while($row = mysql_fetch_row($result))
                        {
                                $return.= 'INSERT INTO '.$table.' VALUES(';
                                for($j=0; $j<$num_fields; $j++)
                                {
                                        $row[$j] = addslashes($row[$j]);
                                        //$row[$j] = preg_replace("\n","\\n",$row[$j]);
                                        if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                                        if ($j<($num_fields-1)) { $return.= ','; }
                                }
                                $return.= ");\n";
                        }
                }
                $return.="\n\n\n";
        }
        //save the file
        $handle = fopen($name.'.sql','w+');
        fwrite($handle,$return);
        fclose($handle);
		return true;
}
$sql_version = mysql_query('SELECT version FROM admin_version WHERE active="y"');
if (mysql_num_rows($sql_version)>0)
{
	$version = mysql_fetch_array($sql_version);
	$version = $version[version];
	$name = $version.'_'.$visit.'.zip';
	backup_database_tables($host,$user_db,$password_db,$database, '*',$version.'_'.$visit);
echo $name;
$nm = 'backups/'.$name;
	$upd = mysql_query('UPDATE admin_version SET active="n"');
	$ins = mysql_query("INSERT INTO admin_version(active,version,backup_folder)VALUES('y','$version','$nm')");
    
exit;
}

?>