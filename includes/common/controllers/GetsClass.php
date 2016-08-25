<?php
class GETS extends CONFIGURATION{
	private static $TEXT;
	
	public function __construct($text)
	{
		
		self::$TEXT = $text;
		$this->URL();
		
	}
	public function __toString()
    {
        return self::$TEXT;
    }
	
	public static function getForm($ID)
	{
		$getForm = parent::select('forms','`formContent`',"`formID`='{$ID}' AND `isEnabled`='1'");
		if (count($getForm)==1) return self::getFunction(htmlspecialchars_decode('<div id="form_'.(int) $ID.'" style="font-size:0.8em">'.$getForm['Content'].'</div>'));
	}
	
	public static function getIncludes($text)
	{
		$explodeText = explode('{include [',$text);
		if (count($explodeText)>1)
		{
			$newText = $explodeText[0];
			echo $newText;
			for($k=1;$k<count($explodeText);$k++)
			{
				$getLink = explode(']',$explodeText[$k]);
				$LINK = $getLink[0];
				include_once dirname(__FILE__).'/../'.$LINK;
				
				$closeInclude = explode('}',$explodeText[$k]);
				echo $closeInclude[1];
			}
			
		}
		else echo $text;

	}
	
	public static function ViewBlock($ID)
	{
		$ID = htmlspecialchars($ID,ENT_QUOTES);
		$getBlock = parent::select('blocks','`blockContent`',"`formID`='{$ID}' AND `isEnabled`='1'");
		if (count($getBlock)>0){
			 self::$TEXT=htmlspecialchars_decode(urldecode($getBlock['blockContent']));
			 return self::getIncludes(self::getFunction($this->URL()));
		}
	}
	
	public static function getFunction ()
	{
	
		$explodeText = explode('$_',self::$TEXT);
		if (count($explodeText)>0)
		{
			$newText = '';
			for($k=0;$k<count($explodeText);$k++)
			{
				if($k%2==0)
				{
					$newText.=$explodeText[$k];
				}
				else {
					$getFunction = explode('(',$explodeText[$k]);
					$newText.=$this->$getFunction[0](mb_substr($getFunction[1],0,mb_strlen($getFunction[1],"UTF-8"),"UTF-8"));
				}
			}		
			self::$TEXT = $newText;
			return $newText;
		}
		
	}
	
	
	
	
	private function URL()
	{
		$ex = explode('<img',self::$TEXT);
		if (count($ex)>1)
		{
			$newText = $ex[0];
			for($k=1;$k<count($ex);$k++)
			{
				$getSRC = explode('src=',$ex[$k]);
				if(mb_substr($getSRC[1],1,4,"UTF-8")!=='http') $newText.='<img'.$getSRC[0].'src='.mb_substr($getSRC[1],0,1,"UTF-8").parent::$CONFIG['homeURL'].mb_substr($getSRC[1],1,mb_strlen($getSRC[1],"UTF-8")-1,"UTF-8");
				else $newText.='<img'.$ex[$k];
			}
			
			self::$TEXT=$newText;
		}
		$ex = explode('<a',self::$TEXT);
		if (count($ex)>1)
		{
			$newText = $ex[0];
			for($k=1;$k<count($ex);$k++)
			{
				$getSRC = explode('href=',$ex[$k]);
				$mb = mb_substr($getSRC[1],1,4,"UTF-8");
				
				if($mb!=='http' and $mb!=='java' and mb_substr($getSRC[1],1,1,"UTF-8")!=='#')
				$newText.='<a'.$getSRC[0].'href='.mb_substr($getSRC[1],0,1,"UTF-8").parent::$CONFIG['homeURL'].mb_substr($getSRC[1],1,mb_strlen($getSRC[1],"UTF-8")-1,"UTF-8");
				else $newText.='<a'.urldecode($ex[$k]);
			}
			self::$TEXT=$newText;
		}
		self::getFunction();
	}
	
	
}
?>