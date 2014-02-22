<?php
	class KW_DatabaseStatement
	{
		/**
		 * Construct an SQL database statement.
		 *
		 * @param string $sql An SQL statement to execute.
		 * @param PDO $connection PDO database connection.
		 */
		public function __construct($sql, $connection)
		{
			$this->sql = $sql;
			$this->connection = $connection;
		}

		/**
		 * Retrieve the SQL query string set in this statement.
		 *
		 * @return null|string Statement SQL, will be NULL if not yet set.
		 */
		public function getQueryString()
		{
			return $this->sql;
		}

		/**
		 * Sets a value for this statement.
		 *
		 * @param string $key The key used in the statement.
		 * @param mixed $value The value to assign to this key.
		 * @return KW_DatabaseStatement $this Statement instance.
		 */
		public function setValue($key, $value)
		{
			$this->values[$key] = $value;
			return $this;
		}

		/**
		 * Copies the values already stored inside a row.
		 *
		 * @param KW_DatabaseRow $row A row to extract from.
		 * @param string $prependChar Character to prepend each key with.
		 * @return KW_DatabaseStatement Statement instance.
		 */
		public function copyValuesFromRow($row, $prependChar = ':')
		{
			$row_array = $row->getAsArray();

			foreach ($row_array as $key => $value)
				$this->setValue($prependChar . $key, $value);

			return $this;
		}

		/**
		 * Executes the statement and collects retrieved rows.
		 *
		 * @return KW_DatabaseStatement $this Database statement instance.
		 */
		public function execute()
		{
			$pdo_statement = $this->connection->prepare($this->sql);
			foreach ($this->values as $key => $value)
				$pdo_statement->bindValue($key, $value);

			$pdo_statement->execute();

			while ($raw_row = $pdo_statement->fetch(PDO::FETCH_ASSOC))
			{
				$row = new KW_DatabaseRow();
				foreach ($raw_row as $column => $field)
					$row->__set($column, $field);

				$this->rows[] = $row;
			}

			return $this;
		}

		/**
		 * Returns an array of database rows retrieved. Will be empty if the statement is not executed.
		 *
		 * @return KW_DatabaseRow[]
		 */
		public function getRows()
		{
			return $this->rows;
		}

		/**
		 * Returns the amount of rows in this statement.
		 *
		 * @return int Amount of rows in this statement. Always zero until executed.
		 */
		public function getRowCount()
		{
			return count($this->rows);
		}

		/**
		 * @var array
		 */
		private $values = Array();

		/**
		 * @var string|null The SQL statement, will bw NULL if not yet set.
		 */
		private $sql;

		/**
		 * @var KW_DatabaseRow[]
		 */
		private $rows = Array();

		/**
		 * @var PDO
		 */
		private $connection;
	}
?>