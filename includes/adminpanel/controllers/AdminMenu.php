<?php

class ADMIN_MENU extends ADMIN_CONFIGURATION{
	
	private $MenuContext;
		
	public function __construct()
	{
		$this->ShowMenu();
		
	}
	private function ShowMenu()
	{
		$getParents = parent::select('admin_menu','*',"`isEnabled`='1' AND `Parent`='0'",'`Order`');
		if (count($getParents)>0)
		{
			$this->MenuContext='';
			
			for ($k=0;$k<count($getParents);$k++)
			{
				$parent = $getParents[$k]['menuID'];
				$getMenu = parent::select('admin_menu','*',"`isEnabled`='1' AND `Parent`='$parent'",'`Order`');
				if (count($getMenu)==0){ 
				if($getParents[$k]['Modal']==0)
				$this->MenuContext.=' <li>
                      <a href="'.ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/'.$getParents[$k]['Link'].'" data-toggle="link">
                          <i class="fa fa-'.$getParents[$k]['Icon'].'"></i>
                          <span>'.new ADMIN_TRANSLATION(LANG,$getParents[$k]['menuTitleLang'],1,0).'</span>
                      </a>
                  </li>';
				else $this->MenuContext.=' <li>
                      <a data-toggle="modal" href="#myModal" onclick="Modal('."'".$getParents[$k]['Link']."'".')">
                          <i class="fa fa-'.$getParents[$k]['Icon'].'"></i>
                          <span>'.new ADMIN_TRANSLATION(LANG,$getParents[$k]['menuTitleLang'],1,0).'</span>
                      </a>
                  </li>';
				}
				else
				{
					$this->MenuContext.='<li class="sub-menu">
                      <a href="#">
                          <i class="fa fa-'.$getParents[$k]['Icon'].'"></i>
                          <span>'.new ADMIN_TRANSLATION(LANG,$getParents[$k]['menuTitleLang'],1,0).'</span>
                      </a><ul class="sub">';
					for($i=0;$i<count($getMenu);$i++)
					$this->MenuContext.='<li><a  href="'.ADMIN_CONFIGURATION::$CONFIG['adminURL'].LANG.'/'.$getMenu[$i]['Link'].'" data-toggle="link">'.new ADMIN_TRANSLATION(LANG,$getMenu[$i]['menuTitleLang'],1,0).'</a></li>';
					$this->MenuContext.= '</ul></li>';
				}
			}
		}
		
	}
	
	
	
	public function __toString()
	{
		
		settype($this->MenuContext,'string');
		if(is_null($this->MenuContext)) {
    	    return 'NULL';
   		}
    	return $this->MenuContext;
	}
}


?>