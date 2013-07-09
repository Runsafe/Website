<?php
	class PhorumDB
	{
		/**
		 * @return PDO
		 */
		protected static function getDB()
		{
			if (self::$connection === null)
				self::$connection = new PDO(PHORUM_DATABASE_DSN, DATABASE_USER, DATABASE_PASSWORD);

			return self::$connection;
		}

		/**
		 * @param string $query
		 * @return PDOStatement
		 */
		public static function prepare($query)
		{
			return self::getDB()->prepare($query);
		}

		/**
		 * @param PDOStatement $query
		 * @return array
		 */
		public static function prepareObjects($query)
		{
			$return = Array();
			while ($result = $query->fetchObject())
				$return[] = $result;

			return $return;
		}

		protected static $connection;
	}
?>