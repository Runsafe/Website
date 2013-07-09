<?php
	class Session
	{
		/**
		 * @param string $key
		 * @return null|mixed
		 */
		public static function Get($key)
		{
			return (isset($_SESSION[$key]) ? $_SESSION[$key] : null);
		}

		/**
		 * @param string $key
		 * @param mixed $value
		 */
		public static function Set($key, $value)
		{
			$_SESSION[$key] = $value;
		}

		/**
		 * @param string $key
		 */
		public static function Delete($key)
		{
			unset($_SESSION[$key]);
		}
	}
?>