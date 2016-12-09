<?php

class FileManager extends ADMIN_CONFIGURATION{
	
	private $PATH;
    private static $Editextensions = array('html','php','txt','css','js','sql');
    public static $extensions = array('xls','xlsx','php','html','jpg','png','jpeg','bmp','tif','psd','docx','mp3','flac','mp4','wav','mpeg','mov','wmv','avi','mkv','flv','mpg','3gp', 'wma','txt','css','js','zip','rar','gz');
    public static $icons = array('file-excel-o','file-excel-o','code','code','file-image-o','file-image-o','file-image-o','file-image-o','file-image-o','file-image-o','file-word-o','file-audio-o','file-audio-o','file-video-o','file-video-o','file-video-o','file-video-o','file-video-o','file-video-o','file-video-o','file-video-o','file-video-o','file-video-o','file-audio-o','file-text','code','code','file-archive-o','file-archive-o','file-archive-o');
    public static $Icons;
    public static $files;
    public static $fileInfo = array();

    public function __construct($path)
	{
		$this->PATH = $path;
	}

    public static function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' kB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

	public function OpenFolder($path)
    {
        if ($path!=='.') $dir = opendir(dirname(__FILE__)."/../../../".$path);
        else $dir = opendir(dirname(__FILE__)."/../../../");

        $files_ = array();
        while($name = readdir($dir))  $files_[] = $name;
        sort($files_);

        foreach($files_ as $key=>$name)
        {
            $getInfoFromDB = DATABASE::select("filemanager","`size`,`timestamp`,`path`","`path`='".$path."' AND `file`='".$name."' AND `isEnabled`='1'",'');
            if (count($getInfoFromDB)>0) $infoFile = $getInfoFromDB[0];
            elseif(!empty($name) and mb_strlen($name,"UTF-8")>0 and filesize(dirname(__FILE__)."/../../../".$path.'/'.$name)!==14051) {
                $insertIntoDB = DATABASE::insert('filemanager','`file`,`path`,`timeseconds`,`userID`,`isEnabled`,`size`',"'".$name."','".$path."','".parent::$CONFIG['timeseconds']."','1','1','".filesize(dirname(__FILE__)."/../../../".$path.'/'.$name)."'",1);
                $infoFile['fileID'] = $insertIntoDB;
            }

            if (isset($infoFile)) $userInfo = new USER($infoFile['userID']);
            else $userInfo = new USER($_SESSION['userID']);

            self::$fileInfo[] = ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/filemanager/?modal=0&path='.urlencode($path).'&file='.urlencode($name);

            if (is_file(dirname(__FILE__)."/../../../".$path.'/'.$name))
            {
                $getExtenstion = explode('.',$name);
                if (in_array($getExtenstion[count($getExtenstion)-1],self::$extensions)) self::$Icons[] = self::$icons[array_search($getExtenstion[count($getExtenstion)-1],self::$extensions)];
                else self::$Icons[] = 'file-o';
                if (in_array($getExtenstion[count($getExtenstion)-1],self::$Editextensions)){
                    if ($path!=='.') $ph = ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/filemanager/?open='.urlencode($path.'/'.$name).'&path='.urlencode($path);
                    else $ph = ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/filemanager/?open='.urlencode($name);
                }
                else $ph = 'javascript:';

            }
            else {
                if ($path!=='.') $ph = ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/filemanager/?path='.urlencode($path.'/'.$name);
                else $ph = ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/filemanager/?path='.urlencode($name);
                self::$Icons[] = 'folder';
            }
            if ($name=='.') $ph = '';
            if ($name=='..'&&$path=='.')
            {
                $ph = '';
            }
            elseif($name=='..'&$path!=='.'){
                $explodePath = explode('/',$path);
                $ph='';
                for($k=0;$k<count($explodePath)-1;$k++)
                {
                    if($k>0)$ph.='/'.$explodePath[$k];
                    else $ph.=$explodePath[$k];
                }
                $ph = ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/filemanager/?path='.urlencode($ph);
            }

            //if ($name=='.') $name = new ADMIN_TRANSLATION(LANG,'FileManagerRoot',1,0);
            //if ($name=='..') $name = new ADMIN_TRANSLATION(LANG,'FileManagerUP',1,0);
            $infoFile['size'] = self::formatSizeUnits($infoFile['size']);
            self::$files [] = array($name,$userInfo->USERNAME.' '.$userInfo->USERLATNAME,$infoFile['size'],$infoFile['timestamp'], $ph);
        }

    }

}

if (!isset($_GET['path']) or empty(trim($_GET['path']))) $path = '.'; else  $path = urldecode($_GET['path']);
if (isset($_GET['file'])) $file = urldecode($_GET['file']);
if (isset($_GET['open'])) $open = urldecode($_GET['open']);

if (!isset($_GET['file'])&&!isset($_GET['open'])&&!isset($_GET['action'])&&!isset($_GET['download'])) {
    $fm = new FileManager($path);
    $fm->OpenFolder($path);

}
elseif(isset($_GET['file'])&&isset($path)&&!isset($_GET['action'])&&!isset($_GET['download'])) {

    Template::setModel(dirname(__FILE__).'/../models/InfoFileManager.php');
    Template::setView(dirname(__FILE__).'/../views/InfoFileManager.html');
}
elseif(isset($_GET['open'])&&!isset($_GET['action'])&&!isset($_GET['download']))
{
    Template::setModel(dirname(__FILE__).'/../models/OpenFileManager.php');
    $fm = new FileManager($path);
    $fm->OpenFolder($path);
}
elseif(isset($_GET['action'])&&$_GET['action']=='newfolder'&&!isset($_GET['download']))
{
    Template::setModel(dirname(__FILE__).'/../models/NewFolder.php');
}
elseif(isset($_GET['action'])&&$_GET['action']=='uploadfile'&&!isset($_GET['download']))
{
    Template::setModel(dirname(__FILE__).'/../models/UploadFile.php');
    Template::setView(dirname(__FILE__).'/../views/UploadFile.html');
}
elseif(isset($_GET['action'])&&$_GET['action']=='rename'&&!isset($_GET['download']))
{
    Template::setModel(dirname(__FILE__).'/../models/Rename.php');
}
elseif(isset($_GET['download']))
{
    Template::setModel(dirname(__FILE__).'/../models/Download.php');
}
?>