<?php
	class Accounts
	{
		/**
		 * Check if an e-mail address is already in use.
		 * @param string $email The e-mail address to check
		 * @param bool $legacy Check the legacy DB or not.
		 * @return bool True if the e-mail address is already in use
		 */
		public static function emailInUse($email, $legacy = false)
		{
			$query = DB::Web()->prepare('SELECT COUNT(*) AS cnt FROM ' . ($legacy ? 'legacy_' : '') . 'accounts WHERE email = :email');
			$query->setValue(':email', $email)->execute();

			$result = $query->getRows();
			return count($result) > 0 && $result[0]->cnt > 0;
		}

		/**
		 * Check if the provided e-mail address is valid
		 * @param string $email The e-mail address to check
		 * @return bool True if the e-mail address is valid, else false
		 */
		public static function emailIsValid($email)
		{
			return filter_var($email, FILTER_VALIDATE_EMAIL) !== FALSE;
		}

		/**
		 * Check if there is an account currently logged in
		 * @return bool True if there is an account logged in, else false
		 */
		public static function isLoggedIn()
		{
			return Session::Get('account_info') !== NULL;
		}

		/**
		 * Set the logged in account for this session
		 * @param int $account_id ID of the account to log-in
		 */
		public static function setLoggedInAccount($account_id)
		{
			$query = DB::Web()->prepare('SELECT email, flags FROM accounts WHERE ID = :id');
			$query->setValue(':id', $account_id)->execute();

			$result = $query->getFirstRow();
			if ($result != null)
			{
				$account = new AccountInfo($account_id);
				$account->email = $result->email;
				$account->flags = $result->flags;
				Session::Set('account_info', $account);
			}
		}

		/**
		 * Log out the currently logged in account
		 */
		public static function logout()
		{
			Session::Delete('account_info');
		}

		/**
		 * Get the account info object for the currently logged in user
		 * @return AccountInfo|null Account info object or NULL if not logged in
		 */
		public static function getAccountData()
		{
			return Session::Get('account_info');
		}

		/**
		 * Try to verify an account in the account database or as a legacy account
		 * @param string $email The e-mail address of the account
		 * @param string $password The password for the account
		 * @return int|null The ID of the account or NULL if not valid
		 */
		public static function verifyAccount($email, $password)
		{
			$query = DB::Web()->prepare('SELECT ID, password FROM accounts WHERE email = :email');
			$query->setValue(':email', $email)->execute();
			$result = $query->getFirstRow();

			if ($result !== null)
			{
				return (crypt($password, $result->password) == $result->password) ? $result->ID : false;
			}
			else
			{
				$query = DB::Web()->prepare('SELECT password FROM legacy_accounts WHERE email = :email AND password = :pass');
				$query->setValue(':email', $email)->setValue(':pass', md5($password))->execute();
				$result = $query->getFirstRow();

				if ($result != null)
				{
					$query = DB::Web()->prepare('INSERT INTO accounts (email, password) VALUES(:email, :password)');
					$query->setValue(':email', $email)->setValue(':password', crypt($password))->execute();

					$lid = DB::Web()->getLastInsertID('accounts');

					DB::Web()->prepare('DELETE FROM legacy_accounts WHERE email = :email')->setValue(':email', $email)->execute();

					return $lid;
				}
			}
			return null;
		}
	}
?>