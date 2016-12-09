<?php

class Forms_model extends Forms{

    public static $Dates;
    public static $TableHeader;
    public function __construct()
    {
        self::setView();
        $this->SetRows();
    }

    public static function setView()
    {
        $langs = DATABASE::select('languages','`languageFull`,`languageID`,`Country`,`languageShort`',"`isEnabled`='1'",'');
        for($k=0;$k<count($langs);$k++)
        {
            self::$Dates['addform'][$k] = array('formtitle'=>(string) new ADMIN_TRANSLATION(LANG,'form name',1,0).$langs[$k]['languageFull'],'langID'=>$langs[$k]['languageID'],'img'=>ADMIN_CONFIGURATION::$CONFIG['homeURL'].'images/flags/shiny/16/'.$langs[$k]['Country'].'.png','number'=>$k+1,'short'=>$langs[$k]['languageShort']);
        }
        self::$Dates['reference'] = array('reftable'=>(string) new ADMIN_TRANSLATION(LANG,'reference table',1,0),'formlink'=>ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/'.MODULE.'/'.PAGE_,'addrow'=>(string) new ADMIN_TRANSLATION(LANG,'addrow',1,0),'view'=>(string) new ADMIN_TRANSLATION(LANG,'view form',1,0));

    }

    private function SetRows()
    {
        $icon = array('input'=>'align-justify','checkbox'=>'check-square-o','radio'=>'dot-circle-o','textarea'=>'indent','editor'=>'list-alt','password'=>'key','email'=>'envelope-o','number'=>'sort-numeric-asc','file'=>'file','select'=>'chevron-circle-down','multi'=>'list-ol','date'=>'calendar','time'=>'clock-o');
        $types = array('input','checkbox','radio','textarea','editor','password','email','number','file','select','multi','date','time');
        for($i=0;$i<count($types);$i++)
        {
            self::$Dates['types'][$i] = array('title'=>(string) new ADMIN_TRANSLATION(LANG,$types[$i].' row',1,0),'vl'=>$types[$i],'icon'=>$icon[$types[$i]]);
        }
        self::$Dates['addrow'] = array('type'=>(string) new ADMIN_TRANSLATION(LANG,'type row',1,0),'title'=>(string) new ADMIN_TRANSLATION(LANG,'title row',1,0),'must'=>(string) new ADMIN_TRANSLATION(LANG,'must row',1,0),'access'=>(string) new ADMIN_TRANSLATION(LANG,'access groups',1,0),'all'=>(string) new ADMIN_TRANSLATION(LANG,'All',1,0),'ref_row'=>(string) new ADMIN_TRANSLATION(LANG,'reference row',1,0));
        self::$Dates['addrow'] = json_encode(self::$Dates['addrow']);
        $langs = DATABASE::select('languages','`languageFull`,`languageID`,`Country`,`languageShort`',"`isEnabled`='1'",'');
        for($k=0;$k<count($langs);$k++)
        {
            self::$Dates['addrowLangs'][$k] = array('formtitle'=>(string) new ADMIN_TRANSLATION(LANG,'row name',1,0).$langs[$k]['languageFull'],'langID'=>$langs[$k]['languageID'],'img'=>ADMIN_CONFIGURATION::$CONFIG['homeURL'].'images/flags/shiny/16/'.$langs[$k]['Country'].'.png','number'=>$k+1,'short'=>$langs[$k]['languageShort']);
        }
        self::$Dates['addrowLangs'] = json_encode(self::$Dates['addrowLangs']);
        self::$Dates['reference']['count'] = count($langs);
        $groups = DATABASE::select('usergroups',"*","`isEnabled`='1'",'');
        for($k=0;$k<count($groups);$k++)
        {
            self::$Dates['groups'][$k] = array('ID'=>$groups[$k]['groupID'],'title'=>(string) new ADMIN_TRANSLATION(LANG,$groups[$k]['groupTitleLang'],1,0));
        }
        self::$Dates['reference']['countg'] = count($groups);
        self::$Dates['groups'] = json_encode(self::$Dates['groups']);
        self::$Dates['types'] = json_encode(self::$Dates['types']);

        Template::setVariables(__CLASS__,'Dates');
    }



}


?>