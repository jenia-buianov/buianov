<?php

if(!empty($_POST) or $_GET['modal']=='1')
{
    if(isset($_POST['modal'])  or $_GET['modal']=='1')
    {
        if (isset($_POST['modal']))
        {
            $modal = htmlspecialchars($_POST['modal'],ENT_QUOTES);
            settype($modal,'boolean');
        }
        else if ($_GET['modal']=='1') $modal = true;
        if($modal)
        {
            if(empty($_POST['values']) and empty($_POST['now']) and !isset($_GET['modal']))
                echo '<div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-top: 0.4em;">×</button>
										  <div class="btn-group" id="modalSettings" style="float:right;margin-right:0.5em;padding-top:2px">
										   <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
										  <ul role="menu" class="dropdown-menu">
											  <li><a href="'.ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/'.MODULE.'">'.new ADMIN_TRANSLATION(LANG,'OpenFull',1,0).'</a></li>
											  <li><a href="'.ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/'.MODULE.'/edit">'.new ADMIN_TRANSLATION(LANG,'Edit',1,0).'</a></li>
											  <li class="divider"></li>
											  <li><a href="'.ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/disactivate/modules/'.MODULE.'">'.new ADMIN_TRANSLATION(LANG,'Disactivate',1,0).'</a></li>
											  <li><a href="'.ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/menu/'.MODULE.'">'.new ADMIN_TRANSLATION(LANG,'DellFromMenu',1,0).'</a></li>
										  </ul>
									  </div>									  
                                          <h4 class="modal-title">'.new ADMIN_TRANSLATION(LANG,ADMIN_CONFIGURATION::$PAGE['moduleNameLang'],1,0).'</h4>
                                      </div><div class="modal-body">';
            if ($_GET['modal']=='1') echo '<style>
              .easy-autocomplete.eac-plate-dark ul, .easy-autocomplete.eac-plate-dark ul li{background: '.ADMIN_CONFIGURATION::$PAGE['backgroundColor'].';color: '.ADMIN_CONFIGURATION::$PAGE['textColor'].';}
              </style>'.'<section class="panel"><header class="panel-heading" class="panel-heading" style="background: '.ADMIN_CONFIGURATION::$PAGE['backgroundColor'].';color: '.ADMIN_CONFIGURATION::$PAGE['textColor'].';">'.new ADMIN_TRANSLATION(LANG,ADMIN_CONFIGURATION::$PAGE['moduleNameLang'],1,0).'</header>
			<div class="panel-body">';
            if (is_file(Template::$View))
                include (Template::$View);
            else echo'Cannot include file '.Template::$View.'. File wasn\'t found on server';

            if(empty($_POST['values']) and empty($_POST['now']) and !isset($_GET['modal']))echo'</div>';
            if ($_GET['modal']=='1') echo'
			</div>
			</section>';
            exit;
        }
    }
}
?>