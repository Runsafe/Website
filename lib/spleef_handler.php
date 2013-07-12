<?php
	class SpleefHandler
	{
		public static function getLatestSpleefWins()
		{
			$scoreboard = Array();
			$query = DB::prepare('SELECT ID, Wins FROM spleefScore ORDER BY Wins DESC LIMIT 30');
			$query->execute();

			while ($player = $query->fetchObject())
				$scoreboard[$player->ID] = $player->Wins;

			return $scoreboard;
		}

		public static function getPlayerScore($playerName)
		{
			$query = DB::prepare('SELECT Wins FROM spleefScore WHERE LOWER(ID) = :player');
			$query->bindValue(':player', strtolower($playerName));
			$query->execute();

			if ($player = $query->fetchObject())
				return $player->Wins;

			return 0;
		}
	}
?>