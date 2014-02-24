<?php
	abstract class DataObject
	{
		/**
		 * Get a value stored in this data object
		 * @param $key
		 * @return mixed|null
		 */
		public function __get($key)
		{
			return array_key_exists($key, $this->data) ? $this->data[$key] : null;
		}

		/**
		 * Set a value to store in this data object.
		 * @param $key
		 * @param $value
		 */
		public function __set($key, $value)
		{
			$this->data[$key] = $value;
		}

		protected $data = Array();
	}
?>