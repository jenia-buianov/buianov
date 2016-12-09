<?php

class InfoFileManager_Model extends ADMIN_CONFIGURATION{
	
	private $PATH;
    public static $Icons = array();
    public static $fileInfo = array();

    public function __construct($path)
	{
		$this->PATH = $path;
	}



    public function InfoFile($path,$file)
    {
        $getInfoFromDB = DATABASE::select("filemanager","*","`path`='".$path."' AND `file`='".$file."' AND `isEnabled`='1'",'');

        if (is_file(dirname(__FILE__)."/../../../".$path.'/'.$file))
        {
            $getExtenstion = explode('.',$file);
            if (in_array($getExtenstion[count($getExtenstion)-1],FileManager::$extensions))
                self::$Icons[0] = FileManager::$icons[array_search($getExtenstion[count($getExtenstion)-1],FileManager::$extensions)];
            else self::$Icons[0] = 'file-o';

        }
        else
        {
            self::$Icons[0] = 'folder';
        }
        $userInfo = new USER($getInfoFromDB[0]['userID']);

        self::$fileInfo[0] = array($file,substr($getInfoFromDB[0]['timestamp'],0,10),substr($getInfoFromDB[0]['timestamp'],10),$userInfo->USERLATNAME);
        self::$fileInfo[0][7] = FileManager::formatSizeUnits($getInfoFromDB[0]['size']);
        if ($file!=='..' and $file!=='.') {
            if ($path !== '.') self::$fileInfo[0][8] = ADMIN_CONFIGURATION::$CONFIG['homeURL'] . $path . '/' . $file;
            else self::$fileInfo[0][8] = ADMIN_CONFIGURATION::$CONFIG['homeURL'] .$file;
        }
        if (is_file(dirname(__FILE__)."/../../../".$path.'/'.$file))
        {
            self::$fileInfo[0][4] = new ADMIN_TRANSLATION(LANG,'download',1,0);
            self::$fileInfo[0][5] = ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/filemanager/?download='.$getInfoFromDB[0]['fileID'];
            if ($path!=='.') self::$fileInfo[0][6] = ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/filemanager/?open='.urlencode($path.'/'.$file).'&path='.urlencode($path);
            else self::$fileInfo[0][6] = ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/filemanager/?open='.urlencode($file);
        }

    }
	
}

$path = urldecode($_GET['path']);
if (isset($_GET['file'])) $file = urldecode($_GET['file']);

$fm = new InfoFileManager_Model($path);
$fm->InfoFile($path,$file);

?>