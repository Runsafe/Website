<?php
	class KW_DataContainer
	{
		public function __construct($data = Array())
		{
			$this->values = $data;
		}

		/**
		 * Sets a value for this object.
		 *
		 * @param string $key The key to use for this value.
		 * @param mixed $value A value to set in the object.
		 */
		public function __set($key, $value)
		{
			$this->values[$key] = $value;
		}

		/**
		 * Get a value set in this object.
		 *
		 * @param string $key The key the value is stored at.
		 * @return mixed|null The value for the key. Will be NULL if nothing exists at the key.
		 */
		public function __get($key)
		{
			return array_key_exists($key, $this->values) ? $this->values[$key] : NULL;
		}

		/**
		 * Returns the underlying data as an associative array.
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
