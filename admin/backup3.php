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
$name = $_POST['name'];
//echo $name;
$pathdir = './';
$zip = new ZipArchive; // класс для работы с архивами
if ($zip -> open('backups/'.$name, ZipArchive::CREATE) === TRUE){ // создаем архив, если все прошло удачно продолжаем
    $dir = opendir($pathdir); // открываем папку с файлами
    while( $file = readdir($dir)){ // перебираем все файлы из нашей папки
            if (is_file($pathdir.$file)){ // проверяем файл ли мы взяли из папки
                $zip -> addFile($pathdir.$file, $file); // и архивируем
               
            }
    }
	$nm = 'backups/'.$name;

	$zip -> close(); // закрываем архив.
    echo language('was created backup',$lang).$name;	
}else{
    die ('Произошла ошибка при создании архива');
}
?>