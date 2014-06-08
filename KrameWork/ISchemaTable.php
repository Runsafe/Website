<?php
	interface ISchemaTable
	{
		/**
		 * Returns the name of the table being managed by this object.
		 */
		public function getName();

		/**
		 * Returns the current version of this table.
		 */
		public function getVersion();

		/**
		 * Returns SQL statements to create and update the table schema.
		 */
		public function getQueries();
	}
?>
