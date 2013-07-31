<?php
	class StringBuilder
	{
		public function append($text)
		{
			$this->string .= $text;
			return $this;
		}

		public function prepend($text)
		{
			$this->string = $text . $this->string;
			return $this;
		}

		public function __toString()
		{
			return $this->string;
		}

		private $string;
	}
?>