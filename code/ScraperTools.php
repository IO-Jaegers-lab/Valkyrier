<?php
	/**
	 *
	 */
    namespace IOJaegers\Valkyrier;
	
	use DOMDocument;
	use \DOMXPath;

	/**
	 *
	 */
    class ScraperTools
    {
        public function __construct()
        {
            
        }
		
		public function __destruct()
		{
		
		}
		
		public static function queryByClassName(
			string $element,
			string $classname
		)
		{
			return '//'. $element .'[@class='. $classname .']';
		}
		
		public static function getElementByClassName(
			DomDocument $html,
			string $element,
			string $class_name
		): mixed
		{
			$rValue = array();
			
			$xPath = new DOMXPath($html);
			
			$elements = $xPath->query(
				self::queryByClassName(
					$element,
					$class_name
				)
			);
			
			foreach ($elements as $element)
			{
				array_push($rValue, $element);
			}
			
			return $rValue;
		}
    }
?>