<?php
	declare(
		encoding='UTF-8'
	);
	
	/**
	 *
	 */
	namespace IOJaegers\Valkyrier\Curl\Options;

	use IOJaegers\Valkyrier\Curl\HookOption;

	/**
	 *
	 */
	class SetCurlUrlOption
		extends HookOption
	{
		/**
		 * @param string $url
		 */
		public function __construct(
			string $url
		)
		{
			parent::__construct(
				CURLOPT_URL
			);
			
			$this->setUrl(
				$url
			);
		}
		
		/**
		 *
		 */
		public function __destruct()
		{
		
		}
		
		// Variables
		private ?string $url = null;
		
		//
		/**
		 * @return string|null
		 */
		public function getUrl(): ?string
		{
			return $this->url;
		}
		
		/**
		 * @param string $url
		 * @return void
		 */
		public function setUrl( string $url ): void
		{
			$this->url = $url;
		}
		
		/**
		 * @return string
		 */
		public function getOption(): string
		{
			return $this->getUrl();
		}
		
	}


?>
