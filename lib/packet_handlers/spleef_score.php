<?php
	class SpleefScorePacketHandler extends PacketHandler
	{
		public function Run()
		{
			$player = REST::Get('playerName');
			$this->output['score'] = $this->getPlayerScore($player);
			$this->output['playerName'] = $player;
		}

		private function getPlayerScore($playerName)
		{
			if ($playerName !== null)
				return SpleefHandler::getPlayerScore($playerName);

			return 0;
		}
	}
?>