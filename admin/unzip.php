<?
session_start();
include("bd.php");

$sql = explode('/',$_POST[id]);
$sql = substr($sql[1],0,strlen($sql[1])-3).'sql';
$zip = new ZipArchive;
    $zip->open($_POST['id']);
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
?>