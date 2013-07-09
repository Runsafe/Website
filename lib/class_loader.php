<?php
	class ClassLoader
	{
		public static function loadClass($class_name)
		{
			if (array_key_exists($class_name, self::$loadable_classes))
				require_once(CLASS_INCLUDE_PATH . self::$loadable_classes[$class_name]);
		}

		public static function getPacketHandler($packet_id)
		{
			if (array_key_exists($packet_id, self::$packet_handlers))
			{
				require_once(PACKET_HANDLER_PATH . self::$packet_handlers[$packet_id][0]);
				return new self::$packet_handlers[$packet_id][1]();
			}
			return null;
		}

		public static function registerClass($class_name, $class_module)
		{
			self::$loadable_classes[$class_name] = $class_module;
		}

		public static function registerPacketHandler($packet_id, $handler_module, $handler_class)
		{
			self::$packet_handlers[$packet_id] = Array($handler_module, $handler_class);
		}

		private static $packet_handlers = Array();
		private static $loadable_classes = Array();
	}
?>