<?php
	class SpleefPage extends Module
	{
		public function Build()
		{
			$this->content = new Template('spleef');
			$this->title = 'Spleef Leaderboard';

			$this->content->scoreboard = SpleefHandler::getLatestSpleefWins();
			$this->content->character = AccountManager::GetLinkedCharacter();
		}
	}
?>
