<?php

class ADMIN_INBOX extends ADMIN_CONFIGURATION{
	
	private $countAllInbox;
		
	public function __construct($countInbox)
	{
		//echo $countNotifications;
		if ($countInbox=='C') $this->UnSeenInbox();
		else $this->AllInbox($countInbox);
	}
	
	private function UnSeenInbox()
	{
		$this->countAllInbox = count(parent::select('admin_inbox','`inboxID`',"`Seen`='0'",''));
	}
	
	
	private function AllInbox($start)
	{
		$start = (int) $start;
		//echo $start;
		$getLast5Inbox = parent::select('admin_inbox','*','','`timestamp` DESC LIMIT '.$start.',5');
		if (count($getLast5Inbox)>0)
		{
			$this->UnSeenInbox();
			$this->countAllInbox = '<li><p class="red">'.$this->countAllInbox.'</p></li>';
			for($k=0;$k<count($getLast5Inbox);$k++)
			{
				$Link = parent::$CONFIG['adminURL'].LANG.'/inbox/'.$getLast5Inbox[$k]['inboxID'];
				$text = new ADMIN_TRANSLATION(LANG,$getLast5Inboxs[$k]['subject'],1,0);
				$diferenceTime = (int) parent::$CONFIG['timeSeconds'] - (int) $getLast5Inbox[$k]['timeSeconds'];
				$this->countAllInbox.='<li>
                                <a href="'.$Link.'">
                                    <span class="subject">
                                    <span class="from">'.$getLast5Inbox[$k]['emailFrom'].'</span>
                                    <span class="time">'.$diferenceTime.'</span>
                                    </span>
                                    <span class="message">'.$text.'</span>
                                </a>
                            </li>';
			}
			$this->countAllInbox = '<li>
                                <a href="#'.$Link.'" data-target="Modal" onclick=Modal("ShowInbox")>'. new ADMIN_TRANSLATION(LANG,'allinbox',1,0).'</a>
                            </li>';
		}
		else $this->countAllInbox = '<li><a href="#">'.new ADMIN_TRANSLATION(LANG,'NoInbox',1,0).'</a></li>';
	}
	
	public function __toString()
	{
		
		settype($this->countAllInbox,'string');
		if(is_null($this->countAllInbox)) {
    	    return 'NULL';
   		}
    	return $this->countAllInbox;
	}
}


?>