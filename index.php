<?php
	require_once 'vendor/autoload.php';
	
	use \IOJaegers\Valkyrier\RequestDocument
		as RD;
	
	use \IOJaegers\Valkyrier\Extractor
		as Extractor;
	
	
	
	$find = array(l1, l2, l3, l4, l5, l6, l7);
	
	echo "====== TEST SCRIPT FOR DEVELOPMENT ========================================\r\n";
	const class_name = '"image"';

	$index = 0;
	$sizeOf = count($find);
	
	for(
		$index = 0;
		$index < $sizeOf;
		$index ++
	)
	{
		$current = $find[$index];
		
		$extractor1 = new Extractor(
			new RD(
				$current
			),
			"https://commons.wikimedia.org"
		);
		
		$extracted_1 = $extractor1->retrieveUrlsByClassName( class_name );
		
		print_r($extracted_1);
	}
	
	
?>