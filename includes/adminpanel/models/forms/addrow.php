<?php

class Forms_model extends Forms{

    public static $Dates;
    public static $TableHeader;
    public function __construct()
    {
        self::getDatabase();
        $this->SetRows();
    }

    private static function getDatabase()
    {

        $table = htmlspecialchars($_POST['table'],ENT_QUOTES);
        $numberRow = htmlspecialchars($_POST['numberRow'],ENT_QUOTES);
        /*
        if (!empty($table))
        {
            $getRowsFromDB =
        }
        */


    }
    private function SetRows()
    {
        $icon = array('input'=>'align-justify','checkbox'=>'check-square-o','radio'=>'dot-circle-o','textarea'=>'indent','editor'=>'list-alt','password'=>'key','email'=>'envelope-o','number'=>'sort-numeric-asc','file'=>'file','select'=>'chevron-circle-down','multi'=>'list-ol','date'=>'calendar','time'=>'clock-o');
        $types = array('input','checkbox','radio','textarea','editor','password','email','number','file','select','multi','date','time');
        for($i=0;$i<count($types);$i++)
        {
            self::$Dates['types'][$types[$i]] = (string) new ADMIN_TRANSLATION(LANG,$types[$i].' row',1,0);
        }
        self::$Dates['icon'] = $icon;
    }

}
new Forms_model();
extract(Forms_model::$Dates);

exit;
?>