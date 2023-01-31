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
			$this->open();
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
				$this->deleteExecuteEvent();
			}
		}
		
		protected final function deleteExecuteEvent(): void
		{
			unset(
				$this->executeEvent
			);
		}
		
		protected final function deleteHook(): void
		{
			unset(
				$this->hook
			);
		}
		
		public final function applyOption(
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
		public final function close(): void
		{
			if( $this->isHookSet() )
			{
				$this->deleteHook();
			}
		}
		
		/**
		 * @return void
		 */
		public final function open(): void
		{
			if( $this->isHookNull() )
			{
				$this->setHook(
					new Hook()
				);
			}
			
			$this->setExecuteEvent(
				new OnExecuteEvent(
					$this->getHook()
				)
			);
			
			$this->setup();
		}
		
		/**
		 * @return bool
		 */
		public final function executeCall(): bool
		{
			if( $this->isExecuteEventSet() )
			{
				$this->getExecuteEvent()
					 ->onEvent();
			}
			
			$result = null;
			
			if(
				$this->getExecuteEvent()
					 ->getState()
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
		public final function reset(): void
		{
			$this->close();
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
		public final function getOutputBuffer(): ?string
		{
			return $this->outputBuffer;
		}
		
		/**
		 * @param string|null $outputBuffer
		 */
		public final function setOutputBuffer(
			?string $outputBuffer
		): void
		{
			$this->outputBuffer = $outputBuffer;
		}
		
		/**
		 * @return bool
		 */
		public final function isOutputBufferSet(): bool
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
		public final function isHookNull(): bool
		{
			return is_null(
				$this->hook
			);
		}
		
		/**
		 * @return bool
		 */
		public final function isExecuteEventSet(): bool
		{
			return isset(
				$this->executeEvent
			);
		}
		
		/**
		 * @return OnExecuteEvent|null
		 */
		public final function getExecuteEvent(): ?OnExecuteEvent
		{
			return $this->executeEvent;
		}
		
		/**
		 * @param OnExecuteEvent|null $executeEvent
		 */
		public final function setExecuteEvent(
			?OnExecuteEvent $executeEvent
		): void
		{
			$this->executeEvent = $executeEvent;
		}
		
		/**
		 * @return bool
		 */
		public final function isExecuteEventNull(): bool
		{
			return is_null(
				$this->executeEvent
			);
		}
	}
?>
