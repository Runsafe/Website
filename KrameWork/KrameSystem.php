<?php
	require_once('KW_Constants.php');
	require_once('KW_DependencyInjector.php');
	require_once('KW_ClassLoader.php');

	class KrameSystem extends KW_DependencyInjector
	{
		/**
		 * Initialize a new KrameWork system.
		 *
		 * @param int $flags Flags to control the behavior of the system.
		 */
		public function __construct($flags = KW_DEFAULT_FLAGS)
		{
			// Set-up auto loading.
			$this->classLoader = new KW_ClassLoader();
			$this->classLoader->setAllowedExtensions('.php');
			$this->classLoader->addClassPath(dirname(__FILE__));
			spl_autoload_register(array($this->classLoader, 'loadClass'));

			if (($flags & KW_ENABLE_SESSIONS) && !self::sessionIsStarted())
				session_start();

			if ($flags & KW_ERROR_HANDLER)
				$this->errorHandler = new KW_ErrorHandler(!($flags & KW_LEAVE_ERROR_LEVEL));
		}

		/**
		 * Adds a directory to the loader which will be checked for matching class files.
		 *
		 * @param String $classPath The directory to add to the loader.
		 */
		public function addAutoLoadPath($classPath)
		{
			$this->classLoader->addClassPath($classPath);
		}

		/**
		 * Sets which file extensions can be automatically loaded by the class loader.
		 *
		 * @param String $extensionString A comma-separated list of extensions with period included.
		 */
		public function setAutoLoadExtensions($extensionString)
		{
			$this->classLoader->setAllowedExtensions($extensionString);
		}

		/**
		 * Returns the error handler for this KrameWork system instance.
		 *
		 * @return null|KW_ErrorHandler The error handler, will be NULL if error handling is disabled in this instance.
		 */
		public function getErrorHandler()
		{
			return $this->errorHandler;
		}

		public static function sessionIsStarted()
		{
			if (php_sapi_name() == 'cli')
				return false;

			if (function_exists('session_status'))
				return session_status() == PHP_SESSION_ACTIVE;
			else
				return session_id() === '' ? false : true;
		}

		/**
		 * @var KW_ClassLoader
		 */
		private $classLoader;

		/**
		 * @var KW_ErrorHandler
		 */
		private $errorHandler;
	}
?>