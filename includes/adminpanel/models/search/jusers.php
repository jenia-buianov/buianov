<?php

class Search_model extends Search
{

    public static $Dates;

    public function __construct()
    {
        $this->users();
    }
    private function users()
    {
        $getAllRows = DATABASE::select('admin_tableheaders',"`rowID`","`isEnabled`='1' AND `table_reference`='users' AND `search`='1'",'');
        if (count($getAllRows)>0)
        {
            for($k=0;$k<count($getAllRows);$k++)
            {
                $AllUsers = DATABASE::select('users',"`".$getAllRows[$k]['rowID']."` AS `userLogin`",'','');
                for($i=0;$i<count($AllUsers);$i++)
                self::$Dates[] = $AllUsers[$i];

            }
            echo json_encode(self::$Dates);
        }

    }

}
new Search_model();
exit;

?>