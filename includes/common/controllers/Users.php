<?php

class USER extends DATABASE{
	
	public $GROUP;
	public $USERNAME;
	public $USERLATNAME;
	public $USERID;
	public $PASSWORD;
	public $LOGIN;
	public $EMAIL;
	public $ACCESS_ADMIN_PANEL;
		
	public function __construct()
	{
		$this->getUserDates();
	}
	
	private function getUserDates()
	{
		$user = DATABASE::select('users','*',"`userID`='".$_SESSION['userID']."' AND `isEnabled`='1'",'');

        if (count($user)==1)
		{

			$this->GROUP = $user[0]['userGroup'];
            $this->EMAIL = $user[0]['email'];
            $this->USERNAME = $user[0]['userName'];
            $this->USERLATNAME = $user[0]['userLastName'];
            $this->USERID = $user[0]['userID'];
            $this->PASSWORD = $user[0]['password'];
            $this->LOGIN = $user[0]['userLogin'];
            $this->ACCESS_ADMIN_PANEL = $user[0]['accessAdminPanel'];
		} else print_r($user);
	}
}


?>