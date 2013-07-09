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
	}
?>