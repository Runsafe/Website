<?php
	require_once('../lib/interfaces/IPacketHandler.php');
	class PacketHandler implements IPacketHandler
	{
		public function __construct()
		{
			$this->output = Array();
		}

		public function Run() {}

		public function __toString()
		{
			$this->Run();
			return json_encode($this->output);
		}

		protected $output;
	}
?>