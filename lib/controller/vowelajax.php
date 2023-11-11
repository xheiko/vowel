<?
namespace Abramov\Vowel\Controller;
use \Bitrix\Main\Error;

class VowelAjax extends \Bitrix\Main\Engine\Controller
{
	public function getUserNameVowelsAction($id):? array
	{
		if ($result=\Abramov\Vowel\Helper::getUserNameVowels($id)) 
			return [
				'vowels' => $result 
			];
		$this->addError(new Error("Could not find user with id=$id"),400);
		return [];
	}
}

