<?php
	require_once('db_config.php');

	class DB
	{
		public static function Web()
		{
			if (self::$web_connection == null)
				self::$web_connection = new KW_DatabaseConnection(WEB_DB_DSN, DB_USER, DB_PASSWORD);

			return self::$web_connection;
		}

		public static function Server()
		{
			if (self::$server_connection == null)
				self::$server_connection = new KW_DatabaseConnection(SERVER_DB_DSN, DB_USER, DB_PASSWORD);

			return self::$server_connection;
		}

		public static function Auth()
		{
			if (self::$auth_connection == null)
				self::$auth_connection = new KW_DatabaseConnection(AUTH_DB_DSN, DB_USER, DB_PASSWORD);

			return self::$auth_connection;
		}

		private static $web_connection;
		private static $server_connection;
		private static $auth_connection;
	}
?>