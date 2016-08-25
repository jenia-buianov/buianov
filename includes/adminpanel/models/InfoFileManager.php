<?php

class InfoFileManager_Model extends ADMIN_CONFIGURATION{
	
	private $PATH;
    private $extensions = array('xls','xlsx','php','html','jpg','png','jpeg','bmp','tif','psd','docx','mp3','flac','mp4','wav','mpeg','mov','wmv','avi','mkv','flv','mpg','3gp', 'wma','txt','css','js','zip','rar','gz');
    private $icons = array('file-excel-o','file-excel-o','code','code','file-image-o','file-image-o','file-image-o','file-image-o','file-image-o','file-image-o','file-word-o','file-audio-o','file-audio-o','file-video-o','file-video-o','file-video-o','file-video-o','file-video-o','file-video-o','file-video-o','file-video-o','file-video-o','file-video-o','file-audio-o','file-text','code','code','file-archive-o','file-archive-o','file-archive-o');
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
            if (in_array($getExtenstion[count($getExtenstion)-1],$this->extensions))
                self::$Icons[] = $this->icons[array_search($getExtenstion[count($getExtenstion)-1],$this->extensions)];
            else self::$Icons[] = 'file-o';
        }
        else
        {
            self::$Icons[] = 'folder';
        }
        $userInfo = new USER($getInfoFromDB[0]['userID']);
        self::$fileInfo[] = array($file,substr($getInfoFromDB[0]['timestamp'],0,10),substr($getInfoFromDB[0]['timestamp'],10),$userInfo->USERLATNAME);

        if (is_file(dirname(__FILE__)."/../../../".$path.'/'.$file))
        {
            self::$fileInfo[][4] = new ADMIN_TRANSLATION(LANG,'download',1,0);
        }

    }
	
}

if (!isset($_GET['path']) or !empty(trim($_GET['path']))) $path = '.'; else  $path = urldecode($_GET['path']);
if (isset($_GET['file'])) $file = urldecode($_GET['file']);

$fm = new FileManager($path);
$fm->InfoFile($path,$file);

?>