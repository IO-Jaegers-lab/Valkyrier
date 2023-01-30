<?php
	/**
	 *
	 */
    namespace IOJaegers\Valkyrier;

	use DOMDocument;
	use DOMXPath;
	use DOMNodeList;


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