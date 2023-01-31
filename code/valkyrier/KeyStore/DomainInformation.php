<?php
	declare(
		encoding='UTF-8'
	);
	
	/**
	 *
	 */
	namespace IOJaegers\Valkyrier\KeyStore;
	
	/**
	 *
	 */
	class DomainInformation
	{
		/**
		 * @param string $domainName
		 */
		public function __construct(
			string $domainName
		)
		{
			$this->setDomain(
				$domainName
			);
		}
		
		/**
		 *
		 */
		public function __destruct()
		{
			unset(
				$this->domain
			);
		}
		
		// Variables
		private string $domain = '';
		
		private int $hash = -1;
		
		// Accessors
		/**
		 * @return int
		 */
		public function getHash(): int
		{
			return $this->hash;
		}
		
		/**
		 * @return string
		 */
		public function getDomain(): string
		{
			return $this->domain;
		}
		
		/**
		 * @param int $hash
		 */
		public function setHash(
			int $hash
		): void
		{
			$this->hash = $hash;
		}
		
		/**
		 * @param string $domain
		 */
		public function setDomain(
			string $domain
		): void
		{
			$this->domain = $domain;
		}
	}
?>
