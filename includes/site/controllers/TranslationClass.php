<?php

class TRANSLATION extends GETS{
	
	private static $RESULT;
	public static $getTranslation;
	
	
	public function __construct($Language, $titleLang, $Enabled, $ResultType)
	{
		if(!empty($Language))
		$this->getTranslation($Language,$titleLang,$Enabled,$ResultType);
	}
	
	private function getTranslation($Language, $titleLang, $Enabled, $ResultType)
	{
	
		self::$getTranslation = parent::select('translation','`text`',"`translationTitleLang`='{$titleLang}' AND `isEnabled`='{$Enabled}' AND `LanguageID` IN (SELECT `languageID` FROM `".DB_PREFIX."languages` WHERE `languageShort`='{$Language}')",'');
		self::Results($ResultType);
	}
	public static function Results($ResultType)
	{
		if (count(self::$getTranslation)==0) return self::$getTranslation;
		else if ($ResultType==1)	echo(new GETS(htmlspecialchars_decode(self::$getTranslation[0]['text'])));
			 else {
			     self::$RESULT = new GETS(htmlspecialchars_decode(self::$getTranslation[0]['text']));
			     return  self::$RESULT;
             }
	}
	
	
}


?>