<?php
	class Session
	{
		// ToDo: Throw error/exception if these are called while sessions are disabled in KrameWork.

		/**
		 * Retrieves a value set in the current session.
		 *
		 * @param mixed $key The key of the value to retrieve.
		 * @return mixed|null The value, will be null if it does not exist.
		 */
		public static function Get($key)
		{
			return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
		}

		/**
		 * Sets a value with the given key in the current session.
		 *
		 * @param mixed $key The key to use.
		 * @param mixed $value The value to set.
		 */
		public static function Set($key, $value)
		{
			$_SESSION[$key] = $value;
		}

		/**
		 * Delete the value stored in the current session at the given key.
		 *
		 * @param mixed $key The key of the value to delete.
		 */
		public static function Delete($key)
		{
			unset($_SESSION[$key]);
		}
	}
?>