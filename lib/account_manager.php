<?php
	class AccountManager
	{
		public static function GetLinkedCharacter()
		{
			$query = DB::prepare('SELECT playerName FROM runsafe_account_links WHERE ID = :user');
			$query->bindValue(':user', Authenticator::GetLoggedInUser());
			$query->execute();

			if ($result = $query->fetchObject())
				return $result->playerName;

			return null;
		}

		public static function LinkCharacter($character, $input_token)
		{
			$token = self::GetAuthToken($character);

			if ($token === null)
				return false;

			if ($input_token !== $token)
				return false;

			$query = DB::prepare('INSERT INTO runsafe_account_links (ID, playerName) VALUES(:id, :char)');
			$query->bindValue(':id', Authenticator::GetLoggedInUser());
			$query->bindValue(':char', $character);
			$query->execute();

			return true;
		}

		private static function GetAuthToken($character)
		{
			$query = DB::prepare('SELECT token FROM runsafe_account_tokens WHERE playerName = :char');
			$query->bindValue(':char', $character);
			$query->execute();

			if ($result = $query->fetchObject())
				return $result->token;

			return null;
		}
	}
?>