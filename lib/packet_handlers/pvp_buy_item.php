<?php
	class PVPBuyItemPacketHandler extends PacketHandler
	{
		public function Run()
		{
			$item_id = REST::Get('item');
			$this->output['success'] = 0;

			if ($item_id !== null)
				if (PVPShopHandler::BuyItem($item_id))
					$this->output['success'] = 1;
		}
	}
?>