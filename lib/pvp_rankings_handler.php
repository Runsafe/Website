<?php
	class PvPRankingsHandler
	{
		public static function getTopRankings()
		{
			$scoreboard = Array();
			$query = DB::prepare('SELECT playerName, rating FROM peeveepee_scores ORDER BY rating DESC LIMIT 30');
			$query->execute();

			while ($player = $query->fetchObject())
				$scoreboard[$player->playerName] = $player->rating;

			return $scoreboard;
		}

		public static function getPlayerRating($playerName)
		{
			$query = DB::prepare('SELECT rating FROM peeveepee_scores WHERE playerName = :player');
			$query->bindValue(':player', $playerName);
			$query->execute();

			if ($player = $query->fetchObject())
				return $player->rating;

			return 1200; // Default rating
		}
	}
?>