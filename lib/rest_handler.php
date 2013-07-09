<?php
	class REST
	{
		/**
		 * @param string $key
		 * @return null|mixed
		 */
		public static function Post($key)
		{
			if (array_key_exists($key, $_POST))
			{
				$data = self::CleanData($_POST[$key]);

				if (!empty($data))
					return $data;
			}

			return null;
		}

		/**
		 * @param string $key
		 * @return null|mixed
		 */
		public static function Get($key)
		{
			if (array_key_exists($key, $_GET))
			{
				$data = self::CleanData($_GET[$key]);

				if (!empty($data))
					return $data;
			}

			return null;
		}

		/**
		 * @param string $data
		 * @return string
		 */
		private static function CleanData($data)
		{
			return htmlentities(utf8_decode(trim($data)));
		}
	}
?>