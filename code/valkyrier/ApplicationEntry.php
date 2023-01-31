<?php
	declare(
		encoding='UTF-8'
	);
	
	/**
	 *
	 */
	namespace IOJaegers\Valkyrier;
	
	use IOJaegers\Valkyrier\Configuration\EnvironmentLoader;

	/**
	 *
	 */
	class ApplicationEntry
	{
		/**
		 * @return void
		 */
		public static function Main(): void
		{
			EnvironmentLoader::setup();
			
			self::setCrawler(
				new Crawler()
			);
			
			self::getCrawler()->execute();
		}
		
		private static ?Crawler $crawler = null;
		
		/**
		 * @return Crawler|null
		 */
		public static function getCrawler(): ?Crawler
		{
			return self::$crawler;
		}
		
		/**
		 * @param Crawler|null $crawler
		 */
		public static function setCrawler(
			?Crawler $crawler
		): void
		{
			self::$crawler = $crawler;
		}
	}
?>
