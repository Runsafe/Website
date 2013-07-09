<?php
	class DogHandler
	{
		public static function GetAllResponses()
		{
			$query = DB::prepare('SELECT ID, pattern, reply FROM ai_dog');
			$query->execute();

			return DB::prepareObjects($query);
		}
	}
?>