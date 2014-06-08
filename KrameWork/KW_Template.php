<?php
	class KW_Template
	{
		/**
		 * Construct the template object.
		 *
		 * @param string $file Path of the file to use for this template.
		 */
		public function __construct($file)
		{
			if (defined('KW_TEMPLATE_DIR'))
				$file = KW_TEMPLATE_DIR . $file;

			$this->data = Array();
			// ToDo: If the file does not exist, we should throw an error.
			if (file_exists($file))
				$this->file = $file;
			else if (file_exists($file.'.php'))
				$this->file = $file.'.php';
		}

		/**
		 * Get a value stored in this template.
		 *
		 * @param mixed $key The key of the value to get.
		 * @return mixed|null The value or NULL if nothing is set at the provided key.
		 */
		public function __get($key)
		{
			return array_key_exists($key, $this->data) ? $this->data[$key] : NULL;
		}

		/**
		 * Sets a value for this template which will be interjected into the underlying file.
		 *
		 * @param mixed $key The key to store the value under.
		 * @param mixed $value The value to store in the template.
		 */
		public function __set($key, $value)
		{
			$this->data[$key] = $value;
		}

		/**
		 * Compiles the template; interjecting the template values into the file and returning the result.
		 *
		 * @return string The file output with injected values.
		 */
		public function __toString()
		{
			ob_start();
			extract($this->data);
			if ($this->file !== NULL)
				require_once($this->file);

			return ob_get_clean();
		}

		protected $file;
		protected $data;
	}
?>
