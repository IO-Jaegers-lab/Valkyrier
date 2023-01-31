<?php
	declare(
		encoding='UTF-8'
	);
	/**
	 *
	 */
	namespace IOJaegers\Valkyrier\Configuration;
	use Dotenv\Dotenv;

	
	/**
	 *
	 */
	class EnvironmentLoader
	{
		//
		private static ?Dotenv $environment = null;
		
		// Accessors
		/**
		 * @return Dotenv|null
		 */
		public static function getEnvironment(): ?Dotenv
		{
			return self::$environment;
		}
		
		/**
		 * @param Dotenv|null $environment
		 * @return void
		 */
		public static function setEnvironment(
			?Dotenv $environment
		): void
		{
			self::$environment = $environment;
		}
		
		
		//
		/**
		 * @return void
		 */
		public static function setup(): void
		{
			$path = self::currentPath();
			
			if(
				is_null(
					$path
				)
			)
			{
				return;
			}
			
			$found = self::filter(
				scandir(
					$path,
					SCANDIR_SORT_ASCENDING
				),
				$path
			);
			
			$env = Dotenv::createImmutable(
				self::currentPath(),
				$found
			);
			
			$env->safeLoad();
			
			self::setEnvironment(
				$env
			);
		}
		
		
		/**
		 * @param array $found
		 * @param string $root
		 * @return array|null
		 */
		public static function filter(
			array $found,
			string $root
		): ?array
		{
			$returnValue = array();
			
			$sizeOfFound = sizeof(
				$found
			);
			
			$idx = null;
			
			for(
				$idx = self::zero;
				$idx < $sizeOfFound;
				$idx ++
			)
			{
				$item = $found[$idx];
				
				$path = $root . '/' . $item;
				
				$info = pathinfo( $path );
				
				if(
					isset(
						$info[ self::fileExtensionKey ]
					)
				)
				{
					if(
						is_file( $path ) &&
						$info[ self::fileExtensionKey ] == self::fileExtension
					)
					{
						array_push(
							$returnValue,
							$item
						);
					}
				}
			}
			
			return $returnValue;
		}
		
		private const fileExtensionKey = 'extension';
		private const fileExtension = 'env';
		private const zero = 0;
		
		
		/**
		 * @return string|null
		 */
		protected static function currentPath(): ?string
		{
			$path = getcwd();
			
			if( $path )
			{
				return $path;
			}
			
			return null;
		}
	}
?>
