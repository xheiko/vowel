<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Module abramov.vowel: BX.ajax test");
\Bitrix\Main\UI\Extension::load("ui.buttons"); 
\Bitrix\Main\UI\Extension::load("ui.forms"); 
\Bitrix\Main\UI\Extension::load("ui.textanimate");
?>
	<div class="ui-ctl ui-ctl-textbox ui-ctl-w25">
		<div class="ui-ctl-tag">userID</div>
		<input type="text" class="ui-ctl-element" id="userid-input" placeholder="Input userID">
	</div>	
	<br>	
	<div id="vowelresult" ></div>	
	<br>	
	<button class="ui-btn ui-btn-success-light" onclick="getUsernameVowels()" id="button-get" disabled>Get Vowels</button>
	
<script>
	window.onload = function(e)
	{ 
		document.getElementById("button-get").disabled = false;
	}
	
	function getUsernameVowels()
	{	
		document.getElementById("button-get").disabled = true;
		BX.ajax.runAction('abramov:vowel.VowelAjax.getUserNameVowels',{data:{id:document.getElementById("userid-input").value}}).then(
			function (response) 
			{
				console.log(response);
				var el = document.getElementById('vowelresult');
				el.textContent = '(' + document.getElementById("userid-input").value+') ' + response.data.vowels;	
				document.getElementById("button-get").disabled = false;
			},
			function (response) 
			{
				console.log(response);
				var el = document.getElementById('vowelresult');
				el.textContent = 'Error ' + response.errors[0]['message'];	
				document.getElementById("button-get").disabled = false;
			},
		);	
}
</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>