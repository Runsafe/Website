<?php
	class Transporter
	{
		/**
		 * Transporter::Transport
		 *
		 * @param string $location
		 */
		public static function Transport($location)
		{
			header('HTTP/1.1 303 See Other');
			header('Location: ' . $location);

			die(); // Prevent further processing.
		}

		/**
		 * Transporter::Refresh
		 */
		public static function Refresh()
		{
			self::Transport(basename($_SERVER['REQUEST_URI']));
		}
	}
?>