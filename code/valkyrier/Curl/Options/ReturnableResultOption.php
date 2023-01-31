<?php
	declare(
		encoding='UTF-8'
	);
	
	use \IOJaegers\Valkyrier\Curl\HookOption;
	
	
	/**
	 *
	 */
		
	class ReturnableResultOption
		extends HookOption
	{
		/**
		 *
		 */
		public function __construct(
			bool $state
		)
		{
			parent::__construct(
				key: CURLOPT_RETURNTRANSFER
			);
			
			$this->setReturnContent(
				$state
			);
		}
		
		private ?bool $returnContent = NULL;
		
		/**
		 *
		 */
		public function __destruct()
		{
		
		}
		
		/**
		 * @return int
		 */
		public function getOption(): int
		{
			return intval(
				$this->getReturnContent()
			);
		}
		
		/**
		 * @return bool
		 */
		public function getReturnContent(): bool
		{
			return $this->returnContent;
		}
		
		/**
		 * @param bool|null $returnContent
		 */
		public function setReturnContent(
			bool $returnContent
		): void
		{
			$this->returnContent = $returnContent;
		}
	}
?>
