<?php

if (!empty($_POST))
{
    $fileInfo = DATABASE::select('filemanager','`path`,`file`',"`fileID`='$_POST[fileID]'",'');
    if (count($fileInfo)>0)
    {
        $value = htmlspecialchars($_POST['value'],ENT_QUOTES);
        if ($fileInfo[0]['path']=='.') $fileInfo[0]['path']='';
        rename(dirname(__FILE__).'/../../../'.$fileInfo[0]['path'].'/'.$fileInfo[0]['file'],dirname(__FILE__).'/../../../'.$fileInfo[0]['path'].'/'.$value);
        $update = DATABASE::update('filemanager',"`file`='$value'","`fileID`='$_POST[fileID]'");

    }
    else echo 'File not found';
    exit;
}


?>