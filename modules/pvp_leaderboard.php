<?php
	class PvPLeaderboardPage extends Module
	{
		public function Build()
		{
			$this->content = new Template('pvp_leaderboard');
			$this->title = 'PvP Rankings';

			$this->content->scoreboard = PvPRankingsHandler::getTopRankings();
			$this->content->character = AccountManager::GetLinkedCharacter();
		}
	}
?>
