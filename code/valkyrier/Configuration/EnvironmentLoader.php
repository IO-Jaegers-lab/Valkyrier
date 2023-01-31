<?php
	declare(
		strict_types=1
	);
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
		private $enviroment = null;
		
		/**
		 * @return null
		 */
		public function getEnviroment()
		{
			return $this->enviroment;
		}
		
		/**
		 * @param null $enviroment
		 */
		public function setEnviroment($enviroment): void
		{
			$this->enviroment = $enviroment;
		}
		
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
			
			$env = Dotenv::createImmutable( self::currentPath(),
											$found
			);
			
			$env->load();
			
			self::setEnviroment(
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
			$sizeOfFound = sizeof($found);
			$idx = null;
			
			for(
				$idx = 0;
				$idx < $sizeOfFound;
				$idx++
			)
			{
				$item = $found[$idx];
				
				$path = $root . '/' . $item;
				
				$info = pathinfo($path);
				
				if(
					isset(
						$info[ 'extension' ]
					)
				)
				{
					if(
						is_file( $path ) &&
						$info[ 'extension' ] == 'env'
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
