<?php
	class PacketSystem
	{
		/**
		 * Register a handler which will process packets
		 * @param int $id The ID of the packet the handler will process
		 * @param string $handler The name of the handler class
		 */
		public static function registerHandler($id, $handler)
		{
			self::$handlers[$id] = $handler;
		}

		/**
		 * Register multiple packet handlers at once using an array
		 * @param array $handlers Array of ID => HandlerClass
		 */
		public static function registerHandlers($handlers)
		{
			foreach ($handlers as $id => $handler)
				self::registerHandler($id, $handler);
		}

		/**
		 * Retrieve a handler for a specific packet ID
		 * @param int $id The ID of a handler to get
		 * @return IPacketHandler|null A handler for the specific packet or NULL if none exists
		 */
		public static function getHandler($id)
		{
			return (array_key_exists($id, self::$handlers)) ? new self::$handlers[$id]() : null;
		}

		private static $handlers = Array();
	}
?>