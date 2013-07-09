<?php
	class PVPEvent
	{
		public static function IsSignedUp()
		{
			$query = DB::prepare('SELECT playerName FROM pvp_event WHERE playerName = :player');
			$query->bindValue(':player', AccountManager::GetLinkedCharacter());
			$query->execute();

			if ($result = $query->fetchObject())
				return true;

			return false;
		}

		public static function SignUp()
		{
			$query = DB::prepare('INSERT INTO pvp_event (playerName) VALUES(:player)');
			$query->bindValue(':player', AccountManager::GetLinkedCharacter());
			$query->execute();
		}
	}
?>