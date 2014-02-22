<?php
	class KW_DatabaseConnection
	{
		/**
		 * Constructs a database connection wrapper.
		 *
		 * @param string $dsn DB DSN (PDO format)
		 * @param string|null $username Username to connect with. Set to NULL if N/A.
		 * @param string|null $password Password to connect with. Set to NULL if N/A.
		 */
		public function __construct($dsn, $username, $password)
		{
			$this->connection = new PDO($dsn, $username, $password);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		/**
		 * Returns a database statement.
		 *
		 * @param string $sql An SQL query for this statement.
		 * @return KW_DatabaseStatement A database statement.
		 */
		public function prepare($sql)
		{
			return new KW_DatabaseStatement($sql, $this->connection);
		}

		/**
		 * Execute an SQL query.
		 *
		 * @param string $sql An SQL query string.
		 * @return int Amount of rows effected by the execution of this query.
		 */
		public function execute($sql)
		{
			return $this->connection->exec($sql);
		}

		/**
		 * @param string $table The name of the table to check.
		 * @return string ID of the last inserted row.
		 */
		public function getLastInsertID($table)
		{
			return $this->connection->lastInsertId($table);
		}

		private $connection;
	}
?>