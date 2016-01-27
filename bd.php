<?php
require_once 'config.php';
$buianov_name = $buianov_name;
$buianov_lastname = $buianov_lastname;
$buianov_password = $buianov_password;
function error($type,$error_id)
{
	if ($type=='fatal')
	{
		if ($error_id=='edv') echo '<system_error>Empty database parameters for connecting to database</system_error>';
		if ($error_id=='connectdb') echo '<system_error>The system cannot connect to database</system_error>';
		if ($error_id=='404') echo '<system_error>The system cannot find this page or you not allowed</system_error>';
		exit;
	}
}
$db = mysql_connect ($host,$user_db,$password_db);
if (empty($host)||empty($user_db))
error('fatal','edv');
if (!$db) error('fatal','conncetdb');
$bd = mysql_select_db ($database,$db);
if (!$bd) error('fatal','conncetdb');
mysql_query("SET NAMES 'UTF8'");
mysql_query("SET CHARACTER SET 'UTF8'");

$t_now = date('H:i:s');
$date = date('Y-m-d');
$hour = date('H');
$day = date('d');
$ip = $_SERVER['REMOTE_ADDR'];
$home_url = 'http://localhost/buianov/';
$admin_page = 'http://localhost/buianov/admin/';
$web_page = $_SERVER['REQUEST_URI'];
$page_now = $home_url.$web_page;
$yaer = date('Y');
$minutes = date('i');
$month = date('m');
$visit = date('s')+date('i')*60+(date('H')*3600)+($day*3600*24)+($month*30*3600*24)+($yaer*12*30*3600*24);
$lang = 'ru';


$mymail = 'jenia.don.bosco@gmail.com';
$mypassword = 'Qq4541201096';
$title_mail = 'Буянов Евгений';

function language($id,$ln)
{
	
	$sql_text = mysql_query("SELECT text FROM admin_translation WHERE title='$id' and lang='$ln'");
	if (mysql_num_rows($sql_text)>0)
	{
		$text = mysql_fetch_array($sql_text);
		return $text['text'];
	}
	else{
   $sql_1 = mysql_query("SELECT text FROM admin_translation WHERE title='$id'");
   $tt = mysql_fetch_array($sql_1);
   $curl = curl_init();
   $tt1 = ''; $i=0;
   $e1 = explode(" ",$tt[text]);
   if (count($e1)>0)
   {
	   while($i<count($e1))
	   {
		   $tt1.=$e1[$i].'%20';
		   $i++;
	   }
	   $tt[text] = $tt1;
   }
   
   curl_setopt($curl, CURLOPT_URL, 'https://translate.google.ru/translate_a/single?client=t&sl=auto&tl='.$ln.'&hl=ru&dt=bd&dt=ex&dt=ld&dt=md&dt=qca&dt=rw&dt=rm&dt=ss&dt=t&dt=at&ie=UTF-8&oe=UTF-8&otf=2&srcrom=0&ssel=0&tsel=4&kc=1&tk=896930|757455&q='.$tt[text]);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
   $data = curl_exec($curl);
   curl_close($curl);
   $spl = explode('",',$data);
   $spl = explode('"',$spl[0]);
   $data = trim(strtoupper($spl[1][0]).substr($spl[1],1,strlen($spl[1])));
  
  $ins = mysql_query("INSERT INTO admin_translation(title,text,lang)VALUES('$id','$data','$ln')");
   return $data;
	}
}

function lang($id,$ln)
{
	
	$sql_text = mysql_query("SELECT text FROM translation WHERE title='$id' and lang='$ln'");
	if (mysql_num_rows($sql_text)>0)
	{
		$text = mysql_fetch_array($sql_text);
		return $text['text'];
	}
	else{
   $sql_1 = mysql_query("SELECT text FROM translation WHERE title='$id'");
   $tt = mysql_fetch_array($sql_1);
   $curl = curl_init();
   $tt1 = ''; $i=0;
   $e1 = explode(" ",$tt[text]);
   if (count($e1)>0)
   {
	   while($i<count($e1))
	   {
		   $tt1.=$e1[$i].'%20';
		   $i++;
	   }
	   $tt[text] = $tt1;
   }
   
   curl_setopt($curl, CURLOPT_URL, 'https://translate.google.ru/translate_a/single?client=t&sl=auto&tl='.$ln.'&hl=ru&dt=bd&dt=ex&dt=ld&dt=md&dt=qca&dt=rw&dt=rm&dt=ss&dt=t&dt=at&ie=UTF-8&oe=UTF-8&otf=2&srcrom=0&ssel=0&tsel=4&kc=1&tk=896930|757455&q='.$tt[text]);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
   $data = curl_exec($curl);
   curl_close($curl);
   $spl = explode('",',$data);
   $spl = explode('"',$spl[0]);
   $data = trim(strtoupper($spl[1][0]).substr($spl[1],1,strlen($spl[1])));
  
  $ins = mysql_query("INSERT INTO translation(title,text,lang)VALUES('$id','$data','$ln')");
   return $data;
	}
}
function connect_to_buianov($buianov_name,$buianov_lastname,$buianov_password,$lang)
{
	$sql_version = mysql_query("SELECT version FROM admin_version ORDER BY id DESC LIMIT 1");
	if (mysql_num_rows($sql_version)>0)
	{
		$v = mysql_fetch_array($sql_version);
		$version = $v[version];
	}
		
	
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'http://kontaktplus.in/buianov/');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, 'name='.$buianov_name.'&lastname='.$buianov_lastname.'&password='.$buianov_password.'&version='.$version.'&lang='.$lang);
	$out = curl_exec($curl);
    curl_close($curl);
	
	return $out;
	
}
?>