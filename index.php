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


$httpRequest = explode('/',$_SERVER['REQUEST_URI']);
$extension = explode('.',$httpRequest[count($httpRequest)-1]);
if ($_SERVER['HTTP_HOST']=='localhost')
{
	$top_page = $httpRequest[2];
	$Request = mb_substr($_SERVER['REQUEST_URI'],strlen($httpRequest[1])+1);
}

if ($top_page=='admin')
{
	new ADMIN_CONFIGURATION();
	ob_start();
	$template = new Template(dirname(__FILE__).'/includes/adminpanel/controllers/'.ADMIN_CONFIGURATION::$PAGE['StartFile']);
	$template = new Template(dirname(__FILE__).'/includes/adminpanel/models/'.ADMIN_CONFIGURATION::$PAGE['StartFile']);
	$template = new Template(dirname(__FILE__).'/includes/adminpanel/views/'.MODULE.'.html');
	require_once ('includes/common/controllers/Ajax.php');
	$template = new Template(dirname(__FILE__).'/includes/adminpanel/views/adminPanel.html');


}
else {

	new CONFIGURATION();
}

exit;
?>
