<?php
	declare(
		encoding='UTF-8'
	);
	
	
	
	/**
	 *
	 */
	namespace IOJaegers\Valkyrier\Curl;
	
	abstract class HookOption
	{
		public function __construct(
			int $key
		)
		{
			$this->setOptionKey(
				$key
			);
		}
		
		public function __destruct()
		{
			if(
				$this->isOptionKeySet()
			)
			{
				unset(
					$this->optionKey
				);
			}
		}
	
		// Variables
		private ?int $optionKey = null;
		
		// Accessors
		/**
		 * @return bool
		 */
		public final function isOptionKeySet():bool
		{
			return isset(
				$this->optionKey
			);
		}
		
		public abstract function getOption(): mixed;
		
		
		//
		/**
		 * @return int
		 */
		public final function getOptionKey(): int
		{
			return $this->optionKey;
		}
		
		/**
		 * @param int $optionKey
		 * @return void
		 */
		public final function setOptionKey(
			int $optionKey
		): void
		{
			$this->optionKey = $optionKey;
		}
	}
?>
