<?php
	interface IPacketHandler
	{
		public function Run();
		public function output($key, $value);
	}
?>