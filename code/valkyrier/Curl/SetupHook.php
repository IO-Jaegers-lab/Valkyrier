<?php
	declare(
		encoding='UTF-8'
	);
	
	namespace IOJaegers\Valkyrier\Curl;
	
	
	/**
	 *
	 */
	class SetupHook
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
			if( self::isValid() )
			{
				return self::$isValid;
			}
			else
			{
				self::query();
			}
			
			return self::$isValid;
		}
		
		const CurlInit = 'curl_init';
		
		const CurlSetOpt = 'curl_setopt';
		
		const CurlClose = 'curl_close';
		
		const CurlExecute = 'curl_execute';
		
		/**
		 * @return void
		 */
		protected static function query(): void
		{
			if(
				function_exists(self::CurlInit)
			)
			{
				self::setIsCurlInitFound( TRUE );
			}
			
			if(
				function_exists(self::CurlSetOpt)
			)
			{
				self::setIsCurlSetOptionFound( TRUE );
			}
			
			if(
				function_exists(self::CurlClose)
			)
			{
				self::setIsCurlCloseFound( TRUE );
			}
			
			if(
				function_exists(self::CurlExecute)
			)
			{
				self::setIsCurlExecuteFound( TRUE );
			}
			
			self::setIsValid(
				self::isCurlInitFound() 		&&
				self::isCurlExecuteFound() 		&&
				self::isCurlCloseFound() 		&&
				self::isCurlExecuteFound()
			);
		}
		
		
		//
		private static bool $isValid = FALSE;
		
		private static bool $isCurlInitFound = FALSE;
		
		private static bool $isCurlExecuteFound = FALSE;
		
		private static bool $isCurlSetOptionFound = FALSE;
		
		private static bool $isCurlCloseFound = FALSE;
		
		
		/**
		 * @return bool
		 */
		public static function isValid(): bool
		{
			if( is_null(
				self::$isValid
				)
			)
			{
				self::setIsValid(
					false
				);
			}
			
			return self::$isValid;
		}
		
		/**
		 * @param bool $isValid
		 */
		protected static function setIsValid(
			bool $isValid
		): void
		{
			self::$isValid = $isValid;
		}
		
		/**
		 * @return bool
		 */
		public static function isCurlCloseFound(): bool
		{
			return self::$isCurlCloseFound;
		}
		
		/**
		 * @return bool
		 */
		public static function isCurlInitFound(): bool
		{
			return self::$isCurlInitFound;
		}
		
		/**
		 * @return bool
		 */
		public static function isCurlSetOptionFound(): bool
		{
			return self::$isCurlSetOptionFound;
		}
		
		/**
		 * @param bool $isCurlCloseFound
		 */
		public static function setIsCurlCloseFound(
			bool $isCurlCloseFound
		): void
		{
			self::$isCurlCloseFound = $isCurlCloseFound;
		}
		
		/**
		 * @param bool $isCurlInitFound
		 */
		public static function setIsCurlInitFound(
			bool $isCurlInitFound
		): void
		{
			self::$isCurlInitFound = $isCurlInitFound;
		}
		
		/**
		 * @param bool $isCurlSetOptionFound
		 */
		public static function setIsCurlSetOptionFound(
			bool $isCurlSetOptionFound
		): void
		{
			self::$isCurlSetOptionFound = $isCurlSetOptionFound;
		}
		
		/**
		 * @return bool
		 */
		public static function isCurlExecuteFound(): bool
		{
			return self::$isCurlExecuteFound;
		}
		
		/**
		 * @param bool $isCurlExecuteFound
		 */
		public static function setIsCurlExecuteFound(
			bool $isCurlExecuteFound
		): void
		{
			self::$isCurlExecuteFound = $isCurlExecuteFound;
		}
	}
?>
