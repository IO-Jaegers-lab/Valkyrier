<?php
	declare(
		encoding='UTF-8'
	);
	
	/**
	 *
	 */
	namespace IOJaegers\Valkyrier\Curl\Options;

	use IOJaegers\Valkyrier\Curl\Hook;
	use ReturnableResultOption;

	/**
	 *
	 */
	class OnExecuteEvent
	{
		/**
		 *
		 */
		public function __construct(
			Hook $hook
		)
		{
			$this->setHook(
				$hook
			);
			
			$this->setState(
				ReturnCurlMessageState::RETURN_RESULT
			);
		}
		
		/**
		 *
		 */
		public function __destruct()
		{
			if( $this->isHookSet() )
			{
				unset(
					$this->hook
				);
			}
		}
		
		public function onEvent(): void
		{
			
			if(
				$this->isHookSet()
			)
			{
				$state = match(
					$this->getState()
				)
				{
					ReturnCurlMessageState::NO 			  => FALSE,
					ReturnCurlMessageState::RETURN_RESULT => TRUE,
				};
				
				$Option = new ReturnableResultOption(
					$state
				);
				
				$this->getHook()
					 ->wrapperApplyOption(
						 $Option
				);
			}
		}
		
		// Variables
		private ?ReturnCurlMessageState $state = NULL;
		
		private ?Hook $hook = NULL;
		
		
		/**
		 * @return ReturnCurlMessageState|null
		 */
		public function getState(): ?ReturnCurlMessageState
		{
			return $this->state;
		}
		
		/**
		 * @param ReturnCurlMessageState|null $state
		 */
		public function setState(
			?ReturnCurlMessageState $state
		): void
		{
			$this->state = $state;
		}
		
		/**
		 * @return Hook|null
		 */
		public function getHook(): ?Hook
		{
			return $this->hook;
		}
		
		/**
		 * @param Hook|null $hook
		 */
		public function setHook(
			?Hook $hook
		): void
		{
			$this->hook = $hook;
		}
		
		public function isHookSet(): bool
		{
			return isset(
				$this->hook
			);
		}
	}
?>
