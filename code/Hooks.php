<?php
    namespace IOJaegers\Valkyrier;

	use \CurlHandle;
	
	/**
	 *
	 */
    class Hooks
    {
		/**
		 *
		 */
        public function __construct()
        {
			SetupHooks::validateRequirements();
			
			$this->setHandler(
				curl_init()
			);
			
			$this->setOption(CURLOPT_RETURNTRANSFER, 1);
        }
	
		/**
		 *
		 */
        public function __destruct()
        {
            curl_close(
				$this->getHandler()
			);
			
			unset( $this->handler );
        }
	
		/**
		 * @param string $linkToResource
		 * @return void
		 */
		public function setURL(
			string $linkToResource
		): void
		{
			$this->setOption(
				CURLOPT_URL,
				$linkToResource
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

        private ?CurlHandle $handler = null;
	
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
        public function setHandler( ?CurlHandle $value ): void
        {
            $this->handler = $value;
        }

    }
?>