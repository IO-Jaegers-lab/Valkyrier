<?php
	declare(
		encoding='UTF-8'
	);

	namespace IOJaegers\Valkyrier\Curl;
	
	/**
	 *
	 */
	interface HookInterface
	{
		function applyOption(
			HookOption $option
		): void;
	
		function executeCall(): bool;
		
		function close(): void;
		
		function open(): void;
		
		function reset(): void;
	}
?>
