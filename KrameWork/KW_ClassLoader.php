<?php
	class KW_ClassLoader
	{
		/**
		 * Loads a file with matching class name (case-sensitive) from the linked class paths.
		 *
		 * @param string $className The name of the class.
		 */
		public function loadClass($className)
		{
			// ToDo: Allow recursive searching for auto-loading.
			foreach ($this->classPaths as $classPath)
			{
				foreach (scandir($classPath) as $node)
				{
					if ($node === '.' || $node === '..')
						continue;

					foreach ($this->allowedExtensions as $extension)
					{
						$path = $classPath . DIRECTORY_SEPARATOR . $className . $extension;
						if (file_exists($path))
						{
							require_once($path);
							return;
						}
					}
				}
			}
		}

		/**
		 * Sets which file extensions can be automatically loaded by the class loader.
		 *
		 * @param String $extensionString A comma-separated list of extensions with period included.
		 */
		public function setAllowedExtensions($extensionString)
		{
			$this->allowedExtensions = explode(',', $extensionString);
		}

		/**
		 * Adds a directory to the loader which will be checked for matching class files.
		 *
		 * @param String $classPath The directory to add to the loader.
		 */
		public function addClassPath($classPath)
		{
			$this->classPaths[] = rtrim($classPath, "\x2F\x5C");
		}

		private $allowedExtensions = Array();
		private $classPaths = Array();
	}
?>