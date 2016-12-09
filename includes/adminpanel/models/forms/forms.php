<?php

class Forms_model extends Forms{

    public static $Dates;
    public static $TableHeader;
    public function __construct()
    {
        self::setView();
        $this->setTableHeader();
    }

    public static function setView()
    {
        $tmp = array();
        $Forms = parent::select('forms',"*","",'');
        if(count($Forms)>0){
            for($k=0;$k<count($Forms);$k++)
            {
                if ($Forms[$k]['isEnabled']==1) $Enabled = ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/'.MODULE.'/dell/'.$Forms[$k]['formID']; else $Enabled = ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/'.MODULE.'/active/'.$Forms[$k]['formID'];
                $tmp[] = array('formID'=>$Forms[$k]['formID'],'title'=>(string) new ADMIN_TRANSLATION(LANG,$Forms[$k]['formLangTitle'],1,0),'enabled'=>$Enabled,'edit'=> ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/'.MODULE.'/edit/'.$Forms[$k]['formID'],'number'=>$k+1);
            }
            self::$Dates['Dates'] = $tmp;
        }
        self::$Dates['editButtons'] = array('Delete'=>(string) new ADMIN_TRANSLATION(LANG,'Delete',1,0),'Edit'=>(string) new ADMIN_TRANSLATION(LANG,'Edit',1,0));
        Template::setVariables(__CLASS__,'Dates');
    }
    private function setTableHeader()
    {
        self::$TableHeader['tableHeader'] = array('title'=>(string) new ADMIN_TRANSLATION(LANG,'module table title',1,0), 'activity'=>(string) new ADMIN_TRANSLATION(LANG,'activity',1,0),  'edit'=>(string) new ADMIN_TRANSLATION(LANG,'Edit',1,0));
        Template::setVariables(__CLASS__,'TableHeader');
    }



}


?>