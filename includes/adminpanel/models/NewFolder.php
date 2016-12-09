<?php
$Value = htmlspecialchars($_POST['values'],ENT_QUOTES);
$Path = htmlspecialchars($_POST['path'],ENT_QUOTES);

mkdir(dirname(__FILE__).'/../../../'.$Path.'/'.$Value, 0700);
//echo 'Created';
exit;
?>