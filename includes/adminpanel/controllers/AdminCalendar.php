<?php

class ADMIN_CALENDAR extends ADMIN_CONFIGURATION{
	
	private $countAllCallendar;
		
	public function __construct($countAllCallendar)
	{
		if ($countAllCallendar=='C') $this->CountNewCelebrations();
		else $this->AllDates($countAllCallendar);
		
	}
	private function CountNewCelebrations()
	{
		$this->countAllCallendar = count(parent::select('admin_calendar','`calendarID`',"`timeHappendSeconds`>='".CONFIGURATION::$CONFIG['timeSeconds']."' AND `isEnabled`='1'",''));
	}
	
	
	private function AllDates($start)
	{
		$start = (int) $start;
		//echo $start;
		$getLast5Celebrations = parent::select('admin_calendar','*','`timeHappendSeconds`>="'.CONFIGURATION::$CONFIG['timeSeconds'].'" AND `isEnabled`="1"','`timeHappened` DESC LIMIT '.$start.',5');
		if (count($getLast5Celebrations)>0)
		{
			$this->CountNewCelebrations();
			$this->countAllCallendar = '<li><p class="green">'.$this->countAllCallendar.'</p></li>';
			for($k=0;$k<count($getLast5Celebrations);$k++)
			{
				
				$text = new ADMIN_TRANSLATION(LANG,$getLast5Celebrations[$k]['caledarName'],1,0);
				$diferenceTime = (int) parent::$CONFIG['timeSeconds'] - (int) $getLast5Celebrations[$k]['timeSeconds'];
				$this->countAllCallendar.='<li>
                                <a href="#Modal" data-tager="Modal" onclick=Modal("")>                                   
                                    '.$text.'
                                    <span class="small italic">'.$getLast5Celebrations['timeHappened'].'</span>
                                </a>
                            </li>';
			}
			$this->countAllCallendar = '<li>
                                <a href="#Modal" data-target="Modal" onclick=Modal("ShowCalendar")>'. new ADMIN_TRANSLATION(LANG,'allcalendar',1,0).'</a>
                            </li>';
		}
		else $this->countAllCallendar = '<li><a href="#">'.new ADMIN_TRANSLATION(LANG,'NoCalendar',1,0).'</a></li>';
	}
	
	public function __toString()
	{
		
		settype($this->countAllCallendar,'string');
		if(is_null($this->countAllCallendar)) {
    	    return 'NULL';
   		}
    	return $this->countAllCallendar;
	}
}


?>