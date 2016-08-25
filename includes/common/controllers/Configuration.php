<?php
class CONFIGURATION extends DATABASE{
	
	static public $CONFIG;
	static public $CONNECTION;
	public $URL, $ID, $MODULE, $LANG;
	
	public function __construct()
	{
	    new DATABASE();
        self::$CONNECTION = parent::$CONNECTION;
		self::makeConfigArray();
		$this->DefineURL();
		$this->FindPageInDB();
		self::Settings();
	}
	

	static public function makeConfigArray()
	{
		global $_SERVER;
		
		if($_SERVER['HTTP_HOST']=='localhost')
		self::$CONFIG['homeURL'] =  'http://localhost/buianov/';
		else self::$CONFIG['homeURL'] = $_SERVER['HTTP_HOST'];
		
		self::$CONFIG['web_page'] = $_SERVER['REQUEST_URI'];
		self::$CONFIG['time'] = date('H:i:s');
		self::$CONFIG['date'] = date('Y-m-d');
		self::$CONFIG['hours'] = (int) date('H');
		self::$CONFIG['minutes'] = (int) date('i');
		self::$CONFIG['day'] = (int) date('d');
		self::$CONFIG['month'] = (int) date('m');
		self::$CONFIG['yaer'] = (int) date('Y');
		self::$CONFIG['ip'] = $_SERVER['REMOTE_ADDR'];
		self::$CONFIG['timeSeconds'] = time();
		
		
	}
	static public function ShowAllConfig()
	{
		return print_r(self::$CONFIG);
	}
	static public function ReturnConfigName($Name)
	{
		return self::$CONFIG[$Name];
	}
	
	private function DefineURL()
	{
		global $_GET, $_SERVER;
		if(!empty($_GET['route']))
		{
			$arrayROUTE = explode( '/', trim($_GET['route'],'/') );
			if (!empty($arrayROUTE[0]))
			{
				$findUserLanguage = parent::select('languages','`languageID`',"`languageShort`='".$arrayROUTE[0]."' AND `isEnabled`='1'",'');
				if (is_array($findUserLanguage)) $this->LANG = $arrayROUTE[0];					
			}
			if (empty($arrayROUTE[1])&&empty($arrayROUTE[2]))
			{
				$this->MODULE = '';
				$this->ID = 'homepage';
			}else
			{
				if (!empty($arrayROUTE[1])) $this->MODULE = htmlspecialchars($arrayROUTE[1],ENT_QUOTES);  else $this->MODULE = '';
			}
			if (!empty($arrayROUTE[2])) $this->ID=htmlspecialchars($arrayROUTE[2],ENT_QUOTES); else $this->ID = '';
		}
		else {
			$this->MODULE = '';
			$this->ID = 'homepage';
		}
		if (empty($this->LANG)) $this->LANG = 'ru';
		
		if (empty($this->MODULE)&&!empty($this->ID)) $this->MODULE = $this->ID;
		define('MODULE',$this->MODULE);
		define('LANG',$this->LANG);
		define('ID',$this->ID);
		
	}
	
	private function FindPageInDB()
	{
	    //echo $this->LANG.' '.$this->MODULE.' '.$this->ID;
	    $getPage = parent::select('modules','`moduleDirectory`',"`moduleTitle`='{$this->MODULE}'",'');

		if (count($getPage)==0){
			header("HTTP/1.0 404 Not Found");
            require_once(dirname(__FILE__).'/../../common/views/404.php');
			exit;
		}
	}
	static public function Settings()
	{
	
		$getSettings = self::select('settings','`settingName`,`settingValue`',"`isEnabled`='1'",'`settingName`');
		if (count($getSettings)>0)
		{
			for($k=0;$k<count($getSettings);$k++)
			{
				self::$CONFIG[$getSettings[$k]['settingName']] = $getSettings[$k]['settingValue'];
			}
		}
	}
	
}

?>