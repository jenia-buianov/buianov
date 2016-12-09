<?php
class Template{

    public static $Template;
    public static $Directory;
    public static $Controller = NULL;
    public static $View = NULL;
    public static $Model = NULL;
    private static $count=0;
    public static $Arrays = array();

    public function __construct($filename)
    {
        self::$Directory = $filename;
        if (self::$count==0) $this->setController($filename);
        if (self::$count==1) self::setModel($filename);
        if (self::$count==2) self::setView($filename);
        if (self::$count==3) $this->setTemplate($filename);
        self::$count++;
    }

    private function setController($filename)
    {
        self::$Controller = $filename;
        if (file_exists(self::$Controller)) include(self::$Controller);
    }
    private function setTemplate($filename)
    {
        self::$Template = $filename;
        include(self::$Template);
    }

    public static function setView($filename)
    {
       if (file_exists($filename) and self::$View==NULL)  self::$View = $filename;
    }

    public static function setModel($filename)
    {
        if (file_exists($filename) and self::$Model==NULL) {
            self::$Model = $filename;
            include(self::$Model);
        }
    }
    public static function setVariables($Class,$Array)
    {
        self::$Arrays[] = $Class::$$Array;
    }

}

?>