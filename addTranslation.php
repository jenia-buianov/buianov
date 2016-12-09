<?php
session_start();
$_SESSION['userID'] = 1;
require_once ('includes/common/controllers/database.php');
require_once ('includes/common/controllers/Template.php');
require_once ('includes/common/controllers/DatabaseClass.php');
require_once ('includes/common/controllers/Users.php');
require_once ('includes/common/controllers/Configuration.php');
require_once ("includes/common/controllers/GetsClass.php");
require_once ("includes/site/controllers/TranslationClass.php");
require_once ('includes/common/controllers/AdminConfiguration.php');
new CONFIGURATION();
if (!empty($_POST))
{
	
	$number = htmlspecialchars($_POST['number'],ENT_QUOTES);
	$arrayWhat = array();
	$arrayValues = array();
	$insert = false;
	for($k=1;$k<=$number;$k++)
	{
		
		$translationTitleLang = htmlspecialchars($_POST['translationTitleLang'.$k],ENT_QUOTES);
		$LanguageID = htmlspecialchars($_POST['LanguageID'.$k],ENT_QUOTES);
		$text = htmlspecialchars($_POST['text'.$k],ENT_QUOTES);
		array_push($arrayWhat,'`translationTitleLang`,`LanguageID`,`text`,`timeSeconds`,`isEnabled`');
		array_push($arrayValues,"'{$translationTitleLang}','{$LanguageID}','{$text}','".CONFIGURATION::$CONFIG['timeSeconds']."','1'");
	}
	//var_dump($arrayValues);
	$insert = DATABASE::insert('admin_translation',$arrayWhat,$arrayValues,1);
	if ((is_bool($insert)&&$insert==true) or is_array($insert)) echo '<p>Was Added</p><p>'.print_r($insert).'</p>'; else echo '<p>'.$insert.'</p>';
}
?>
<html>
<head>
<script type="text/javascript" src="https://p.w3layouts.com/demos/may-2016/10-05-2016/nuptials/web/js/jquery-2.1.4.min.js"></script>
<title>Add translation</title>
</head>
<body>
<form action="addTranslation.php" method="post">
	<p><input type="number" value="1" id="number" name="number" placeholder="Количество записей" onChange="ChangeNumber()" style="width:40%;height:30px;"/></p>
	<p><input type="text" value="" name="translationTitleLang1" placeholder="translationTitleLang" style="width:40%;height:30px;"/><p>
	<p><input type="number" value="1" name="LanguageID1" placeholder="LanguageID" style="width:40%;height:30px;"/><p>
	<p><textarea name="text1" placeholder="text" style="width:40%;height:150px;"></textarea><p>
    <div id="content"></div>
    <p align="center"><input type="submit" value="Add" /> </p>
</form>
<script>
number = 1;
function ChangeNumber()
{
	if (document.getElementById('number').value>number)
	{
		for(k=number+1;k<=document.getElementById('number').value;k++)
		{
			$('#content').append('<p><input type="text" value="" name="translationTitleLang'+k+'" placeholder="translationTitleLang" style="width:40%;height:30px;"/><p><p><input type="number" value="1" name="LanguageID'+k+'" placeholder="LanguageID" style="width:40%;height:30px;"/><p><p><textarea name="text'+k+'" placeholder="text" style="width:40%;height:150px;"></textarea><p>');
		}
		number = document.getElementById('number').value;
	}
	
}
</script>
</body>
</html>