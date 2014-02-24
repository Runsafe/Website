<?php
	class Accounts
	{
		/**
		 * Check if an e-mail address is already in use.
		 * @param string $email The e-mail address to check
		 * @return bool True if the e-mail address is already in use
		 */
		public static function emailInUse($email)
		{
			$query = DB::Web()->prepare('SELECT COUNT(*) AS cnt FROM accounts WHERE email = :email');
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
			return filter_Var($email, FILTER_VALIDATE_EMAIL) !== FALSE;
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
		 * Get the account info object for the currently logged in user
		 * @return AccountInfo|null Account info object or NULL if not logged in
		 */
		public static function getAccountData()
		{
			return Session::Get('account_info');
		}
	}
?>