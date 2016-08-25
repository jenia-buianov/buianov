<?php

class ADMIN_TRANSLATION extends TRANSLATION{
	
		
	public function __construct($Language, $titleLang, $Enabled, $ResultType)
	{
		if(!empty($Language))
		$this->getTranslation($Language,$titleLang,$Enabled,$ResultType);
	}
	
	private function getTranslation($Language, $titleLang, $Enabled, $ResultType)
	{
		
		parent::$getTranslation = parent::select('admin_translation','`text`',"`translationTitleLang`='{$titleLang}' AND `isEnabled`='{$Enabled}' AND `LanguageID` IN (SELECT `languageID` FROM `".DB_PREFIX."languages` WHERE `languageShort`='{$Language}')",'');
		parent::Results($ResultType);
	}
	
	
	
}


?>