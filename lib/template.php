<?php
	class Template
	{
		public function __construct($file)
		{
			$this->data = Array();

			if (file_exists($file))
				$this->file = $file;
		}

		public function __get($key)
		{
			if (array_key_exists($key, $this->data))
				return $this->data[$key];

			return null;
		}

		public function __set($key, $value)
		{
			$this->data[$key] = $value;
		}

		public function __toString()
		{
			if ($this->file == null)
				return 'Error: template not found'; // TODO: Make this a friendly error.

			ob_start();
			extract($this->data);
			require($this->file);
			return ob_get_clean();
		}

		public $title;
		public $content;
		protected $data;
		protected $file;
	}
?>