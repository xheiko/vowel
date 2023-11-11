<?
\Bitrix\Main\Localization\Loc::loadMessages(__FILE__);


Class abramov_vowel extends CModule
{
	public $MODULE_ID ;
	public $MODULE_NAME;
	public $MODULE_NAME_SPACE;
	public $MODULE_VERSION;
	public $MODULE_VERSION_DATE;
	public $MODULE_DESCRIPTION;
	
	function __construct ()
	{
        $this->MODULE_ID 			= 'abramov.vowel';
		$this->MODULE_NAME 			= 'Vowels utils';
		$this->MODULE_NAME_SPACE	= 'Abramov\Vowel';
        $this->MODULE_VERSION 		= '23.0.0.0';
        $this->MODULE_VERSION_DATE 	= '2023-11-10';		
		$this->MODULE_DESCRIPTION 	= 'Add new REST api functions and js methods for work with vowels. Author V.Abramov';
		$this->PARTNER_NAME 		= "Vadim Abramov"; 
		$this->PARTNER_URI			= "https://t.me/x_heiko";
	}

	function DoInstall()
	{
		$eventManager = \Bitrix\Main\EventManager::getInstance(); 
		$eventManager->registerEventHandler("rest","OnRestServiceBuildDescription","abramov.vowel","\Abramov\Vowel\Helper","OnRestServiceBuildDescription");		
		
		RegisterModule($this->MODULE_ID);
	}
	
	function DoUninstall()	
	{
		$eventManager = \Bitrix\Main\EventManager::getInstance(); 
		$eventManager->unregisterEventHandler("rest","OnRestServiceBuildDescription","abramov.vowel","\Abramov\Vowel\Helper","OnRestServiceBuildDescription");	
		UnRegisterModule($this->MODULE_ID);
	}
	
}