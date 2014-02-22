<?php
	class REST
	{
		/**
		 * Get a value from the POST array with applied filters.
		 *
		 * @param mixed $key The key of the value to return.
		 * @param int|null $filter
		 * @param int $options A bitwise conjunction flag for the filter.
		 * @return mixed|null The filtered value, FALSE if the filter failed or NULL if the key does not exist.
		 */
		public static function Post($key, $filter = FILTER_DEFAULT, $options = 0)
		{
			return filter_input(INPUT_POST, $key, $filter, $options);
		}

		/**
		 * Get a value from the GET array with applied filters.
		 *
		 * @param mixed $key The key of the value to return.
		 * @param int|null $filter
		 * @param int $options A bitwise conjunction flag for the filter.
		 * @return mixed|null The filtered value, FALSE if the filter failed or NULL if the key does not exist.
		 */
		public static function Get($key, $filter = FILTER_DEFAULT, $options = 0)
		{
			return filter_input(INPUT_GET, $key, $filter, $options);
		}
	}
?>