<?php

class FileManager extends ADMIN_CONFIGURATION{
	
	private $PATH;
    private $extensions = array('xls','xlsx','php','html','jpg','png','jpeg','bmp','tif','psd','docx','mp3','flac','mp4','wav','mpeg','mov','wmv','avi','mkv','flv','mpg','3gp', 'wma','txt','css','js','zip','rar','gz');
    private $icons = array('file-excel-o','file-excel-o','code','code','file-image-o','file-image-o','file-image-o','file-image-o','file-image-o','file-image-o','file-word-o','file-audio-o','file-audio-o','file-video-o','file-video-o','file-video-o','file-video-o','file-video-o','file-video-o','file-video-o','file-video-o','file-video-o','file-video-o','file-audio-o','file-text','code','code','file-archive-o','file-archive-o','file-archive-o');
    public static $Icons;
    public static $files;
    public static $fileInfo = array();

    public function __construct($path)
	{
		$this->PATH = $path;
	}



	public function OpenFolder($path)
    {
        if ($path!=='.') $dir = opendir(dirname(__FILE__)."/../../../".$path);
        else $dir = opendir(dirname(__FILE__)."/../../../");
        while($name = readdir($dir))
        {
            $getInfoFromDB = DATABASE::select("filemanager","`size`,`timestamp`","`path`='".$path."' AND `file`='".$name."' AND `isEnabled`='1'",'');
            if (count($getInfoFromDB)>0) $infoFile = $getInfoFromDB[0];
            else $insertIntoDB = DATABASE::insert('filemanager','`file`,`path`,`timeseconds`,`userID`,`isEnabled`,`size`',"'".$name."','".$path."','".ADMIN_CONFIGURATION::$CONFIG['timeseconds']."','1','1','".filesize(dirname(__FILE__)."/../../../".$path.'/'.$name)."'",'0');

            if (isset($infoFile)) $userInfo = new USER($infoFile['userID']);
            else $userInfo = new USER($_SESSION['userID']);


            if ($name=='.') $name = new ADMIN_TRANSLATION(LANG,'FileManagerRoot',1,0);
            if ($name=='..') $name = new ADMIN_TRANSLATION(LANG,'FileManagerUP',1,0);
            self::$fileInfo[] = ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/filemanager/?modal=1path='.urlencode($path).'&file='.urlencode($name);
           if (is_file(dirname(__FILE__)."/../../../".$path.'/'.$name))
            {
                $getExtenstion = explode('.',$name);
                if (in_array($getExtenstion[count($getExtenstion)-1],$this->extensions)) self::$Icons[] = $this->icons[array_search($getExtenstion[count($getExtenstion)-1],$this->extensions)];
                else self::$Icons[] = 'file-o';
            }
            else self::$Icons[] = 'folder';
            self::$files [] = array($name,$userInfo->USERNAME.' '.$userInfo->USERLATNAME,$infoFile['size'],$infoFile['timestamp']);
        }

    }
	
}

if (!isset($_GET['path']) or !empty(trim($_GET['path']))) $path = '.'; else  $path = urldecode($_GET['path']);
if (isset($_GET['file'])) $file = urldecode($_GET['file']);

if (!isset($_GET['file'])) {
    $fm = new FileManager($path);
    $fm->OpenFolder($path);

}
else {

    Template::setModel(dirname(__FILE__).'/../models/InfoFileManager.php');
    Template::setView(dirname(__FILE__).'/../views/InfoFileManager.html');
}
?>