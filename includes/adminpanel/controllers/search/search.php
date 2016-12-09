<?php

class Search extends ADMIN_CONFIGURATION{

    public static $IconsForHeader = array('add'=> 'plus','view'=>'eye','disactivate'=>'minus-square-o');
    public static $LinksForHeader = array('add'=>'add','view'=>'view','disactivate'=>'dell');
    public static $Array = array();

    public function __construct()
	{
        self::ShowHeader();
	}

	public static function ShowHeader()
    {

        self::$Array['header'][]=array('title'=>(string) new ADMIN_TRANSLATION(LANG,'Add',1,0),'icon'=>self::$IconsForHeader['add'],'link'=>ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/'.MODULE.'/'.self::$LinksForHeader['add']);
        self::$Array['header'][]=array('title'=>(string) new ADMIN_TRANSLATION(LANG,'View',1,0),'icon'=>self::$IconsForHeader['view'],'link'=>ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/'.MODULE.'/'.self::$LinksForHeader['view']);
        self::$Array['header'][]=array('title'=>(string) new ADMIN_TRANSLATION(LANG,'Disactive',1,0),'icon'=>self::$IconsForHeader['disactivate'],'link'=>ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/'.MODULE.'/'.self::$LinksForHeader['disactivate']);
        Template::setVariables(__CLASS__,'Array');
    }

}
?>