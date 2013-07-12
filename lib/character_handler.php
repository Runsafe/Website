<?php
	class CharacterHandler
	{
		public static function getCorrectCharacterName($playerName)
		{
			$query = DB::prepare('SELECT name FROM player_db WHERE LOWER(name) = :player');
			$query->bindValue(':player', strtolower($playerName));
			$query->execute();

			if ($player = $query->fetchObject())
				return $player->name;

			return $playerName;
		}
	}
?>