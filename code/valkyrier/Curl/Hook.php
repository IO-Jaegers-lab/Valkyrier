<?php
	declare(
		encoding='UTF-8'
	);
 
	namespace IOJaegers\Valkyrier\Curl;

	use CurlHandle;
	
	/**
	 *
	 */
    class Hook
    {
		/**
		 *
		 */
        public function __construct()
        {
			SetupHook::validateRequirements();
			
			$this->setHandler(
				curl_init()
			);
        }
	
		/**
		 *
		 */
        public function __destruct()
        {
            curl_close(
				$this->getHandler()
			);
			
			unset(
				$this->handler
			);
        }
	
		/**
		 * @return string|null
		 */
		public final function execute(): ?string
		{
			return curl_exec(
				$this->getHandler()
			);
		}
	
		/**
		 * @param mixed $option
		 * @param mixed $value
		 * @return void
		 */
		public function setOption(
			mixed $option,
			mixed $value
		): void
		{
			curl_setopt(
				$this->handler,
				$option,
				$value
			);
		}
	
		// Wrapper functions
		/**
		 * @param HookOption $optionToBeApplied
		 * @return void
		 */
		public final function wrapperApplyOption(
			HookOption $optionToBeApplied
		): void
		{
			$this->setOption(
				$optionToBeApplied->getOptionKey(),
				$optionToBeApplied->getOption()
			);
		}

		// Variables
        private ?CurlHandle $handler = null;
	
		// Accessors
		/**
		 * @return CurlHandle|null
		 */
        public function getHandler(): ?CurlHandle
        {
            return $this->handler;
        }
	
		/**
		 * @param CurlHandle|null $value
		 * @return void
		 */
        public function setHandler(
			?CurlHandle $value
		): void
        {
            $this->handler = $value;
        }

    }
?>
