<?php
	declare(
		encoding='UTF-8'
	);
	
	/**
	 *
	 */
	namespace IOJaegers\Valkyrier;
	
	use IOJaegers\Valkyrier\KeyStore\MemoryEngine;

	/**
	 *
	 */
	class Crawler
	{
		public function __construct()
		{
			$this->setMemory(
				new MemoryEngine()
			);
			
			$this->setWalk(
				new Walk()
			);
		}
		
		public function __destruct()
		{
		
		}
		
		// Variables
		private ?MemoryEngine $memory = null;
		
		private ?Walk $walk = NULL;
		
		
		// Code
		public function execute(): void
		{
		
		}
		
		/**
		 * @return MemoryEngine|null
		 */
		public function getMemory(): ?MemoryEngine
		{
			return $this->memory;
		}
		
		/**
		 * @param MemoryEngine|null $memory
		 */
		public function setMemory(
			?MemoryEngine $memory
		): void
		{
			$this->memory = $memory;
		}
		
		/**
		 * @return Walk|null
		 */
		public function getWalk(): ?Walk
		{
			return $this->walk;
		}
		
		/**
		 * @param Walk|null $walk
		 */
		public function setWalk(
			?Walk $walk
		): void
		{
			$this->walk = $walk;
		}
	}
?>
