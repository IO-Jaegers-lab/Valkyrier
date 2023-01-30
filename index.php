<?php
	require_once 'vendor/autoload.php';
	
	use \IOJaegers\Valkyrier\Hooks;
	use \IOJaegers\Valkyrier\ScraperTools;

	function query($document): ?array
	{
		$rArray = array();
		$xPath = new DOMXPath($document);
		
		foreach ( $xPath->query('//a[@class="image"]') as $item)
		{
			array_push($rArray, $item);
		}
		
		return $rArray;
	};
	
	class Result
	{
		public static ?array $values = null;
		public static ?int $sizeOf = null;
	}
	
	echo "====== TEST SCRIPT FOR DEVELOPMENT ========================================\r\n";
	
	$hooks = new Hooks();
	
	$hooks->setURL("");
	$r_str = $hooks->execute();
	
	$document = new DOMDocument();
	$document->preserveWhiteSpace = false;
	
	@ $document->loadHTML($r_str);
	
	Result::$values =  query($document);
	Result::$sizeOf = count(Result::$values);
	
	function retrieve($idx):DOMElement
	{
		$current = Result::$values[$idx];
		return $current;
	}
	
	for( $idx = 0; $idx < Result::$sizeOf; $idx++)
	{
		$current = retrieve($idx);
		print_r($current->getAttribute('href'));
		echo "\r\n";
	};
	
	print(Result::$sizeOf);
?>