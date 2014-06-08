<?php
	class Cookie
	{
		/**
		 * Sets a cookie with the provided data.
		 *
		 * @param string $name The name to identify the cookie.
		 * @param mixed $value The value of the cookie.
		 * @param int|DateTime $expires The timestamp at which the cookie should expire.
		 */
		public static function Set($name, $value, $expires)
		{
			if ($expires instanceof DateTime)
				$expires = $expires->getTimestamp();

			setcookie($name, $value, $expires);
		}

		/**
		 * Delete a cookie.
		 *
		 * @param string $name The name of the cookie delete.
		 */
		public static function Delete($name)
		{
			setcookie($name, '', time() - 3600);
		}

		/**
		 * Get the value of a set cookie.
		 *
		 * @param string $name The identifying name of the cookie.
		 * @return mixed|null The value of the cookie or NULL if it's not set.
		 */
		public static function Get($name)
		{
			return isset($_COOKIE[$name]) ? $_COOKIE[$name] : NULL;
		}
	}
?>