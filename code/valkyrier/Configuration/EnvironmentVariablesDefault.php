<?php
	declare(
		encoding='UTF-8'
	);
	/**
	 *
	 */
	namespace IOJaegers\Valkyrier\Configuration;
	
	class EnvironmentVariablesDefault
	{
		private static ?int $domain_wait = null;
		
		/**
		 * @return int
		 */
		public static function getDomainWait(): int
		{
			if(
				is_null( self::$domain_wait )
			)
			{
				self::setDomainWait(
					2000
				);
			}
			
			return self::$domain_wait;
		}
		
		/**
		 * @param int $domain_wait
		 * @return void
		 */
		public static function setDomainWait(
			int $domain_wait
		): void
		{
			self::$domain_wait = $domain_wait;
		}
		
	}
?>
