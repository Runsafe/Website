<?php
	class AuthHandler
	{
		public static function verifyCredentials($username, $password)
		{
			$query = DB::Auth()->prepare('SELECT password FROM login WHERE username = :user');
			$query->setValue(':user', $username);

			$user = $query->getFirstRow();
			if ($user !== NULL && crypt($password, $user->password) == $user->password)
				return true;

			return false;
		}
	}
?>