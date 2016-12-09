<?php

if (!empty($_POST))
{
    $value = htmlspecialchars($_POST['value'],ENT_QUOTES);
    $module = htmlspecialchars($_POST['module'],ENT_QUOTES);

    $getModuleName = DATABASE::select('modules',"`moduleNameLang`","`moduleTitle`='".$module."'",'');
    if (count($getModuleName)>0)
    {
        $update = DATABASE::update('admin_translation',"`text`='".$value."'","`translationTitleLang`='".$getModuleName[0]['moduleNameLang']."' AND `LanguageID`='".LANG_ID."'");
        echo 'ok';
    }
    else echo 'Not Found';
}
exit;

?>