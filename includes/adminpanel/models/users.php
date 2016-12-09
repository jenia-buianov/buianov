<?php

class Users_model extends Users{

    public static $Dates;
    public function __construct()
    {
        self::setView();
    }

    public static function setView()
    {
        if (!isset($_SESSION['users_onpage'])) $_SESSION['users_onpage'] = 25;
        $start = 0;
        if (isset($_SESSION['users_onpage'])) $LIMIT = $start; else $LIMIT = 0;
        $LIMIT.= ','.$_SESSION['users_onpage'];



        $tmp = array();
        $vl_ = array();
        $TableTitles = DATABASE::select('admin_tableheaders','*',"`isEnabled`='1' AND `table_reference`='".ADMIN_CONFIGURATION::$PAGE['tableReference']."'",'');
        if (count($TableTitles)>0)
        {
            self::$Dates['tHeader'] = $TableTitles;
            for($k=0;$k<count($TableTitles);$k++)
                $vl_[] = $TableTitles[$k]['rowID'];
            $vl = join(",",$vl_);
        }

        $AllUsers = DATABASE::select('users',$vl,"",'`userID` LIMIT '.$LIMIT);
        if (count($AllUsers)>0)
        {
            foreach($AllUsers as $all=>$val)
            $tmp[] = $val;
            self::$Dates['users'] = $tmp;
        }
        $Groups = array();
        $AllGroups = DATABASE::select('usergroups','`groupID`,`groupTitleLang`',"`isEnabled`='1'",'');
        for($k=0;$k<count($AllGroups);$k++)
        {
            $Groups[] = array('ID'=>$AllGroups[$k]['groupID'],'Name'=>(string) new ADMIN_TRANSLATION(LANG,$AllGroups[$k]['groupTitleLang'],1,0));
        }
        self::$Dates['groups'] = $Groups;
        self::$Dates['editButtons'] = array('Delete'=>(string) new ADMIN_TRANSLATION(LANG,'Delete',1,0),'Edit'=>(string) new ADMIN_TRANSLATION(LANG,'Edit',1,0));


        //self::$Dates['tHeader'] = array('login'=>(string) new ADMIN_TRANSLATION(LANG,'login',1,0),'name'=>(string) new ADMIN_TRANSLATION(LANG,'name lastname',1,0),'edit'=>(string) new ADMIN_TRANSLATION(LANG,'Edit',1,0));
        Template::setVariables(__CLASS__,'Dates');
    }


}


?>