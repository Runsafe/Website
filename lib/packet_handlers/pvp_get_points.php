<?php
	class PVPGetPointsPacketHandler extends PacketHandler
	{
		public function Run()
		{
			$this->output['points'] = PVPShopHandler::GetPoints();
		}
	}
?>