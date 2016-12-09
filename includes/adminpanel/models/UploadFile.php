<?php

if (!empty($_FILES['file']))
{

    $file = $_FILES['file']['tmp_name'];
    $filename = $_FILES['file']['name'];
    if(!empty($file)) {

        ini_set('memory_limit', '32M');
        $maxsize = "100000000";
        $size = filesize($_FILES['file']['tmp_name']);
        $extension = explode('.',$filename);
        $type = $extension[count($extension)-1];
        $new = time().'.'.$type;
        $to = dirname(__FILE__).'/../../../'.$_POST['path'].$new;
        if ($size<=$maxsize) {
            copy($file, $to);
            $translate = (string) new ADMIN_TRANSLATION(LANG,'uploaded',1,0);
            $fileUploaded['path'] = $_POST['path'];
            $fileUploaded['file'] = $new;
            $fileUploaded['res'] = $translate;
            echo json_encode($fileUploaded);
        }
        else {
          $fileUploaded['error'] = 'Too big';
            echo json_encode($fileUploaded);
        }
    }
    exit;
}
?>