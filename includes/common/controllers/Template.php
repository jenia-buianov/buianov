<?php
class Template{

    public static $Template;
    public static $Directory;
    public static $Controller = NULL;
    public static $View = NULL;
    public static $Model = NULL;
    private static $count=0;

    public function __construct($filename)
    {
        self::$Directory = $filename;
        if (self::$count==0) $this->setController();
        if (self::$count==1) self::setModel();
        if (self::$count==2) self::setView();
        if (self::$count==3) $this->setTemplate();
        self::$count++;
    }

    private function setController()
    {
        self::$Controller = self::$Directory;
        if (file_exists(self::$Controller)) include_once(self::$Controller);
    }
    private function setTemplate()
    {
        self::$Template = self::$Directory;
        include_once(self::$Template);
    }

    public static function setView()
    {
       if (file_exists(self::$Directory) and self::$View==NULL)  self::$View = self::$Directory;

    }

    public static function setModel()
    {
        if (file_exists(self::$Directory) and self::$Model==NULL) {
            self::$Model = self::$Directory;
            include_once(self::$Model);
        }
    }

}

?>