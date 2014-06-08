<?php
	class KW_ClassLoader
	{
		/**
		 * Loads a file with matching class name (case-sensitive) from the linked class paths.
		 *
		 * @param string $className The name of the class.
		 */
		public static function loadClass($className)
		{
			// ToDo: Allow recursive searching for auto-loading.
			foreach (self::$classPaths as $classPath)
			{
				foreach (scandir($classPath) as $node)
				{
					if ($node === '.' || $node === '..')
						continue;

					foreach (self::$allowedExtensions as $extension)
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
		public static function setAllowedExtensions($extensionString)
		{
			self::$allowedExtensions = explode(',', $extensionString);
		}

		/**
		 * Adds a directory to the loader which will be checked for matching class files.
		 *
		 * @param String $classPath The directory to add to the loader.
		 */
		public static function addClassPath($classPath)
		{
			self::$classPaths[] = rtrim($classPath, "\x2F\x5C");
		}

		private static $allowedExtensions = Array();
		private static $classPaths = Array();
	}
?>