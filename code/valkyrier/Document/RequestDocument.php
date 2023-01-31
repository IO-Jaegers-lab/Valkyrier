<?php
	declare(
		encoding='UTF-8'
	);
	
	/**
	 *
	 */
	namespace IOJaegers\Valkyrier\Document;
	
	use DOMDocument;
	use IOJaegers\Valkyrier\Curl\HookFacade;
	use IOJaegers\Valkyrier\Curl\Options\SetCurlUrlOption;


	/**
	 *
	 */
	class RequestDocument
		extends HookFacade
	{
		// Constructors
		/**
		 * @param string $url
		 */
		public function __construct(
			string $url
		)
		{
			parent::__construct();
			
			$this->setUrl(
				$url
			);
		}
		
		/**
		 *
		 */
		public function __destruct()
		{
			parent::__destruct();
			
			unset(
				$this->url
			);
		}
		
		
		
		
		/**
		 * @return void
		 */
		protected function setup(): void
		{
			$url_options = new SetCurlUrlOption(
				$this->getUrl()
			);
			
			$this->getHook()
				 ->wrapperApplyOption(
					 $url_options
			);
		}
		
		// Variables
		private ?string $url = null;
		
		/**
		 * @return string|null
		 */
		public function getUrl(): ?string
		{
			return $this->url;
		}
		
		/**
		 * @param string|null $url
		 */
		public function setUrl(
			?string $url
		): void
		{
			$this->url = $url;
		}
		
		/**
		 * @return DOMDocument|null
		 */
		public function convertToDom(): ?DOMDocument
		{
			if( $this->isOutputBufferSet() )
			{
				$document = new DOMDocument();
				$document->preserveWhiteSpace = false;
				
				@$document->loadHTML(
					$this->getOutputBuffer()
				);
				
				return $document;
			}
			
			return null;
		}
	}
?>
