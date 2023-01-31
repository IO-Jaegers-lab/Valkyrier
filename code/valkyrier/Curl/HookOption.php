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
	
		private ?int $optionKey = null;
		
		/**
		 * @return bool
		 */
		public function isOptionKeySet():bool
		{
			return isset(
				$this->optionKey
			);
		}
		
		public abstract function getOption(): mixed;
		
		
		/**
		 * @return int
		 */
		public function getOptionKey(): int
		{
			return $this->optionKey;
		}
		
		/**
		 * @param int $optionKey
		 * @return void
		 */
		public function setOptionKey(
			int $optionKey
		): void
		{
			$this->optionKey = $optionKey;
		}
	}
?>
