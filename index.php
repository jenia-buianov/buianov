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
if ($_SERVER['HTTP_HOST']=='localhost') $top_page = $httpRequest[2];
else $top_page = $httpRequest[1];

if ($top_page=='admin')
{
	new ADMIN_CONFIGURATION();

	ob_start();
	$MODULE = MODULE;
	$_MODULE = strtoupper($MODULE[0]).substr($MODULE,1);
    $_MODULE_model = $_MODULE.'_model';
    $_PAGE = PAGE_;
    define('MOD',$_MODULE);
    define('MODEL',$_MODULE_model);
    if (file_exists(dirname(__FILE__).'/adminpanel/js/'.MODULE.'.js')) define('JS',ADMIN_CONFIGURATION::$CONFIG['homeURL'].'adminpanel/js/'.MODULE.'.js'); else define('JS','');
    ADMIN_CONFIGURATION::$CONFIG['AdminModules'] = explode(',',ADMIN_CONFIGURATION::$CONFIG['AdminModules']);
    ADMIN_CONFIGURATION::$CONFIG['SiteModules'] = explode(',',ADMIN_CONFIGURATION::$CONFIG['SiteModules']);
    if (!empty(ADMIN_CONFIGURATION::$PAGE['moduleDirectory'])) $additionalDirectory = ADMIN_CONFIGURATION::$PAGE['moduleDirectory'].'/'; else $additionalDirectory = '';
	if (!empty($_PAGE)){
	    ADMIN_CONFIGURATION::$PAGE['moduleNameLang'] = ADMIN_CONFIGURATION::$PAGE['modulePageTitleLang'];
	    if (!empty(ADMIN_CONFIGURATION::$PAGE['moduleController'])) $Controller = ADMIN_CONFIGURATION::$PAGE['moduleController']; else $Controller = ADMIN_CONFIGURATION::$PAGE['StartFile'];
        if (!empty(ADMIN_CONFIGURATION::$PAGE['moduleModel'])) $Model = ADMIN_CONFIGURATION::$PAGE['moduleModel']; else $Model = ADMIN_CONFIGURATION::$PAGE['StartFile'];
        if (!empty(ADMIN_CONFIGURATION::$PAGE['moduleView'])) $View = ADMIN_CONFIGURATION::$PAGE['moduleView']; else $View = $MODULE;
    }
    else{
        $Controller = ADMIN_CONFIGURATION::$PAGE['StartFile'];
        $Model = ADMIN_CONFIGURATION::$PAGE['StartFile'];
        $View = $MODULE;

    }
    $template = new Template(dirname(__FILE__).'/includes/adminpanel/controllers/'.$additionalDirectory.$Controller);
	$template = new Template(dirname(__FILE__).'/includes/adminpanel/models/'.$additionalDirectory.$Model);
	if (!in_array($MODULE,ADMIN_CONFIGURATION::$CONFIG['AdminModules'])and class_exists($_MODULE)) new $_MODULE();
    if (!in_array($MODULE,ADMIN_CONFIGURATION::$CONFIG['AdminModules'])and class_exists($_MODULE)and class_exists($_MODULE_model)) new $_MODULE_model();

    if (count(Template::$Arrays)>0)
    {
        for($i=0;$i<count(Template::$Arrays);$i++)
            extract(Template::$Arrays[$i]);
    }
    $template = new Template(dirname(__FILE__).'/includes/adminpanel/views/'.$additionalDirectory.$View.'.html');
    include('includes/common/controllers/ajax.php');
	$template = new Template(dirname(__FILE__).'/includes/adminpanel/views/adminPanel.html');




}
else {

	new CONFIGURATION();
}

exit;
?>
