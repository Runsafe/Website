<?php
	class PvPRatingPacketHandler extends PacketHandler
	{
		public function Run()
		{
			$player = REST::Get('playerName');

			if ($player != null)
			{
				$this->output['rating'] = PvPRankingsHandler::getPlayerRating($player);
				$this->output['playerName'] = $player;
			}
		}
	}
?>