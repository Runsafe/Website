<?php
	class PvPLeaderboardPage extends Module
	{
		public function Build()
		{
			$this->content = new Template('../templates/pvp_leaderboard.php');
			$this->title = 'PvP Rankings';

			$this->content->scoreboard = PvPRankingsHandler::getTopRankings();
		}
	}
?>