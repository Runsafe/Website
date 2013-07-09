<?php
	class Authenticator
	{
		public static function AuthenticateUser($username, $password)
		{
			$query = PhorumDB::prepare('SELECT user_id FROM phorum_users WHERE username = :user AND password = :pass');
			$query->bindValue(':user', $username);
			$query->bindValue(':pass', md5($password));
			$query->execute();

			if ($user = $query->fetchObject())
			{
				Session::Set('LoggedInUser', $user->user_id);
				Session::Set('LoggedInUsername', $username);

				$admin_query = DB::prepare('SELECT parent FROM permissions_inheritance WHERE child = :user');
				$admin_query->bindValue(':user', strtolower($username));
				$admin_query->execute();

				if ($admin_user = $admin_query->fetchObject())
					if ($admin_user->parent == 'Admin')
						Session::Set('UserIsAdmin', true);

				return true;
			}

			return false;
		}

		public static function IsLoggedIn()
		{
			return Session::Get('LoggedInUser') !== null;
		}

		public static function GetLoggedInUsername()
		{
			return Session::Get('LoggedInUsername');
		}

		public static function GetLoggedInUser()
		{
			return Session::Get('LoggedInUser');
		}

		public static function Logout()
		{
			Session::Delete('LoggedInUser');
			Session::Delete('LoggedInUsername');
		}
	}
?>