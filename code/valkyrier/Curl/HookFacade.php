<?php
	declare(
		encoding='UTF-8'
	);
	
	/**
	 *
	 */
	namespace IOJaegers\Valkyrier\Curl;
	
	
	use IOJaegers\Valkyrier\Curl\Options\OnExecuteEvent;
	use IOJaegers\Valkyrier\Curl\Options\ReturnCurlMessageState;
	
	
	/**
	 *
	 */
	abstract class HookFacade
		implements HookInterface
	{
		/**
		 *
		 */
		public function __construct()
		{
			$this->setHook(
				new Hook()
			);
			
			$this->setExecuteEvent(
				$this->getHook()
			);
			
			$this->setup();
		}
		
		/**
		 *
		 */
		public function __destruct()
		{
			if( $this->isHookSet() )
			{
				$this->close();
			}
			
			if( $this->isExecuteEventSet() )
			{
				unset(
					$this->executeEvent
				);
			}
		}
		
		public function applyOption(
			HookOption $option
		): void
		{
			if( $this->isHookSet() )
			{
				$this->getHook()
					 ->wrapperApplyOption(
						 $option
					 );
			}
		}
		
		/**
		 * @return void
		 */
		public function close(): void
		{
			if( $this->isHookSet() )
			{
				unset(
					$this->hook
				);
			}
		}
		
		/**
		 * @return void
		 */
		public function open(): void
		{
			$this->setHook(
				new Hook()
			);
		}
		
		/**
		 * @return bool
		 */
		public function executeCall(): bool
		{
			if( $this->isExecuteEventSet() )
			{
				$this->getExecuteEvent()
					 ->onEvent();
			}
			
			$result = null;
			
			if(
				$this->getExecuteEvent()->getState()
				==
				ReturnCurlMessageState::RETURN_RESULT
			)
			{
				$result = $this->getHook()
							   ->execute();
				
				$this->setOutputBuffer(
					$result
				);
			}
			else
			{
				$this->getHook()
					 ->execute();
			}
			
			return $this->isOutputBufferSet();
		}
		
		/**
		 * @return void
		 */
		public function reset(): void
		{
			if( $this->isHookSet() )
			{
				$this->close();
			}
			
			$this->open();
		}
		
		/**
		 * @return void
		 */
		protected abstract function setup(): void;
		
		
		// Variables
		private ?Hook $hook = null;
		
		private ?OnExecuteEvent $executeEvent = null;
		
		private ?string $outputBuffer = NULL;
		
		
		// Accessor
		/**
		 * @return Hook|null
		 */
		public final function getHook(): ?Hook
		{
			return $this->hook;
		}
		
		/**
		 * @param Hook|null $hook
		 */
		public final function setHook(
			?Hook $hook
		): void
		{
			$this->hook = $hook;
		}
		
		/**
		 * @return string|null
		 */
		public function getOutputBuffer(): ?string
		{
			return $this->outputBuffer;
		}
		
		/**
		 * @param string|null $outputBuffer
		 */
		public function setOutputBuffer(
			?string $outputBuffer
		): void
		{
			$this->outputBuffer = $outputBuffer;
		}
		
		public function isOutputBufferSet(): bool
		{
			return isset(
				$this->outputBuffer
			);
		}
		
		/**
		 * @return bool
		 */
		public final function isHookSet(): bool
		{
			return isset(
				$this->hook
			);
		}
		
		/**
		 * @return bool
		 */
		public function isExecuteEventSet(): bool
		{
			return isset(
				$this->executeEvent
			);
		}
		
		/**
		 * @return OnExecuteEvent|null
		 */
		public function getExecuteEvent(): ?OnExecuteEvent
		{
			return $this->executeEvent;
		}
		
		/**
		 * @param OnExecuteEvent|null $executeEvent
		 */
		public function setExecuteEvent(
			?OnExecuteEvent $executeEvent
		): void
		{
			$this->executeEvent = $executeEvent;
		}
	}
?>
