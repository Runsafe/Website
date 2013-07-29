<?php
	class WikiPageBuilder
	{
		public function insertTitle($title)
		{
			$this->text .= sprintf("= %s =\r\n", $title);
			return $this;
		}

		public function insertSubTitle($title)
		{
			$this->text .= sprintf("=== %s ===\r\n", $title);
			return $this;
		}

		public function insertText($text)
		{
			$this->text .= $text;
			return $this;
		}

		public function insertList($array)
		{
			foreach ($array as $node)
				$this->text .= sprintf("*%s\r\n", $node);

			return $this;
		}

		public function insertNewLine($amount = 1)
		{
			$count = 0;
			while ($count < $amount)
			{
				$this->text .= "\r\n";
				$count++;
			}
			return $this;
		}

		public function __toString()
		{
			return $this->text;
		}

		private $text;
	}
?>