<?php
	declare(
		encoding='UTF-8'
	);
	
	/**
	 *
	 */
    namespace IOJaegers\Valkyrier\Document;

	use DOMDocument;
	use DOMNodeList;
	use DOMXPath;


	/**
	 *
	 */
    class Scraper
    {
		/**
		 *
		 */
        public function __construct()
        {
        
        }
	
		/**
		 *
		 */
		public function __destruct()
		{
		
		}
	
	
		/**
		 * @param DOMDocument $document
		 * @param string $element
		 * @param string|null $class_name
		 * @return DOMNodeList
		 */
		public static function queryElementByClass(
			DOMDocument $document,
			string $element = 'div',
			?string $class_name = null
		): DOMNodeList
		{
			$arr = array();
			$query = '//' . $element . '[@class=' . $class_name .']';
			
			$xPath = new DOMXPath(
				$document
			);
			
			return $xPath->query(
				$query
			);
		}
		
    }
?>
