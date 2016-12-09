<?php

class Modules_model extends Modules{

    public static $Dates;
    public static $TableHeader;
    public function __construct()
    {
        self::setView();
        $this->setTableHeader();
    }

    public static function setView()
    {
        $adminModules = ADMIN_CONFIGURATION::$CONFIG['AdminModules'];
        $siteModules = ADMIN_CONFIGURATION::$CONFIG['SiteModules'];

        $Modules = parent::select('modules',"*","",'`adminPanel`');
        (int) $k=1;
        foreach ($Modules as $module=>$v)
        {
            $temp = array();
            if (!in_array($v['moduleTitle'],$adminModules) and $v['adminPanel']==1) {
                    $temp['editable'] = '<a href="' . ADMIN_CONFIGURATION::$CONFIG['adminURL'] . LANG . '/' . MODULE . '/edit/' . $v['moduleTitle'] . '" data-toggle="link">' . (string)new ADMIN_TRANSLATION(LANG, 'Edit', 1, 0) . '</a>';
                    $temp['enabled'] = '<a href="' . ADMIN_CONFIGURATION::$CONFIG['adminURL'] . LANG . '/' . MODULE . '/dell/' . $v['moduleTitle'] . '" data-toggle="link">' . (string)new ADMIN_TRANSLATION(LANG, 'Disactive', 1, 0) . '</a>';
            }
            else {
                $temp['editable'] = (string) new ADMIN_TRANSLATION(LANG,'SystemModule',1,0);
                $temp['enabled'] = '';
            }
            if ($v['adminPanel']==0) $temp['type'] = (string) new ADMIN_TRANSLATION(LANG,'site',1,0); else $temp['type'] = (string) new ADMIN_TRANSLATION(LANG,'adminpanel',1,0);

            $temp['link'] = ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/'.$v['moduleTitle'];
            $temp['title'] = (string) new ADMIN_TRANSLATION(LANG,$v['moduleNameLang'],1,0);
            $temp['number'] = $k;
            self::$Dates['Dates'][] = $temp;
            $k++;
        }
        Template::setVariables(__CLASS__,'Dates');
    }
    private function setTableHeader()
    {
        self::$TableHeader['tableHeader'] = array('title'=>(string) new ADMIN_TRANSLATION(LANG,'module table title',1,0), 'activity'=>(string) new ADMIN_TRANSLATION(LANG,'activity',1,0), 'type'=>(string) new ADMIN_TRANSLATION(LANG,'type',1,0), 'edit'=>(string) new ADMIN_TRANSLATION(LANG,'Edit',1,0));
        Template::setVariables(__CLASS__,'TableHeader');
    }



}
$modules = new Modules_model();


?>