<?php
	/**
	 *
	 */
	namespace IOJaegers\Valkyrier;
	
	/**
	 *
	 */
	class SetupHooks
	{
		/**
		 *
		 */
		private function __construct()
		{
		
		}
		
		/**
		 *
		 */
		private function __destruct()
		{
		
		}
		
		/**
		 * @return bool
		 */
		public static function validateRequirements(): bool
		{
			if( self::isFound() )
			{
				return self::$isFound;
			}
			else
			{
				self::query();
			}
			
			return self::$isFound;
		}
		
		/**
		 * @return void
		 */
		protected static function query(): void
		{
		
		}
		
		
		//
		private static bool $isFound = false;
		
		/**
		 * @return bool
		 */
		public static function isFound(): bool
		{
			return self::$isFound;
		}
		
		/**
		 * @param bool $isFound
		 */
		protected static function setIsFound(
			bool $isFound
		): void
		{
			self::$isFound = $isFound;
		}
		
	}
?>