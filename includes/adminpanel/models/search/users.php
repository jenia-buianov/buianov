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
        $AllUsers = DATABASE::select('users',"`userLogin`, concat(`userName`, ' ',`userLastName`) AS `name`",'','');
        if (count($AllUsers)>0) echo json_encode($AllUsers);

    }

}
new Search_model();
exit;

?>