<?php
	declare(
		encoding='UTF-8'
	);
	/**
	 *
	 */
	namespace IOJaegers\Valkyrier\Configuration;
	
	use \IOJaegers\Valkyrier\Configuration\EnvironmentVariablesDefault
		as Defaults;

	/**
	 *
	 */
	class EnvironmentVariables
	{
		/**
		 * @return int
		 */
		public static function DomainWait(): int
		{
			return Defaults::getDomainWait();
		}
	}
?>
