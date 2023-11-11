<?
namespace Abramov\Vowel;
Class Helper
{ 
	public static function getUserNameVowels($id)	
	{
		$userNames = \Bitrix\Main\UserTable::query()
				->where("ID", "=", $id)
				->setSelect(['NAME','LAST_NAME','SECOND_NAME'])
				->exec()
				->fetch();
		if ($userNames)
		{
			$result="";
			foreach ($userNames as $name)
			{
				$result.=preg_filter("/[^aeiouуеыаоэяию]/ui", "", mb_strtolower($name));	
			}
			return $result;
		}		
		return false;		
	}
	
	public static function OnRestServiceBuildDescription()
	{
		return array(
			'abramov' => [
				'get.username.vowels' => [
				'callback' => array(__CLASS__, 'RestCall'),
				'options' => array(),
				],
			]
		);
	}

	public static function RestCall($query, $n, \CRestServer $server)
	{
		$query=array_change_key_case($query); 
		if ( $id = $query['id'])
		{						
			return self::getUserNameVowels($id);
		}
		throw new \Bitrix\Rest\RestException( 'Parameter ID can not be empty!', 400, \CRestServer::STATUS_WRONG_REQUEST );
	}
	
	
}