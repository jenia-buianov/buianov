<?php
class ADMIN_CONFIGURATION extends CONFIGURATION{
	
	static public $CONFIG;
	static public $CONNECTION;
	static public $PAGE;
	static public $ACCESSMODULE;
	public $URL, $ID, $MODULE, $LANG, $PAGE_;
	
	public function __construct()
	{
		new DATABASE();
		parent::makeConfigArray();
        self::$CONNECTION = parent::$CONNECTION;
		$this->DefineURL();
		$this->FindPageInDB();
		parent::Settings();
		self::$CONFIG = parent::$CONFIG;
	}
	
	private function DefineURL()
	{
		global $_GET, $_SERVER;
		if(!empty($_GET['route']))
		{
			$arrayROUTE = explode( '/', trim($_GET['route'],'/') );
			if (!empty($arrayROUTE[1]))
			{
			    $findUserLanguage = parent::select('admin_languages','`languageID`',"`languageShort`='".$arrayROUTE[1]."' AND `isEnabled`='1'",'');
				if (is_array($findUserLanguage)) $this->LANG = $arrayROUTE[1];
			}
			if (empty($arrayROUTE[2])&&empty($arrayROUTE[3]))
			{
				
				$this->PAGE_ = '';
				$this->MODULE = '';
				$this->ID = 'homepage';
				
			}else
			{
				
				if (!empty($arrayROUTE[2])) $this->MODULE = htmlspecialchars($arrayROUTE[2],ENT_QUOTES);  else $this->MODULE = '';
				if (!empty($arrayROUTE[3])) $this->PAGE_=htmlspecialchars($arrayROUTE[3],ENT_QUOTES); else $this->PAGE_ = '';
				if (!empty($arrayROUTE[4])) $this->ID=htmlspecialchars($arrayROUTE[4],ENT_QUOTES); else $this->ID = '';
			}
			
		}
		else {
			$this->PAGE_ = '';
			$this->MODULE = '';
			$this->ID = 'homepage';
		}
		if (empty($this->LANG)) $this->LANG = 'ru';
		if (empty($this->MODULE)&&!empty($this->ID)) {$this->MODULE = $this->ID;}
		
		define('MODULE',$this->MODULE);
		define('LANG',$this->LANG);
		define('PAGE',$this->PAGE_);
		define('ID',$this->ID);
		
	}
	
	private function FindPageInDB()
	{
		$thisUser = new USER($_SESSION['userID']);
		$getPage = parent::select('modules','*',"`moduleTitle`='{$this->MODULE}' AND `isEnabled`='1' AND (`adminPanel`='1' OR `adminPanel`='2') AND (`accessGroup` IN ('".$thisUser->GROUP."') OR `accessUsers` IN ('".$thisUser->USERID."'))",'');
		if (count($getPage)==0){
			header("HTTP/1.0 404 Not Found");
			require_once(dirname(__FILE__).'/../../common/views/404.php');
			exit;
		}
		elseif(!empty($this->PAGE_)) {
			$getPage = parent::select('modules','*',"`moduleTitle`='{$this->MODULE}' AND `isEnabled`='1' AND `adminPanel`='1' AND (`accessGroup` IN ('".$thisUser->GROUP."') OR `accessUsers` IN ('".$thisUser->USERID."'))",'');
			if (count($getPage)==0){
				header("HTTP/1.0 404 Not Found");
                require_once(dirname(__FILE__).'/../../common/views/404.php');
				exit;
			}else self::$PAGE = $getPage[0];
		}else self::$PAGE = $getPage[0];
		
	}
	
	
}

require_once ("includes/adminpanel/controllers/AdminTranslationClass.php");
require_once ("includes/adminpanel/controllers/AdminNotifications.php");
require_once ("includes/adminpanel/controllers/AdminInbox.php");
require_once ("includes/adminpanel/controllers/AdminMenu.php");
require_once ("includes/adminpanel/controllers/AdminCalendar.php");

?>