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
		}
	}
?>
