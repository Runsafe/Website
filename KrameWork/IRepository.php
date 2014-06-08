<?php
	interface IRepository extends ISchemaTable
	{
		/** 
		 * Called to get a database statement by name.
		 *
		 * @param string $statement Name of prepared statement.
		 */
		public function __get($statement);

		/**
		 * Called to hook up the repository to a database connection.
		 *
		 * @param object $db The database connection to use.
		 */
		public function setDB($db);

		/**
		 * Called when the table object should prepare its statements.
		 */
		public function prepare();
	}
?>
