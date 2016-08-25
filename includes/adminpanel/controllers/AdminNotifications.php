<?php

class ADMIN_NOTIFOCATIONS extends ADMIN_CONFIGURATION{
	
	private $countAllNotifiactions;
		
	public function __construct($countNotifications)
	{
		//echo $countNotifications;
		if ($countNotifications=='C') $this->UnSeenNotifications();
		else $this->AllNotifications($countNotifications);
	}
	
	private function UnSeenNotifications()
	{
		$this->countAllNotifiactions = count(parent::select('admin_notifications','`notificationID`',"`Seen`='0'",''));
	}
	
	
	private function AllNotifications($start)
	{
		$start = (int) $start;
		//echo $start;
		$getLast5Notifications = parent::select('admin_notifications','*','','`timestamp` DESC LIMIT '.$start.',5');
		if (count($getLast5Notifications)>0)
		{
			$this->UnSeenNotifications();
			$this->countAllNotifiactions = '<li><p class="yellow">'.$this->countAllNotifiactions.'</p></li>';
			for($k=0;$k<count($getLast5Notifications);$k++)
			{
				if (!empty($getLast5Notifications[$k]['Link'])) $Link = $getLast5Notifications[$k]['Link'];
				else $Link = '#';
				$text = new ADMIN_TRANSLATION(LANG,$getLast5Notifications[$k]['notificationTitleLang'],1,0);
				$diferenceTime = (int) parent::$CONFIG['timeSeconds'] - (int) $getLast5Notifications[$k]['timeSeconds'];
				$this->countAllNotifiactions.='<li>
                                <a href="#Modal" data-tager="Modal" onclick=Modal("'.$Link.'")>
                                    <span class="label label-danger"><i class="fa fa-'.$getLast5Notifications['Icon'].'"></i></span>
                                    '.$text.'
                                    <span class="small italic">'.$diferenceTime.'</span>
                                </a>
                            </li>';
			}
			$this->countAllNotifiactions = '<li>
                                <a href="#Modal" data-target="Modal" onclick=Modal("ShowNotifications")>'. new ADMIN_TRANSLATION(LANG,'allnotifications',1,0).'</a>
                            </li>';
		}
		else $this->countAllNotifiactions = '<li><a href="#">'.new ADMIN_TRANSLATION(LANG,'NoNotifications',1,0).'</a></li>';
	}
	
	public function __toString()
	{
		
		settype($this->countAllNotifiactions,'string');
		if(is_null($this->countAllNotifiactions)) {
    	    return 'NULL';
   		}
    	return $this->countAllNotifiactions;
	}
}


?>