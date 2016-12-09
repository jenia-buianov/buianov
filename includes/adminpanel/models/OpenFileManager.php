<?php
if (isset($_GET['open'])) $open = urldecode($_GET['open']);

if (substr(php_uname(), 0, 7) == "Windows"){
    pclose(popen("start /B ".'notepad.exe "'.$open.'"', "r"));
}
else {
    exec('gedit '.$open.''. " > /dev/null &");
}
?>