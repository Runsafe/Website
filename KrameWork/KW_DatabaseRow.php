<?php
	class KW_DatabaseRow
	{
		/**
		 * Sets a value for this row.
		 *
		 * @param string $key The key to use for this value.
		 * @param mixed $value A value to set in the row.
		 */
		public function __set($key, $value)
		{
			$this->values[$key] = $value;
		}

		/**
		 * Get a value set in this row.
		 *
		 * @param string $key The key the value is stored at.
		 * @return mixed|null The value for the key. Will be NULL if nothing exists at the key.
		 */
		public function __get($key)
		{
			return array_key_exists($key, $this->values) ? $this->values[$key] : NULL;
		}

		/**
		 * Returns the row as an associative array.
		 *
		 * @return array
		 */
		public function getAsArray()
		{
			return $this->values;
		}

		private $values = Array();
	}
?>