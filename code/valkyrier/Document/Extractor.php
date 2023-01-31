<?php
	declare(strict_types=1);
	declare(encoding='UTF-8');
	
	/**
	 *
	 */
	namespace Document;
	
	use DOMDocument;
use DOMElement;
use DOMNodeList;


class Extractor
	{
		protected static function hasHost(
			$url
		): bool
		{
			$url = parse_url($url);
			
			return isset(
				$url[ 'host' ]
			);
		}
		
		public function __construct(
			RequestDocument $document,
			string $website
		)
		{
			$this->setDocument(
				$document
			);
			
			$this->setDom(
				$document->convertToDom()
			);
			
			$this->setDomain(
				$website
			);
		}
		
		public function retrieveUrlsAll(): array
		{
			$rValue = array();
			
			$NodeList = $this->getDom()
						     ->getElementsByTagName(
								 'a'
			);
			
			$index = null;
			
			for(
				$index = 0;
				$index < $NodeList->count();
				$index ++
			)
			{
				$element = $this::retrieveByIndex( $index, $NodeList );
				
				$href = $element->getAttribute('href');
				array_push($rValue, $href);
			}
			
			return $rValue;
		}
		
		public function retrieveUrlsByClassName(
			string $nameOfClass
		): array
		{
			$rValue = array();
			
			$NodeList = Scraper::queryElementByClass(
				$this->getDom(),
				'a',
				$nameOfClass
			);
			$index = null;
			
			for( $index = 0;
				 $index < $NodeList->count();
				 $index ++ )
			{
				$element = $this::retrieveByIndex( $index, $NodeList );
				$href = $element->getAttribute('href');
				
				$full = null;
				
				if( self::hasHost( $href ) )
				{
					$full = $href;
				}
				else
				{
					$full = $this->getDomain() . $href;
				}
				
				$full = htmlspecialchars($full);
				array_push($rValue, $full);
			}
			
			return $rValue;
		}
		
		protected function retrieveByIndex(
			int $index,
			DOMNodeList $nl
		): DOMElement
		{
			return $nl[$index];
		}
		
		//
		private ?RequestDocument $document = null;
		
		private ?DOMDocument $dom = null;
		
		private ?string $domain = null;
		
		
		//
		/**
		 * @return RequestDocument|null
		 */
		public function getDocument(): ?RequestDocument
		{
			return $this->document;
		}
		
		/**
		 * @param RequestDocument|null $document
		 */
		public function setDocument(
			?RequestDocument $document
		): void
		{
			$this->document = $document;
		}
		
		/**
		 * @return DOMDocument|null
		 */
		public function getDom(): ?DOMDocument
		{
			return $this->dom;
		}
		
		/**
		 * @param DOMDocument|null $dom
		 */
		public function setDom(
			?DOMDocument $dom
		): void
		{
			$this->dom = $dom;
		}
		
		/**
		 * @return string|null
		 */
		public function getDomain(): ?string
		{
			return $this->domain;
		}
		
		/**
		 * @param string|null $domain
		 */
		public function setDomain(
			?string $domain
		): void
		{
			$this->domain = $domain;
		}
	}
?>
