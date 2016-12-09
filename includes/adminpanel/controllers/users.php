<?php

class Users extends ADMIN_CONFIGURATION{

    public static $IconsForHeader = array('add'=> 'plus','view'=>'eye','disactivate'=>'minus-square-o','edit'=>'pencil-square-o','groups'=>'users','table'=>'table');
    public static $LinksForHeader = array('add'=>'add','view'=>'view','disactivate'=>'disactive','edit'=>'edit_module','groups'=>'groups','table'=>'edit_db');
    public static $Array = array();
    public static $Titles = array();

    public function __construct()
    {
        self::ShowHeader();
    }

    public static function ShowHeader()
    {
        self::$Array['header'][]=array('title'=>(string) new ADMIN_TRANSLATION(LANG,'register_user',1,0),'icon'=>self::$IconsForHeader['add'],'link'=>ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/'.MODULE.'/'.self::$LinksForHeader['add']);
        self::$Array['header'][]=array('title'=>(string) new ADMIN_TRANSLATION(LANG,'View',1,0),'icon'=>self::$IconsForHeader['view'],'link'=>ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/'.MODULE.'/'.self::$LinksForHeader['view']);
        self::$Array['header'][]=array('title'=>(string) new ADMIN_TRANSLATION(LANG,'Disactivate',1,0),'icon'=>self::$IconsForHeader['disactivate'],'link'=>ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/'.MODULE.'/'.self::$LinksForHeader['disactivate']);
        self::$Array['header'][]=array('title'=>(string) new ADMIN_TRANSLATION(LANG,'Edit module',1,0),'icon'=>self::$IconsForHeader['edit'],'link'=>ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/'.MODULE.'/'.self::$LinksForHeader['edit']);
        self::$Array['header'][]=array('title'=>(string) new ADMIN_TRANSLATION(LANG,'Groups',1,0),'icon'=>self::$IconsForHeader['groups'],'link'=>ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/'.self::$LinksForHeader['groups']);
        self::$Array['header'][]=array('title'=>(string) new ADMIN_TRANSLATION(LANG,'Edit table',1,0),'icon'=>self::$IconsForHeader['table'],'link'=>ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/'.MODULE.'/'.self::$LinksForHeader['table']);
        self::$Titles['Titles'] = array('search'=>(string) new ADMIN_TRANSLATION(LANG,'search in module',1,0),'search_link'=>ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/search/users/','search_json_link'=>ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/search/jusers/');

        Template::setVariables(__CLASS__,'Array');
        Template::setVariables(__CLASS__,'Titles');
    }

}

?>