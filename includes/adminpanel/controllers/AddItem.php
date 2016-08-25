<?php

class AddItem extends ADMIN_CONFIGURATION{
	
	private $Text;
		
	public function __construct()
	{
		if(!empty($_POST['values'])) $this->Post();
		else $this->ShowForm();		
	}
	
	private function ShowForm()
	{
		echo '<form action="'.parent::$CONFIG['adminURL'].LANG.'/'.MODULE.'" class="form-horizontal"  method="post" id="AddItemForm" onsubmit="return SendForm('."'AddItemForm'".',1,1)">';
		$languagesList = DATABASE::select('admin_languages','`languageID`,`languageShort`,`languageFull`',"`isEnabled`='1'",'');
		if(count($languagesList)>0)
		{
			for($k=0;$k<count($languagesList);$k++)
			{
				echo '<div class="form-group">              <label class="col-lg-3 control-label">'.new ADMIN_TRANSLATION(LANG,'TitleOnLang',1,0).$languagesList[$k]['languageFull'].'</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="menuTitleLang'.$k.'" placeholder="'.new ADMIN_TRANSLATION(LANG,'TitleOnLang',1,0).$languagesList[$k]['languageFull'].'">
                                                  </div>
                                              </div>';
			}
		}
		
		$parentPages = DATABASE::select('admin_menu','`menuTitleLang`,`menuID`',"`isEnabled`='1'  AND `Modal`='0'",'');
		if(count($parentPages)>0)
		{
			echo '<div class="form-group">              <label class="col-lg-3 control-label">'.new ADMIN_TRANSLATION(LANG,'SelectParent',1,0).'</label>
                                                  <div class="col-lg-9">
                                                    <select id="Parent" class="form-control"><option value="-1">'.new ADMIN_TRANSLATION(LANG,'No',1,0).'</option>';
													for($k=0;$k<count($parentPages);$k++)
													echo '<option value="'.$parentPages[$k]['menuID'].'">'.new ADMIN_TRANSLATION(LANG,$parentPages[$k]['menuTitleLang'],1,0).'</option>';
													echo'</select>  
                                                  </div>
                                              </div>';
		}else {echo '<input type="hidden" value="-1" id="Parent" placeholder="'.new ADMIN_TRANSLATION(LANG,'Icon',1,0).'">';}
		echo'<div class="form-group">              <label class="col-lg-3 control-label">'.new ADMIN_TRANSLATION(LANG,'Link',1,0).'</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="Link" placeholder="'.new ADMIN_TRANSLATION(LANG,'Link',1,0).'">
                                                  </div>
                                              </div>';
		$Icons = DATABASE::select('bootstrap_icons','`class`',"",'');
		if(count($Icons)>0)
		{
			echo '<div class="form-group">              <label class="col-lg-3 control-label">'.new ADMIN_TRANSLATION(LANG,'Icon',1,0).'</label>
                                                  <div class="col-lg-9">
                                                    <select id="Icon" class="form-control" placeholder="'.new ADMIN_TRANSLATION(LANG,'Icon',1,0).'">';
													for($k=0;$k<count($Icons);$k++)
													echo '<option value="'.trim($Icons[$k]['class']).'">'.$Icons[$k]['class'].'</option>';
													echo'</select>  
                                                  </div>
                                              </div>';
		}
		echo'<div class="form-group">              <label class="col-lg-3 control-label">'.new ADMIN_TRANSLATION(LANG,'Modal',1,0).'</label>
                                                  <div class="col-lg-9">
                                                      <input type="checkbox" id="Modal"> '.new ADMIN_TRANSLATION(LANG,'Modal',1,0).'
                                                  </div>
                                              </div>';
		echo'<input type="hidden" id="idFormInput" value="menuTitleLang(,Parent,Link,Modal,Icon">
		<input type="hidden" id="FormTitle" value="'.new ADMIN_TRANSLATION(LANG,ADMIN_CONFIGURATION::$PAGE['moduleNameLang'],1,0).'">
		<input type="hidden" id="FormResultStatus" value="'.new ADMIN_TRANSLATION(LANG,'FormError',1,0).','.new ADMIN_TRANSLATION(LANG,'FormEmpty',1,0).','.new ADMIN_TRANSLATION(LANG,'FormSuccessAdded',1,0).'">
		<div style="text-align:center"><button type="submit" class="btn btn-send">'.new ADMIN_TRANSLATION(LANG,'Add',1,0).'</button></div>
		</form>';
	}
	private function Post()
	{
		$queryWhat='';
		$queryValues='';
		for($k=0;$k<count($_POST['values']);$k++)
		{
			$variable = htmlspecialchars($_POST['values'][$k][0],ENT_QUOTES);
			$value = htmlspecialchars($_POST['values'][$k][1],ENT_QUOTES);
			if ($value=='/') $value='';
			if($variable=='menuTitleLang')
			{
				
				$vl = $variable.ADMIN_CONFIGURATION::$CONFIG['timeSeconds'];
				$expl = explode(',',$value);
				$languagesList = DATABASE::select('admin_languages','`languageID`',"`isEnabled`='1'",'');
				if(count($languagesList)>0)
				{
					for($l=0;$l<count($languagesList);$l++)
					{
						
						$insert1 = DATABASE::insert('admin_translation','`translationTitleLang`,`LanguageID`,`text`,`timeSeconds`,`isEnabled`',"'{$vl}','".$languagesList[$l]['languageID']."','".$expl[$l]."','".CONFIGURATION::$CONFIG['timeSeconds']."','1'",0);
						if (is_bool($insert1)&&$insert1==true) echo''; else echo $insert1;
						
					}
				}
				$value = $vl;
				
			}
			if($variable=='Modal')
			{
				if($value=='true')$value = 1; else $value=0;
			}
			if($variable=='Parent')
			{
				if($value==-1)$value = 0;
			}
			if($k>0) $queryWhat.=',`'.$variable.'`';
			else $queryWhat = $variable;
			
			if($k>0) $queryValues.=",'".$value."'";
			else $queryValues = "'".$value."'";
			
		}
		$insert = DATABASE::insert('admin_menu',$queryWhat.',`isEnabled`',$queryValues.",'1'",0);
		if (is_bool($insert)&&$insert==true) echo '0'; else echo $insert;
	}
	
	
}

new AddItem();
?>