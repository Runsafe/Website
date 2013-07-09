<?php
	class SpleefPage extends Module
	{
		public function Build()
		{
			$this->content = new Template('../templates/spleef.php');
			$this->title = 'Spleef Leaderboard';

			$this->content->scoreboard = SpleefHandler::getLatestSpleefWins();
			$this->content->character = AccountManager::GetLinkedCharacter();
		}
	}
?>