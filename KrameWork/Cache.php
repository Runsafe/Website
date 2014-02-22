<?php
	class Cache
	{
		/**
		 * @return Memcached
		 */
		private static function getCache()
		{
			if (self::$cache == null)
			{
				self::$cache = new Memcached;
				self::addServer(self::$server); // Add default server.
			}

			return self::$cache;
		}

		/**
		 * Add a server to the server pool. Will use the default port if not provided.
		 * @param string $server The server to add to the pool
		 * @param int $port The port of the server, will use the default if not provided.
		 */
		public static function addServer($server, $port = null)
		{
			if ($port == null)
				$port = self::$port;

			self::getCache()->addserver($server, $port);
		}

		/**
		 * Set which port we will connect to by default for all servers.
		 * @param int $port
		 */
		public static function setDefaultPort($port)
		{
			self::$port = $port;
		}

		/**
		 * Set which server we will connect to by default.
		 * @param string $server The default server to connect to.
		 */
		public static function setDefaultServer($server)
		{
			self::$server = $server;
		}

		/**
		 * Store a value in the cache.
		 * @param string $key The key under which to store the value
		 * @param mixed $value The value to store
		 * @param int $expires Expiration time, defaults to 0.
		 */
		public static function set($key, $value, $expires = 0)
		{
			self::getCache()->set($key, $value, $expires);
		}

		/**
		 * Delete a value from the cache.
		 * @param string $key The key of the value to delete.
		 */
		public static function delete($key)
		{
			self::getCache()->delete($key);
		}

		/**
		 * Flush the entire cache.
		 */
		public static function flush()
		{
			self::getCache()->flush();
		}

		/**
		 * @param string $key The key of which value to return.
		 * @return mixed
		 */
		public static function get($key)
		{
			return self::getCache()->get($key);
		}

		/**
		 * Get the result code of the last retrieve.
		 * @return int The result code
		 */
		public static function getResultCode()
		{
			return self::getCache()->getResultCode();
		}

		private static $cache;
		private static $port = 11211;
		private static $server = '127.0.0.1';
	}
?>