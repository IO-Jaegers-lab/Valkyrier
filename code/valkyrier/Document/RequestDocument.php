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
			
			unset(
				$this->content
			);
		}
		
		
		
		
		/**
		 * @return void
		 */
		protected function setup(): void
		{
		
		}
		
		// Variables
		private ?string $url = null;
		
		private ?string $content = null;
		
		
		
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
		 * @return string|null
		 */
		public function getContent(): ?string
		{
			return $this->content;
		}
		
		/**
		 * @param string|null $content
		 */
		public function setContent(
			?string $content
		): void
		{
			$this->content = $content;
		}
		
		/**
		 * @return DOMDocument|null
		 */
		public function convertToDom(): ?DOMDocument
		{
			if(
				isset(
					$this->content
				)
			)
			{
				$document = new DOMDocument();
				$document->preserveWhiteSpace = false;
				
				@$document->loadHTML(
					$this->getContent()
				);
				
				return $document;
			}
			
			return null;
		}
	}
?>
