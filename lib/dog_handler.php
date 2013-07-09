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

		public static function AddNewResponse($pattern, $reply)
		{
			$query = DB::prepare('INSERT INTO ai_dog (pattern, reply) VALUES(:pattern, :reply)');
			$query->bindValue(':pattern', $pattern);
			$query->bindValue(':reply', $reply);
			$query->execute();

			$query = DB::prepare('SELECT LAST_INSERT_ID() AS ID FROM ai_dog');
			$query->execute();

			if ($result = $query->fetchObject())
				return $result->ID;

			return null;
		}

		public static function DeleteResponse($id)
		{
			$query = DB::prepare('DELETE FROM ai_dog WHERE ID = :id');
			$query->bindValue(':id', $id);
			$query->execute();
		}
	}
?>