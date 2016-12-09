<?php

$fileID =  urldecode($_GET['download']);
$getFile = DATABASE::select('filemanager','`path`,`file`',"`fileID`='$fileID'",'');
if (count($getFile)>0)
{
    $file_url = ADMIN_CONFIGURATION::$CONFIG['homeURL'].$getFile[0]['path'].'/'.$getFile[0]['file'];
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");
    readfile($file_url);
    exit;
}else exit('Not found');


?>