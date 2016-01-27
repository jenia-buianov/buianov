<?
session_start();

set_time_limit(0);
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
$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'http://kontaktplus.in/buianov/');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, 'download=1');
	$out = curl_exec($curl);
    curl_close($curl);
	
	$ex = explode("(?)",$out);
	$version = $ex[0];
	$install = 'http://kontaktplus.in/buianov/'.$ex[1];
	$e1 = explode("/",$ex[1]);
	$filename = $e1[count($e1)-1];
	$sql = substr($filename,0,strlen($filename)-3).'sql';
	
$fp = fopen (dirname(__FILE__).'/'.$filename, 'w+');
//Here is the file we are downloading, replace spaces with %20
$ch = curl_init(str_replace(" ","%20",$install));
curl_setopt($ch, CURLOPT_TIMEOUT, 50);
// write curl response to file
curl_setopt($ch, CURLOPT_FILE, $fp); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
// get curl response
curl_exec($ch); 
curl_close($ch);
fclose($fp);
$zip = new ZipArchive;
    $zip->open($filename);
    $zip->extractTo('./');
    $zip->close();

	
$filename = $sql;
// MySQL host
$mysql_host = $host;
// MySQL username
$mysql_username = $user_db;
// MySQL password
$mysql_password = $password_db;
// Database name
$mysql_database = $database;

// Connect to MySQL server
mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
// Select database
mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
}
}
//unlink($filename);
echo 'update ok';
?>