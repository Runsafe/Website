<?php
	class DogHandler
	{
		public static function GetAllResponses()
		{
			$query = DB::prepare('SELECT ID, pattern, reply FROM ai_dog');
			$query->execute();

			return DB::prepareObjects($query);
		}

		public static function EditResponse($id, $pattern, $reply)
		{
			$query = DB::prepare('UPDATE ai_dog SET pattern = :pattern, reply = :reply WHERE ID = :id');
			$query->bindValue(':pattern', $pattern);
			$query->bindValue(':reply', $reply);
			$query->bindValue(':id', $id);
			$query->execute();
		}
	}
?>