<?php

class Forms_model extends Forms{

    public static $Dates;
    public static $TableHeader;
    public function __construct()
    {
        $table = htmlspecialchars($_POST['table'],ENT_QUOTES);
        $GetRows = DATABASE::select('admin_tableheaders',"`name`,`rowID`","`isEnabled`='1' AND `table_reference`='".$table."'",'');
        echo json_encode($GetRows);
    }
}
new Forms_model();
exit;

?>