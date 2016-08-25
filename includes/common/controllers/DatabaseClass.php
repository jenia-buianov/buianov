<?php

class DATABASE {
	static public $CONNECTION;
	
	
	public function __construct()
	{
		$this->FirstConnectToDB();
        $this->connect();
	}
	
	private function FirstConnectToDB()
	{
		self::$CONNECTION = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		if (!self::$CONNECTION) exit(mysqli_connect_error($this->CONNECTION));
		mysqli_query(self::$CONNECTION,"SET CHARACTER SET UTF8");
		mysqli_query(self::$CONNECTION,"SET NAMES SET UTF8");
	}
	
	private function connect()
	{
		return self::$CONNECTION;
	}
	
	public static function select($Table, $WHAT, $WHERE, $ORDER)
	{
		if (empty($WHAT) or empty($Table)) return 'Empty dates. Was not send request';
		$SelectQuery = "SELECT {$WHAT} FROM `".DB_PREFIX."{$Table}`";
		if (!empty($WHERE)) $SelectQuery.=" WHERE {$WHERE}";
		if (!empty($ORDER)) $SelectQuery.=" ORDER BY {$ORDER}";
		if (DEBUG) echo $SelectQuery.'<BR>';
		
	
		$Select = mysqli_query(self::$CONNECTION,$SelectQuery);
		if (mysqli_num_rows($Select)>0)
		{
			$result = mysqli_fetch_assoc($Select);
			$Result = array();
			do
			{
				array_push($Result,$result);
			}
			while($result = mysqli_fetch_assoc($Select));
			return $Result;
		}else if (!empty(mysqli_error(self::$CONNECTION))) return mysqli_error(self::$CONNECTION);
			  else return NULL;
	}
	
	public static function insert($Table, $WHAT, $VALUES, $RETURN)
	{
		
		$InsertSQL = '';
		if (empty($WHAT) or empty($VALUES) or empty($Table)) return 'Empty dates. Was not send request';
		
		if (!is_array($WHAT))
		{
			$InsertSQL = "INSERT INTO `".DB_PREFIX."{$Table}`({$WHAT})VALUES({$VALUES})";
			if (DEBUG) echo $InsertSQL.'<BR>';
			
			$Insert = mysqli_query(self::$CONNECTION,$InsertSQL);
			if ($RETURN==0)
			{
				if ($Insert) return true; else return mysqli_error(self::$CONNECTION);
			}else
			{
				if ($Insert) return (int) mysqli_insert_id(self::$CONNECTION); else return mysqli_error(self::$CONNECTION);
			}
		}
		else
		{
			if ($RETURN==0){
				
				for($k=0;$k<count($WHAT);$k++)
				{
					if (empty($WHAT[$k]) or empty ($VALUES[$k])) return 'Empty dates in array on element '.$k.'. Was not send request';
					$InsertSQL.="INSERT INTO `".DB_PREFIX."{$Table}`(".$WHAT[$k].")VALUES(".$VALUES[$k].");\n";
				}
				if (DEBUG) echo $InsertSQL.'<BR>';
				
				$Insert = mysqli_query(self::$CONNECTION,$InsertSQL);
				if ($Insert) return true; else return mysqli_error(self::$CONNECTION);
			}
			else
			{
				
				$RETURN_ID = array();
				for($k=0;$k<count($WHAT);$k++)
				{
					if (empty($WHAT[$k]) or empty ($VALUES[$k])) return 'Empty dates in array on element '.$k.'. Was not send this request and others after it. Inserted ID: '.print_r($RETURN_ID);
					$InsertSQL="INSERT INTO `".DB_PREFIX."{$Table}`(".$WHAT[$k].")VALUES(".$VALUES[$k].");\n";
					if (DEBUG) echo $InsertSQL.'<BR>';
					$Insert = mysqli_query(self::$CONNECTION,$InsertSQL);
					if ($Insert) array_push($RETURN_ID,mysqli_insert_id(self::$CONNECTION)); else array_push($RETURN_ID,'Element '.$k.' error: '.mysqli_error(self::$CONNECTION));
				}
				return $RETURN_ID;
			}
		}
		
	}
	
	public static function update($Table, $WHAT_VALUES, $WHERE)
	{
		$UpdateSQL = '';
		if (empty($WHAT_VALUES) or empty($WHERE) or empty($Table)) return 'Empty dates. Was not send request';
		
		if (!is_array($WHAT_VALUES)) $UpdateSQL = "UPDATE `".DB_PREFIX.$Table."` SET {$WHAT_VALUES} WHERE {$WHERE}";
		else for($k=0;$k<count($WHAT_VALUES);$k++)
			{
				if (empty($WHAT[$k]) or empty ($VALUES[$k])) return 'Empty dates in array on element '.$k.'. Was not send request';
				$UpdateSQL.="UPDATE `".DB_PREFIX."` SET ".$WHAT_VALUES[$k]." WHERE ".$WHERE[$k];
			}
		if (DEBUG) echo $UpdateSQL.'<BR>';
		$Update = mysqli_query(self::$CONNECTION,$UpdateSQL);
		if ($Update) return true; else return mysqli_error(self::$CONNECTION);
	}
	
	public static function query($QUERY)
	{
		if (empty($QUERY)) return 'Empty dates. Was not send request';
		if (DEBUG) echo $QUERY.'<BR>';
		$mysql = mysqli_query(self::$CONNECTION,$QUERY);
		return $mysql;
	}
	
}

?>