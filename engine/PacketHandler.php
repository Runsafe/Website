<?php
	abstract class PacketHandler implements IPacketHandler
	{
		public function __construct()
		{
			$this->output = Array();
		}

		public function convertChildren($node)
		{
			if (is_array($node))
				return array_map(array("PacketHandler", "convertChildren"), $node);
			else if (is_object($node))
				return array_map(array("PacketHandler", "convertChildren"), get_object_vars($node));
			else if (is_string($node))
				return html_entity_decode($this->convertCharacters($node), ENT_COMPAT, "UTF-8");

			return $node;
		}

		private function convertCharacters($text)
		{
			foreach ($this->char_swaps as $find => $replace)
				$text = str_replace($find, $replace, $text);

			return $text;
		}

		public function __toString()
		{
			$this->run();
			return json_encode($this->convertChildren($this->output));
		}

		public function output($key, $value)
		{
			$this->output[$key] = $value;
		}

		protected $output;
		private $char_swaps = Array(
			'‘' => '\'',
			'’' => '\''
		);
	}
?>